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
router.use(validateToken);    //if needed comment this line
router.route("/getproductscount").get(getProductscount);


router.route("/").get(getProducts).post(createProduct);

router.route("/:id").get(getProduct).put(updateProduct).delete(deleteProduct);

// router.route("/:id").get(getProduct).put(updateProduct).delete(deleteProduct);
router.use(validateToken);
module.exports = router;