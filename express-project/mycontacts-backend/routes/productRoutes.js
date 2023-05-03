const express = require("express");
const router = express.Router();
const Product = require("../models/productModel");

const {
    getProducts,
    createProduct,
    getProduct,
    updateProduct,
    deleteProduct,
    getProductscount,
    getProductsFrontend,
    getProductdetailsFrontend
      } = require("../controllers/productController");


router.route("/allproducts").get(getProductsFrontend);
router.route("/productdetails/:id").get(getProductdetailsFrontend);



const validateToken =require("../middleware/validateTokenHandler");



router.route('/getproductscountnew')
    .get(function (req, res, next) {
      console.log("jkjkjj");
      // res.status(200).json({data:"products"});
      // console.log("req.user");
      // if(req.user.role!==1){
      //     console.log("User don't have permission.");
      //     // res.status(403);
      //     res.status(403).json({message:"User don't have permission to update other user products.",status:"error"});
      //    // throw new Error("User don't have permission.");//not working
      //     res.end();
      // }else{

            const products = Product.find("643973f142fac18596046e51");
            console.log(products);
            res.setHeader('Content-Type', 'application/json');
            res.send(JSON.stringify({key:products}));
            res.status(200).json({data:products,message:"success"});
            res.end();
      //}
    });
router.use(validateToken);    //if needed comment this line
router.route("/getproductscount").get(getProductscount);


router.route("/").get(getProducts).post(createProduct);

router.route("/:id").get(getProduct).put(updateProduct).delete(deleteProduct);

// router.route("/:id").get(getProduct).put(updateProduct).delete(deleteProduct);
router.use(validateToken);
module.exports = router;