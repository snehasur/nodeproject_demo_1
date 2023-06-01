const asyncHandler = require("express-async-handler");
const Addtocart = require("../models/addtocartModel");
const Product = require("../models/productModel");

//@desc Add to cart product
//@route post /api/cart/add-to-cart
//@access privte
const addtocartproduct = asyncHandler (async (req,res)=>{
    const {userid,productid}=req.body;

    const hasuser =await Addtocart.find({User:userid,status:1});
    ////console.log(hasuser);
    if(hasuser.length <= 0){

        const products = await Addtocart.create({
            User: userid,
            product: productid,
            status:1
        });
        const cartproductcount=products.product.split("-").length;    
        console.log(cartproductcount); 
        res.status(200).json({data:products,cartproductcount:cartproductcount,message:"success",status:"success"});
        res.end();
    }else{
        const prevproduct=hasuser[0].product;
       // //console.log(prevproduct,'prevproduct');
        if(prevproduct!=""){
           var newproduct= prevproduct.concat("-",productid );
        }else{
          var newproduct= productid;
        }
        ////console.log(newproduct,'newproduct');
        const filter = { User: userid,status:1};
        const update = { product: newproduct };
        
       
        const products = await Addtocart.findOneAndUpdate(filter, update, {
          new: true
        });
        ////console.log(products.product);
        const cartproductcount=products.product.split("-").length;    
        console.log(cartproductcount);   
        res.status(200).json({data:products,cartproductcount:cartproductcount,message:"success",status:"success"});
        res.end();
      
       
    }
    
});

//@desc Get all Add to cart products
//@route post /api/cart/all-add-to-cart
//@access privte
const addtocartProducts = asyncHandler (async (req,res)=>{
    const {userid}=req.body;
    var cartdataall = [];

    const products =await Addtocart.find({User:userid,status:1});
    const cartproduct=products[0].product.split("-");
    //console.log(cartproduct,'cartproduct');


    const counts = {};
    cartproduct.forEach(function (x) { counts[x] = (counts[x] || 0) + 1; });
   // //console.log(counts);



    var cartdata=[];


    for (const [key, value] of Object.entries(counts)) {
     // //console.log(key, value);
      const productall = await Product.findById(key);
      cartdata ={
        cartid:products[0]._id.toString(),
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

    ////console.log(cartdataall,'cartdataall');  

    res.status(200).json({data:cartdataall});
});

//@desc Add to cart product count
//@route post /api/cart/add-to-cart-count
//@access privte
const addtocartproductcount = asyncHandler (async (req,res)=>{
        const {userid}=req.body;
        const products =await Addtocart.find({User:userid,status:1}); 
        //console.log("products[0].product",products[0].product); 
        if(products[0].product!=""){
          var cartproductcount=products[0].product.split("-").length;   
        }else{
          var cartproductcount=0;
        }
         
        //console.log(cartproductcount,"cartcount");   
        res.status(200).json({cartproductcount:cartproductcount,message:"success",status:"success"});
        res.end();
       
    
    
});

//@desc Delete from cart product
//@route post /api/cart/deleteone-add-to-cart
//@access privte
const deleteonefromcartProducts = asyncHandler (async (req,res)=>{
  const {cartid,pid}=req.body;
  ////console.log(pid,'pid');
  var cartdataall= [];
  const products =await Addtocart.findById(cartid);  
  ////console.log(products.product,'oldproduct');


  const cartproduct=products.product.split("-");
  ////console.log(cartproduct,'split oldproduct');


  const counts = {};
  cartproduct.forEach(function (x) { counts[x] = (counts[x] || 0) + 1; });
 // //console.log(counts);

 
 var updatedcart= delete counts[pid]; 
 var newkey=[];
 ////console.log(counts,'after delete');

var str = "";

  for (var key in counts) {
     
      let i=0;
      for (i=0;i<counts[key];i++)
          {
              str += key+"-";
          }
 }
 var updatedcartproduct=str.substring(0, str.length-1);
// var updatedcartproducts = updatedcartproduct[0].substring(1);
// //console.log(updatedcartproduct[0],'delete -');

 const filter = { _id: cartid};
 const update = { product: updatedcartproduct };
 const cart = await Addtocart.findOneAndUpdate(filter, update, {
        new: true
      });
 //console.log(updatedcartproduct,'-delete');
     
  res.status(200).json({data:cart,message:"success",status:"success"});
  res.end();
 


});
module.exports = {
    addtocartproduct,
    addtocartProducts,
    addtocartproductcount,
    deleteonefromcartProducts
  };