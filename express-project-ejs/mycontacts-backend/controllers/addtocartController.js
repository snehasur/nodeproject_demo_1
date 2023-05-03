const asyncHandler = require("express-async-handler");
const Addtocart = require("../models/addtocartModel");

//@desc Add to cart product
//@route Get /api/products/add-to-cart
//@access public
const Addtocartproduct = asyncHandler (async (req,res)=>{
    console.log("hi");
    console.log("The request body is",req.body);
    const {productid,name,price,description,image}=req.body;
    if(!productid ||!name || !price || !description){
        res.status(400);
        throw new Error("All fields are mandetory")
    }
    const product = await Addtocart.create({
        productid,
        name,
        price,
        description,
        image
    });
    res.status(200).json(product);
});

//@desc Get all Add to cart products
//@route Get /api/products/add-to-cart
//@access public
const AddtocartProducts = asyncHandler (async (req,res)=>{
    const products =await Addtocart.find();

    //res.status(200).json({message:"Get all products"});
    res.status(200).json({message:products});
});
module.exports = {
    Addtocartproduct,
    AddtocartProducts
};