const asyncHandler = require("express-async-handler");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");

const User = require("../models/userModel");
 
//@desc Register a user
//@route POST /api/users/register
//@access public
const registerUser = asyncHandler (async (req,res)=>{
   // res.status(200).json("1");
   const {username,email,password}=req.body;
    if(!username || !email || !password){
        res.status(400);
        throw new Error("All fields are mandetory");
    }

    const userAvailable = await User.findOne({email});
    if(userAvailable){
        res.status(404);
        throw new Error("User already registrated");
    }
    //Hash password
    const hashedPassword =  await bcrypt.hash(password, 10);
    console.log("Hash password",hashedPassword);
    const user = await User.create({
        username,
        email,
        password:hashedPassword,
        role:2
    });
    console.log(`User created ${user}`);
    if(user){
        res.status(201).json({_id:user.id,email:user.email});
    }else{
        res.status(400);
        throw new Error("User data us not valid");

    }
   res.json({message:"Register"});
});

//@desc Login user
//@route POST /api/users/login
//@access public
const loginUser = asyncHandler (async (req,res)=>{
    const {email,password}=req.body;
    if(!email || !password){
        res.status(400);
        throw new Error("All fields are mandetory");
    }
    const user= await User.findOne({email});
    //compare password with hashedpassword
    if(user && (await bcrypt.compare(password,user.password))){

        const accessToken = jwt.sign({
            user:{
                username:user.username,
                email:user.email,
                id:user.id,
                role:user.role,
                },

            },
            process.env.ACCESS_TOKEN_SECERT,
            {expiresIn:"100d"}
        );
        res.status(200).json({accessToken,email,id:user.id,role:user.role});
    }else{
        res.status(401);
        throw new Error("email or password is not valid");
    }
});

//@desc Current user info
//@route GET /api/users/current
//@access private
const currentUser = asyncHandler (async (req,res)=>{
    res.json(req.user);
});
//@desc Get all users(customer)
//@route Get /api/users
//@access private
const getUsers = asyncHandler (async (req,res)=>{
    
    console.log(req.user.role);
    if(req.user.role!==1){
        console.log("User don't have permission.");
        //res.status(403);
        res.status(403).json({message:"User don't have permission to update other user products.",status:"error"});
        throw new Error("User don't have permission.");//not working
    }
    const users =await User.find({role:2});
    res.status(200).json({data:users,message:"success"});
});
//@desc Get all users count(customer)
//@route Get /api/getuserscount
//@access private
const getUserscount = asyncHandler (async (req,res)=>{
    console.log(req.user.role);
    if(req.user.role!==1){
        console.log("User don't have permission.");
        res.status(403).json({message:"User don't have permission to update other user products.",status:"error"});
        //res.status(403);
        throw new Error("User don't have permission.");//not working
    }else{
        const users =await User.find({role:2}).count();  
        
        res.status(200).json({data:users,message:"success"});
    }
  

});
//@desc Get users details
//@route Get /api/getusersdetails
//@access private
const getUserdetails= asyncHandler (async (req,res)=>{
  
        const users =await User.find({email:req.user.email});  
        
        res.status(200).json({data:users,message:"success"});
  

});
//@desc Put users details
//@route Put /api/updateUserdetails
//@access private
const updateUserdetails= asyncHandler (async (req,res)=>{
    console.log(req.user.id);
    const updateUserdetails =await User.findByIdAndUpdate(
        req.user.id,
        req.body,{new:true}
    );
    res.status(200).json({data:updateUserdetails,message:"success",status:"success"});

});

module.exports = {
    registerUser,
    loginUser,
    currentUser,
    getUsers,
    getUserscount,
    getUserdetails,
    updateUserdetails
};