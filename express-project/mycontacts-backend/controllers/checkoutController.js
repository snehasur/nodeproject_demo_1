const asyncHandler = require("express-async-handler");
const Order = require("../models/orderModel");
const Product = require("../models/productModel");
const User = require("../models/userModel");
const Checkout = require("../models/checkoutModel");

//@desc Get all orders for admin
//@route Get /api/orders
//@access private
const getorders = async (req,res,next) => {  

const orders =await Order.find().populate('User').populate('product');
     
 res.status(200).json({data:orders,message:"success",status:"success"});
}

//@desc Create new order
//@route POST /api/checkout/checkout
//@access private
const create = asyncHandler (async (req,res,next)=>{
    console.log("The request body is",req.body);
    const {userid,firstname,lastname,address,address2,country,state,zip}=req.body;
    if(!userid || !firstname || !lastname || !address  || !country || !state || !zip){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }
    const hasuser =await Addtocart.find({User:userid,});
    if(hasuser.length <= 0){
    const checkout = await Checkout.create({
        User: userid,
        firstname: firstname,
        lastname:lastname,
        address:address,
        address2:address2,
        country:country,
        state:state,
        zip:zip
    });
    }else{
        const filter = { User: userid};
        const update = { product: newproduct };
        
       
        const products = await Addtocart.findOneAndUpdate(filter, update, {
          new: true
        });
    }
    console.log(checkout);
    res.status(200).json({data:checkout,message:"success",status:"success"});
    res.end();
   
});
module.exports = {
    getorders,
    create
    
};