const asyncHandler = require("express-async-handler");
const Product = require("../models/productModel");
//@desc Get all products for admin
//@route Get /api/products
//@access private
const getProducts = asyncHandler (async (req,res,next)=>{

    const products =await Product.find({user_id:req.user.id});
    if(products!=""){
        res.status(200).json({data:products,message:"success",status:"success"});
        res.end();
    }    
    else{
      res.status(500).json({message:"Something went wrong please try again after sometime...."});  
      res.end();
    }
    
});
//@desc Create new product
//@route POST /api/products
//@access private
const createProduct = asyncHandler (async (req,res)=>{

    const {name,price,description,image}=req.body;
    // if(!name || !price || !description){
    //     res.status(400).json({message:"All fields are mandetory",status:"error"});
    //     throw new Error("All fields are mandetory")
    // }
    const product = await Product.create({
        name,
        price,
        description,
        image,
        user_id:req.user.id
    });

    res.status(200).json({data:product,message:"success",status:"success"});
    res.end();
});
//@desc Get product
//@route Get /api/products/:id
//@access private
const getProduct = asyncHandler (async (req,res,next)=>{

    const product = await Product.findById(req.params.id);

    if(!product){
        res.status(404).json({message:"Product not found",status:"error"});
        throw new Error("Product not found");
        res.end();
    }
    if(product.user_id.toString() !==req.user.id){





        res.status(403).json({message:"User don't have permission.",status:"error"});
        throw new Error("User don't have permission to update other user products");//not working
        res.end();
    }else{
    res.status(200).json({data:product,message:"success",status:"success"});
    res.end();
    }

});


//@desc Update product
//@route Put /api/products/:id
//@access private
const updateProduct = asyncHandler ( async (req,res,next)=>{

    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404).json({message:"Product not found",status:"error"});
        throw new Error("Product not found");
        res.end();
    }

    if(product.user_id.toString() !==req.user.id){


        res.status(403).json({message:"User don't have permission.",status:"error"});
        throw new Error("User don't have permission to update other user products");//not working
        res.end();
    }
    const updateProduct =await Product.findByIdAndUpdate(
        req.params.id,
        req.body,{new:true}
    );
    res.status(200).json({data:updateProduct,message:"success",status:"success"});
    res.end();

});


//@desc Delete product
//@route DELETE /api/products/:id
//@access private
const deleteProduct = asyncHandler( async (req,res,next)=>{
    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404).json({message:"Product not found.",status:"error"});
        throw new Error("Product not found");
        res.end();
    }
    if(product.user_id.toString() !==req.user.id){
        res.status(403).json({message:"User don't have permission to update other user products.",status:"error"});

        throw new Error("User don't have permission to update other user products");
        res.end();
    }
    await Product.deleteOne({_id:req.params.id});

    res.status(200).json({data:product,message:"success"});
    res.end();
});

//@desc Get all products count
//@route Get /api/products/getproductcount
//@access private
const getProductscount = asyncHandler (async (req,res,next)=>{ //not working
    

    
    if(req.user.role!==1){


        res.status(403).json({message:"User don't have permission to update other user products.",status:"error"});
        throw new Error("User don't have permission.");//not working
        res.end();
    }else{      
        
        const products =await Product.find().count();       
        
        res.status(200).json({data:products,message:"success"});
        res.end();
    }
  
});

//@desc Get all products for frontend
//@route Get /api/allproducts
//@access public
const getProductsFrontend = asyncHandler (async (req,res,next)=>{
    const products =await Product.find();

    res.status(200).json({data:products,message:"success"});
    res.end();
});

//@desc Get product  details for frontend
//@route Get /api/products/productdetails/:id
//@access public
const getProductdetailsFrontend = asyncHandler (async (req,res,next)=>{
    const product = await Product.findById(req.params.id);
    if(!product){
        res.status(404);
        throw new Error("Product not found");
        res.end();
    }
    res.status(200).json({data:product,message:"success"});
    res.end();
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