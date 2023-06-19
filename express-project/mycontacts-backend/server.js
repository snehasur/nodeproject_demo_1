const express = require("express");
const connectDb = require("./config/dbConnection");
const errorHandler = require("./middleware/errorHandler");
const dotnet = require("dotenv").config();
connectDb(); 
var cors = require('cors');

const app =express();
const port = process.env.PORT || 5000;
app.use(express.json());

// use it before all route definitions
app.use(cors({origin: 'http://localhost/'}));

app.use("/api/contacts",require("./routes/contactRoutes"));  
app.use("/api/products",require("./routes/productRoutes"));  
app.use("/api/users",require("./routes/userRoutes"));  
app.use("/api/cart",require("./routes/addtocartRoutes"));  
app.use("/api/checkout",require("./routes/checkoutRoutes"));  
app.use("/api/orders",require("./routes/orderRoutes"));  
app.use("/api/payment",require("./routes/paymentRoutesjs"));  
app.use(errorHandler);
app.listen(port,()=>{
    console.log(`server running on port ${port}`);
});  