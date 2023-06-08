const asyncHandler = require("express-async-handler");
const Payment = require("../models/paymentModel");


//@desc Create new payment
//@route POST /api/payment/add
//@access private
const create = asyncHandler (async (req,res,next)=>{
    //console.log("The request body is",req.body);
    var status;
    const {userid,type}=req.body;
    if(!userid || !type){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }else{
        //const hasuser =await Payment.find({User:userid,status:0});
        //if(hasuser.length <= 0){
    
            const payment = await Payment.create({
                User: userid,
                type: type,
                status:1
            });
            //console.log(payment);
            res.status(200).json({data:payment,message:"success",status:"success"});
            res.end();
        // }else{


        // const filter = { User: userid};
        // const update = { type: type ,status:1};      
       
        // const payment = await Payment.findOneAndUpdate(filter, update, {
        //   new: true
        // });
        // //console.log(payment);
        //     res.status(200).json({data:payment,message:"update success",status:"success"});
        //     res.end();
    //}
    
}
});
//@desc get payment
//@route POST /api/payment/get
//@access private
const get = asyncHandler (async (req,res,next)=>{
    //console.log("The request body is",req.body);
    var status;
    const {userid}=req.body;
    if(!userid){
        res.status(400).json({message:"All fields are mandetory",status:"error"});
        throw new Error("All fields are mandetory")
    }else{
        const data =await Payment.find({User:userid});
        res.status(200).json({data:data,message:"success",status:"success"});
        res.end();
    
}
});

module.exports = {
    create,
    get
    
};