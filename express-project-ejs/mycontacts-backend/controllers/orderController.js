const asyncHandler = require("express-async-handler");
const Order = require("../models/orderModel");
const Product = require("../models/productModel");
//@desc Get all orders for admin
//@route Get /api/orders
//@access private
const getorders = asyncHandler (async (req,res)=>{
    
    const orders =await Order.find({userid:req.user.id});


    const arr = Object.keys(orders).map((key) => [key, orders[key]]);
 
    for (var i in arr) {
        val = conf[i];
        console.log(i);
      }
    // const products=await Product.find({userid:req.user.id});
    console.log("rrrrrrrrrrrrr");
    
    
   // console.log(orders);
    if(orders!="")
    res.status(200).json({data:orders,message:"success",status:"success"});
    else
    res.status(500).json({message:"Something went wrong please try again after sometime...."});
});
//@desc Create new order
//@route POST /api/orders
//@access private
const createorder = asyncHandler (async (req,res)=>{
    console.log("The request body is",req.body);
    const {userid,productid}=req.body;
    // if(!name || !price || !description){
    //     res.status(400).json({message:"All fields are mandetory",status:"error"});
    //     throw new Error("All fields are mandetory")
    // }
    const order = await Order.create({
       userid,
       productid
    });
    //res.status(200).json({message:"Create orders"});
    res.status(200).json({data:order,message:"success",status:"success"});
});
//@desc Get order
//@route Get /api/orders/:id
//@access private
const getorder = asyncHandler (async (req,res)=>{
    const order = await order.findById(req.params.id);
    if(!order){
        res.status(404).json({message:"order not found",status:"error"});
        throw new Error("order not found");
    }
    if(order.user_id.toString() !==req.user.id){

        console.log(order.user_id.toString());
        console.log(req.user.id);
        console.log("User don't have permission to update other user orders");
        // res.status(403);
        res.status(403).json({message:"User don't have permission.",status:"error"});
        throw new Error("User don't have permission to update other user orders");//not working
    }else{
    res.status(200).json({data:order,message:"success",status:"success"});
    }

});


//@desc Update order
//@route Put /api/orders/:id
//@access private
const updateorder = asyncHandler ( async (req,res)=>{
    console.log(req.body);
    const order = await order.findById(req.params.id);
    if(!order){
        res.status(404).json({message:"order not found",status:"error"});
        throw new Error("order not found");
    }

    if(order.user_id.toString() !==req.user.id){
        // res.status(403);
        console.log("User don't have permission to update other user orders");
        res.status(403).json({message:"User don't have permission.",status:"error"});
        throw new Error("User don't have permission to update other user orders");//not working
    }
    const updateorder =await order.findByIdAndUpdate(
        req.params.id,
        req.body,{new:true}
    );
    res.status(200).json({data:updateorder,message:"success",status:"success"});

});


//@desc Delete order
//@route DELETE /api/orders/:id
//@access private
const deleteorder = asyncHandler( async (req,res)=>{
    const order = await order.findById(req.params.id);
    if(!order){
        res.status(404).json({message:"order not found.",status:"error"});
        throw new Error("order not found");
    }
    if(order.user_id.toString() !==req.user.id){
        res.status(403).json({message:"User don't have permission to update other user orders.",status:"error"});
        console.log("User don't have permission to update other user orders");
        throw new Error("User don't have permission to update other user orders");
    }
    await order.deleteOne({_id:req.params.id});
    //res.status(200).json({message:`Delete order for ${req.params.id}` });
    res.status(200).json({data:order,message:"success"});
});

//@desc Get all orders count
//@route Get /api/orders/getordercount
//@access private
const getorderscount = asyncHandler (async (req,res)=>{ //not working
    console.log("jkjkjj")
    // res.status(200).json({data:"orders"});
    // console.log("req.user");
    if(req.user.role!==1){
        console.log("User don't have permission.");
        // res.status(403);
        res.status(403).json({message:"User don't have permission to update other user orders.",status:"error"});
        throw new Error("User don't have permission.");//not working
    }else{
          const orders =await order.find().count();
          console.log(orders);
          res.status(200).json({data:order,message:"success"});
    }
  
});

//@desc Get all orders for frontend
//@route Get /api/allorders
//@access public
const getordersFrontend = asyncHandler (async (req,res)=>{
    const orders =await order.find();

    //res.status(200).json({message:"Get all orders"});
    res.status(200).json({data:order,message:"success"});
});

//@desc Get order  details for frontend
//@route Get /api/orders/orderdetails/:id
//@access public
const getorderdetailsFrontend = asyncHandler (async (req,res)=>{
    console.log(req.params.id);
    const order = await order.findById(req.params.id);
    if(!order){
        res.status(404);
        throw new Error("order not found");
    }
    res.status(200).json({data:order,message:"success"});
});
const getneworder = (req,res)=>{
    console.log("jhjhhj");
    
};

module.exports = {
    getorders,
    createorder,
    getorder,
    updateorder,
    deleteorder,
    getorderscount,
    getordersFrontend,
    getorderdetailsFrontend,
    getneworder
};