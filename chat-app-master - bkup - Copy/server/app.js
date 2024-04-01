const express = require("express");
const bcryptjs = require("bcryptjs");
const jwt = require("jsonwebtoken");
const cors = require("cors");
const io = require("socket.io")(8080, {
  cors: {
    origin: "http://localhost:3000",
  },
});

// Connect DB
require("./db/connection");

// Import Files
const Users = require("./models/Users");
const Conversations = require("./models/Conversations");
const Messages = require("./models/Messages");

// app Use
const app = express();
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cors());

const port = process.env.PORT || 8000;

// Socket.io
let users = [];
io.on("connection", (socket) => {
  console.log("User connected", socket.id);
  socket.on("addUser", (userId) => {
    console.log(users, "usergggggggggggggggg");
    const isUserExist = users.find((user) => user.userId === userId);
    if (!isUserExist) {
      const user = { userId, socketId: socket.id };
      console.log(user, "usernew");
      users.push(user);
      io.emit("getUsers", users);
      console.log(users, "usersnew");
    }
  });

  socket.on(
    "sendMessage",
    async ({ senderId, receiverId, message, conversationId }) => {
      console.log(users, "usersnew111111111111111111");
      const receiver = users.find((user) => user.userId === receiverId);
      const sender = users.find((user) => user.userId === senderId);
      const user = await Users.findById(senderId);
      console.log("senderID ", senderId);
      //console.log("user", user);
      console.log("sender", sender);
      if (receiver) {
        io.to(receiver.socketId)
          .to(sender.socketId)
          .emit("getMessage", {
            senderId,
            message,
            conversationId,
            receiverId,
            user: { id: user._id, fullName: user.fullName, email: user.email },
          });
      } else {
        io.to(sender.socketId).emit("getMessage", {
          senderId,
          message,
          conversationId,
          receiverId,
          user: { id: user._id, fullName: user.fullName, email: user.email },
        });
      }
    }
  );

  socket.on("disconnect", () => {
    users = users.filter((user) => user.socketId !== socket.id);
    io.emit("getUsers", users);
  });
  // io.emit('getUsers', socket.userId);
});

// Routes
app.get("/", (req, res) => {
  res.send("Welcome");
});

app.post("/api/register", async (req, res, next) => {
  try {
    const { fullName, email, password } = req.body;

    if (!fullName || !email || !password) {
      const responseData = {
        message: "Please fill all required fields",
        status: 400,
      };

      // Sending a response with a specific HTTP status code and data
      res.status(400).json(responseData);
      //res.status(400).send("Please fill all required fields");
    } else {
      const isAlreadyExist = await Users.findOne({ email });
      if (isAlreadyExist) {
        const responseData = {
          message: "User already exists",
          status: 400,
        };

        // Sending a response with a specific HTTP status code and data
        res.status(400).json(responseData);
        //res.status(400).send("User already exists");
      } else {
        const newUser = new Users({ fullName, email });
        bcryptjs.hash(password, 10, (err, hashedPassword) => {
          newUser.set("password", hashedPassword);
          newUser.save();
          next();
        });
        const responseData = {
          message: "User registered successfully",
          status: 200,
        };

        // Sending a response with a specific HTTP status code and data
        return res.status(200).json(responseData);
        //return res.status(200).send("User registered successfully");
      }
    }
  } catch (error) {
    console.log(error, "Error");
  }
});

app.post("/api/login", async (req, res, next) => {
  try {
    const { email, password } = req.body;

    if (!email || !password) {
      //res.status(400).send("Please fill all required fields");
      const responseData = {
        message: "Please fill all required fields",
        status: 400,
      };

      // Sending a response with a specific HTTP status code and data
      res.status(400).json(responseData);
    } else {
      const user = await Users.findOne({ email });
      if (!user) {
        // res.status(400).send("User email or password is incorrect");
        const responseData = {
          message: "User email or password is incorrect",
          status: 400,
        };

        // Sending a response with a specific HTTP status code and data
        res.status(400).json(responseData);
      } else {
        const validateUser = await bcryptjs.compare(password, user.password);
        if (!validateUser) {
          //res.status(400).send("User email or password is incorrect");
          const responseData = {
            message: "User email or password is incorrect",
            status: 400,
          };

          // Sending a response with a specific HTTP status code and data
          res.status(400).json(responseData);
        } else {
          const payload = {
            userId: user._id,
            email: user.email,
          };
          const JWT_SECRET_KEY =
            process.env.JWT_SECRET_KEY || "THIS_IS_A_JWT_SECRET_KEY";

          jwt.sign(
            payload,
            JWT_SECRET_KEY,
            { expiresIn: 84600 },
            async (err, token) => {
              await Users.updateOne(
                { _id: user._id },
                {
                  $set: { token },
                }
              );
              user.save();
              // return res.status(200).json({
              //   user: {
              //     id: user._id,
              //     email: user.email,
              //     fullName: user.fullName,
              //   },
              //   token: token,
              // });
              const responseData = {
                user: {
                  id: user._id,
                  email: user.email,
                  fullName: user.fullName,
                },
                token: token,
                message: "Login successfully",
                status: 200,
              };

              // Sending a response with a specific HTTP status code and data
              return res.status(200).json(responseData);
            }
          );
        }
      }
    }
  } catch (error) {
    console.log(error, "Error");
  }
});

app.post("/api/conversation", async (req, res) => {
  try {
    const { senderId, receiverId } = req.body;
    const newCoversation = new Conversations({
      members: [senderId, receiverId],
    });
    await newCoversation.save();
    res.status(200).send("Conversation created successfully");
  } catch (error) {
    console.log(error, "Error");
  }
});

app.get("/api/conversations/:userId", async (req, res) => {
  try {
    const userId = req.params.userId;
    const conversations = await Conversations.find({
      members: { $in: [userId] },
    });
    const conversationUserData = Promise.all(
      conversations.map(async (conversation) => {
        const receiverId = conversation.members.find(
          (member) => member !== userId
        );
        const user = await Users.findById(receiverId);
        return {
          user: {
            receiverId: user._id,
            email: user.email,
            fullName: user.fullName,
          },
          conversationId: conversation._id,
        };
      })
    );
    res.status(200).json(await conversationUserData);
  } catch (error) {
    console.log(error, "Error");
  }
});

app.post("/api/message", async (req, res) => {
  try {
    const { conversationId, senderId, message, receiverId = "" } = req.body;

    if (!senderId || !message)
      return res.status(400).send("Please fill all required fields");
    if (conversationId === "new" && receiverId) {
      const conversations = await Conversations.find({
        $and: [
          { members: { $in: [receiverId] } }, // Products in desired categories
          { members: { $in: [senderId] } }, // Products priced higher than $100
        ],
      });

      console.log("conversations", conversations);
      if (conversations == "") {
        console.log("1st time");
        const newCoversation = new Conversations({
          members: [senderId, receiverId],
        });
        await newCoversation.save();
        const newMessage = new Messages({
          conversationId: newCoversation._id,
          senderId,
          message,
        });
        await newMessage.save();
        return res.status(200).send({
          conversationId: newMessage.conversationId,
          message: "Message sent successfully",
        });
      } else {
        console.log("2nd time", conversations[0]._id);
        const newMessage = new Messages({
          conversationId: conversations[0]._id,
          senderId,
          message,
        });
        await newMessage.save();
        res.status(200).send("Message sent successfully");

        // return res.status(200).send({
        //   conversationId: newMessage.conversationId,
        //   message: "Message sent successfully",
        // });
      }
    } else if (!conversationId && !receiverId) {
      return res.status(400).send("Please fill all required fields");
    }
    const newMessage = new Messages({ conversationId, senderId, message });
    console.log(newMessage, "newMessage2");

    await newMessage.save();
    res.status(200).send("Message sent successfully");
    // return res.status(200).send({
    //   conversationId: newMessage.conversationId,
    //   message: "Message sent successfully",
    // });
  } catch (error) {
    console.log(error, "Error");
  }
});

app.get("/api/message/:conversationId", async (req, res) => {
  try {
    const checkMessages = async (conversationId) => {
      console.log(conversationId, "conversationId");
      const messages = await Messages.find({ conversationId });
      const messageUserData = Promise.all(
        messages.map(async (message) => {
          const user = await Users.findById(message.senderId);
          return {
            user: { id: user._id, email: user.email, fullName: user.fullName },
            message: message.message,
          };
        })
      );
      res.status(200).json(await messageUserData);
    };
    const conversationId = req.params.conversationId;
    if (conversationId === "new") {
      const checkConversation = await Conversations.find({
        members: { $all: [req.query.senderId, req.query.receiverId] },
      });
      if (checkConversation.length > 0) {
        checkMessages(checkConversation[0]._id);
      } else {
        return res.status(200).json([]);
      }
    } else {
      checkMessages(conversationId);
    }
  } catch (error) {
    console.log("Error", error);
  }
});

app.get("/api/users/:userId", async (req, res) => {
  try {
    const userId = req.params.userId;
    const users = await Users.find({ _id: { $ne: userId } });
    const usersData = Promise.all(
      users.map(async (user) => {
        return {
          user: {
            email: user.email,
            fullName: user.fullName,
            receiverId: user._id,
          },
        };
      })
    );
    res.status(200).json(await usersData);
  } catch (error) {
    console.log("Error", error);
  }
});
// Logout route
app.get("/logout", async (req, res) => {
  console.log(res);
  // Clear the authentication-related data (token, session, etc.)
  // For example, if using JWT stored in a cookie:
  res.clearCookie("jwtToken"); // Clear the JWT token stored in a cookie

  // Optionally clear server-side session data if you're using sessions
  // req.session.destroy(); // Clear session data

  // Redirect or send a response indicating successful logout
  res.status(200).json({ message: "Logged out successfully" });
});

app.listen(port, () => {
  console.log("listening on port " + port);
});
