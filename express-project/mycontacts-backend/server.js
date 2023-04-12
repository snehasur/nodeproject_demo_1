//console.log("hi");
const express = require("express");
const connectDb = require("./config/dbConnection");
const errorHandler = require("./middleware/errorHandler");
const dotnet = require("dotenv").config();
connectDb(); 

const app =express();
const port = process.env.PORT || 5000;
app.use(express.json());
// app.get("/api/contacts",(req,res)=>{
//     //res.send("Get all contacts");
//     res.status(200).json({message:"Get all contacts"});
// });  //or

app.use("/api/contacts",require("./routes/contactRoutes"));  
app.use("/api/products",require("./routes/productRoutes"));  
app.use("/api/users",require("./routes/userRoutes"));  
app.use("/api/products",require("./routes/addtocartRoutes"));  

app.use(errorHandler);
app.listen(port,()=>{
    console.log(`server running on port ${port}`);
});  