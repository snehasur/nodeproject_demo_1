const express = require("express");
const connectDB = require("./config/db");
const dotnet = require("dotenv").config({
  path: "backend/.env",
});
const { chats } = require("./data/data");
const userRoutes = require("./routes/userRoutes");
const chatRoutes = require("./routes/chatRoutes");
const { notFound, errorHandler } = require("./middleware/errorMiddleware");
connectDB();
const app = express();
app.use(express.json()); //to accept JSON data

app.use((req, res, next) => {
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader("Access-Control-Allow-Methods", "POST, GET, PUT, PATH, PATCH");
  res.setHeader("Access-Control-Allow-Headers", "Content-Type, Authorization");
  next();
});

app.get("/", (req, res) => {
  res.send("api is running");
});
// app.get("/api/chat", (req, res) => {
//   res.send(chats);
// });
// app.get("/api/chat/:id", (req, res) => {
//   //  console.log(req.params.id);
//   const singleChats = chats.find((c) => c._id === req.params.id);
//   res.send(singleChats);
// });
app.use("/api/user", userRoutes);
app.use("/api/chat", chatRoutes);
// Error Handling middlewares
app.use(notFound);
app.use(errorHandler);

const PORT = process.env.PORT || 5001;
app.listen(5000, console.log(`Server Started on PORT ${PORT}`));
