const asyncHandler = require("express-async-handler");
const Product = require("../models/productModel");
//@desc Get all products
//@route Get /api/products
//@access private
const getProducts = asyncHandler (async (req,res)=>{
    const products =await Product.find({user_id:req.user.id});

    //res.status(200).json({message:"Get all products"});
    res.status(200).json({message:products});
});
//@desc Create new product
//@route POST /api/products
//@access private
const createProduct = asyncHandler (async (req,res)=>{
    console.log("The request body is",req.body);
    const {name,price,description,image}=req.body;
    if(!name || !price || !description){
        res.status(400);
        throw new Error("All fields are mandetory")
    }
    const product = await Product.create({
        name,
        price,
        description,
        image,
        user_id:req.user.id
    });
    //res.status(200).json({message:"Create products"});
    res.status(200).json(product);
});
//@desc Get product
//@route Get /api/products/:id
//@access private
const getProduct = asyncHandler (async (req,res)=>{
    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404);
        throw new Error("Product not found");
    }
    if(product.user_id.toString() !==req.user.id){

        console.log(product.user_id.toString());
        console.log(req.user.id);
        console.log("User don't have permission to update other user products");
        req.status(403);
        throw new Error("User don't have permission to update other user products");//not working
    }
    //res.status(200).json({message:`Get product for ${req.params.id}`});
    res.status(200).json(product);
});


//@desc Update product
//@route Put /api/products/:id
//@access private
const updateProduct = asyncHandler ( async (req,res)=>{
    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404);
        throw new Error("Product not found");
    }

    if(product.user_id.toString() !==req.user.id){
        req.status(403);
        console.log("User don't have permission to update other user products");
        throw new Error("User don't have permission to update other user products");//not working
    }
    const updateProduct =await Product.findByIdAndUpdate(
        req.params.id,
        req.body,{new:true}
    );
    //res.status(200).json({message:`Update product for ${req.params.id}`});
    res.status(200).json(updateProduct);

});


//@desc Delete product
//@route DELETE /api/products/:id
//@access private
const deleteProduct = asyncHandler( async (req,res)=>{
    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404);
        throw new Error("Product not found");
    }
    if(product.user_id.toString() !==req.user.id){
        req.status(403);
        console.log("User don't have permission to update other user products");
        throw new Error("User don't have permission to update other user products");
    }
    await Product.deleteOne({_id:req.params.id});
    //res.status(200).json({message:`Delete product for ${req.params.id}` });
    res.status(200).json(product);
});

//@desc Get all products count
//@route Get /api/products/getproductcount
//@access private
const getProductscount = asyncHandler (async (req,res)=>{ //not working
    console.log("d");
    console.log(req.user);
    if(req.user.role!==1){
        console.log("User don't have permission.");
        req.status(403);
        throw new Error("User don't have permission.");//not working
    }
    const products =await Product.find().count();

    res.status(200).json({message:products});
});

//@desc Get all products
//@route Get /api/allproducts
//@access public
const getProductsFrontend = asyncHandler (async (req,res)=>{
    const products =await Product.find();

    //res.status(200).json({message:"Get all products"});
    res.status(200).json({message:products});
});

//@desc Get product
//@route Get /api/products/productdetails/:id
//@access public
const getProductdetailsFrontend = asyncHandler (async (req,res)=>{
    console.log(req.params.id);
    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404);
        throw new Error("Product not found");
    }
    res.status(200).json(product);
});

module.exports = {
    getProducts,
    createProduct,
    getProduct,
    updateProduct,
    deleteProduct,
    getProductscount,
    getProductsFrontend,
    getProductdetailsFrontend
};