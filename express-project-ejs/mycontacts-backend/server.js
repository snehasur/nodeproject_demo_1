//console.log("hi");
const express = require("express");
const connectDb = require("./config/dbConnection");
const errorHandler = require("./middleware/errorHandler");
const dotnet = require("dotenv").config();
connectDb(); 
var cors = require('cors');

const app =express();

app.set('view engine', 'ejs');
app.set('views', 'views');


const port = process.env.PORT || 5000;
app.use(express.json());
// app.get("/api/contacts",(req,res)=>{
//     //res.send("Get all contacts");
//     res.status(200).json({message:"Get all/ contacts"});
// });  //or
// use it before all route definitions
app.use(cors({origin: 'http://localhost/'}));

app.use("/api/contacts",require("./routes/contactRoutes"));  
app.use("/api/products",require("./routes/productRoutes"));  
app.use("/api/users",require("./routes/userRoutes"));  
//app.use("/api/products",require("./routes/addtocartRoutes"));  
//app.use("/api/products/getproductscount").get(getProductscount);
app.use('/api/products/getproductscount',(req,res) => {
    console.log('done');
    res.send('<h1>Home page</h1>');
});
app.use("/api/orders",require("./routes/orderRoutes"));  
app.use(errorHandler);
app.listen(port,()=>{
    console.log(`server running on port ${port}`);
});  