const asyncHandler = require("express-async-handler");
const Order = require("../models/orderModel");
const Product = require("../models/productModel");
const User = require("../models/userModel");
const Checkout = require("../models/checkoutModel");

//@desc POST all details
//@route POST /api/checkout/getcheckout
//@access private
const getcheckout = async (req,res,next) => {  
    const {userid}=req.body;
const data =await Checkout.find({User:userid});
     
 res.status(200).json({data:data,message:"success",status:"success"});
}

//@desc Create new order
//@route POST /api/checkout/checkout
//@access private
const create = asyncHandler (async (req,res,next)=>{
    var status;
    const {userid,firstname,lastname,address,address2,country,state,zip,phoneno}=req.body;
    if(!userid || !firstname || !lastname || !address  || !country || !state || !zip || ! phoneno){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }else{
     //   const hasuser =await Checkout.find({User:userid});
    // if(hasuser.length <= 0){
    //     status=1;
    // }else{
        status=0;
        const filter = { User: userid};
        const update = { status: 0 };
        
       
        const updatedata = await Checkout.updateMany(filter, update, {
          new: true
        });
   // }
    const checkout = await Checkout.create({
        User: userid,
        firstname: firstname,
        lastname:lastname,
        address:address,
        address2:address2,
        country:country,
        state:state,
        zip:zip,
        phoneno:phoneno,
        status:1
    });
    res.status(200).json({data:checkout,message:"success",status:"success"});
    res.end();
    }
    
   
});


//@desc update details
//@route POST /api/checkout/defaultcheckout
//@access private
const defaultcheckout = asyncHandler (async (req,res,next)=>{
    var status;
    const {id,userid}=req.body;
    if(!id || !userid){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }else{

        
        const filter = { User: userid};
        const update = { status: 0 };
        
       
        const updatedata = await Checkout.updateMany(filter, update, {
          new: true
        });

        const filter1 = { _id: id};
        const update1 = { status: 1 };
        
       
        const updatedata1 = await Checkout.findOneAndUpdate(filter1, update1, {
          new: true
        });
  
    res.status(200).json({data:updatedata1,message:"success",status:"success"});
    res.end();
    }
    
   
});
//@desc update details
//@route POST /api/checkout/defaultcheckout
//@access private
const getdefaultcheckout = asyncHandler (async (req,res,next)=>{
    const {id,userid}=req.body;
    if(!userid){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }else{
        const data =await Checkout.find({User:userid,status:1});

      
    res.status(200).json({data:data,message:"success",status:"success"});
    res.end();
    }
    
   
});
module.exports = {
    getcheckout,
    create,
    defaultcheckout,
    getdefaultcheckout
    
};