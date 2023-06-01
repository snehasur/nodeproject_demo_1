const asyncHandler = require("express-async-handler");
const Order = require("../models/orderModel");
const Product = require("../models/productModel");
const User = require("../models/userModel");
const Ordernew = require("../models/ordernewModel");
const Checkout = require("../models/checkoutModel");
const Payment = require("../models/paymentModel");
const Addtocart = require("../models/addtocartModel");

//@desc Get all orders for admin
//@route Get /api/orders
//@access private
const getorders = async (req,res,next) => {  

const orders =await Order.find().populate('User').populate('product');
    
// for (const val of orders) {
//     const productall = await Product.findById(val.productid);
//     const productall1 = JSON.parse(JSON.stringify(productall));
//     const user=await User.find({_id:val.userid});
//     //console.log(user);
//     const useralldata=JSON.parse(JSON.stringify(user));
//     let orderdata = {
//       orderid:val._id,
//       username:useralldata.username,
//       name: productall1.name,
//       price: productall1.price,
//       description: productall1.description,
//       image: productall1.image
      
//     }
//    // //console.log('orderdata', orderdata)
//     orderdataall.push(orderdata);
//   }
 ////console.log("orderdataall", orders);   
 res.status(200).json({data:orders,message:"success",status:"success"});
}


///get order count
const getordersnew = asyncHandler (async (req,res,next)=>{       
    if(req.user.role!==1){
        //console.log("User don't have permission.");
        // res.status(403);
        res.status(403).json({message:"User don't have permission to update other user orders.",status:"error"});
       // throw new Error("User don't have permission.");//not working
       res.end();
    }else{
          const orders =await Order.find().count();
          //console.log(orders);
          res.setHeader('Content-Type', 'application/json');
          res.status(200).json({data:orders,message:"success"});
          res.end();
  }

});
//@desc Create new order
//@route POST /api/orders
//@access private
const createorder = asyncHandler (async (req,res,next)=>{
    //console.log("The request body is",req.body);
    const {userid,productid}=req.body;
    // if(!name || !price || !description){
    //     res.status(400).json({message:"All fields are mandetory",status:"error"});
    //     throw new Error("All fields are mandetory")
    // }
    const order = await Order.create({
        User: userid,
        product: productid
    });
    //console.log(order);
    //res.status(200).json({message:"Create orders"});
    res.status(200).json({data:order,message:"success",status:"success"});
    res.end();
   
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

        //console.log(order.user_id.toString());
        //console.log(req.user.id);
        //console.log("User don't have permission to update other user orders");
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
    //console.log(req.body);
    const order = await order.findById(req.params.id);
    if(!order){
        res.status(404).json({message:"order not found",status:"error"});
        throw new Error("order not found");
    }

    if(order.user_id.toString() !==req.user.id){
        // res.status(403);
        //console.log("User don't have permission to update other user orders");
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
        //console.log("User don't have permission to update other user orders");
        throw new Error("User don't have permission to update other user orders");
    }
    await order.deleteOne({_id:req.params.id});
    //res.status(200).json({message:`Delete order for ${req.params.id}` });
    res.status(200).json({data:order,message:"success"});
});

//@desc Get all orders count
//@route Get /api/orders/getordercount
//@access private
const getorderscount = asyncHandler (async (req,res,next)=>{ //not working
    //console.log("jkjkjj");
    if(req.user.role!==1){
        //console.log("User don't have permission.");
        // res.status(403);
        res.status(403).json({message:"User don't have permission to update other user orders.",status:"error"});
       // throw new Error("User don't have permission.");//not working
       res.end();
    }else{
          const orders =await Order.find().count();
          //console.log(orders);
          res.setHeader('Content-Type', 'application/json');
          res.status(200).json({data:orders,message:"success"});
          res.end();
  }
  
});

//@desc Get all orders for frontend
//@route GET /api/orders/myorders
//@access private
const getordersFrontend = asyncHandler (async (req,res)=>{
   
    const orders =await Order.find({User:req.user.id}).populate('User').populate('product');
    //res.status(200).json({message:"Get all orders"});
    res.status(200).json({data:orders,message:"success"});
    res.end();
});

//@desc Get order  details for frontend
//@route Get /api/orders/orderdetails/:id
//@access public
const getorderdetailsFrontend = asyncHandler (async (req,res)=>{
    //console.log(req.params.id);
    const order = await Order.findById(req.params.id);
    if(!order){
        res.status(404);
        throw new Error("order not found");
    }
    res.status(200).json({data:order,message:"success"});
});
const getneworder = (req,res)=>{
    //console.log("jhjhhj");
    
};
// new //////////
//@desc Create new order
//@route POST /api/orders/createordernew
//@access private
const createordernew = asyncHandler (async (req,res,next)=>{
    //console.log("The request body is",req.body);
    const {userid}=req.body;
    var cartdataall = [];
    if(!userid){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }
    const checkoutdata =await Checkout.find({User:userid,status:1});
    const paymentdata =await Payment.find({User:userid,status:1});
    const productsdata =await Addtocart.find({User:userid,status:1});
    const userdata =await User.find({_id:userid});




    
    const products =await Addtocart.find({User:userid});
    const cartproduct=products[0].product.split("-");
   // //console.log(cartproduct);


    const counts = {};
    cartproduct.forEach(function (x) { counts[x] = (counts[x] || 0) + 1; });
    //console.log('userdata',userdata);



    var cartdata=[];


    for (const [key, value] of Object.entries(counts)) {
      ////console.log(key, value);
      const productall = await Product.findById(key);
      cartdata ={
        userid:products[0].User,
        Pid:key,
        Pname: productall.name,
        Pprice: productall.price,
        Pdescription: productall.description,
        Pimage: productall.image,
        Pcount:value
      }
      cartdataall.push(cartdata);  
    }
        const order = await Ordernew.create({
        User: userdata,
        checkoutdata: checkoutdata,
        paymentdata:paymentdata,
        products:cartdataall
        });

        const filter = { User: userid,status:1};
        const update = { orderid: order._id.toString(),status:0 };      

        const payment = await Payment.findOneAndUpdate(filter, update, {
        new: true
        });
        const addtocartupdate = {  User: userid,status: 1};
        const update1 = { status: 0 };
        const cart = await Addtocart.findOneAndUpdate(addtocartupdate, update1, {
               new: true
             });
             
            
    //res.status(200).json({message:"Create orders"});
    res.status(200).json({data:order,message:"success",status:"success"});
    res.end();
   
});
const getorderrecent = asyncHandler (async (req,res,next)=>{
    const {orderid}=req.body;
    ////console.log('id', orderid);
    const orders =await Ordernew.find({_id:orderid});    
    res.status(200).json({data:orders,message:"success",status:"success"});
    res.end();
});
module.exports = {
    getorders,
    createorder,
    getorder,
    updateorder,
    deleteorder,
    getorderscount,
    getordersFrontend,
    getorderdetailsFrontend,
    getneworder,
    getordersnew,
    createordernew,
    getorderrecent
};