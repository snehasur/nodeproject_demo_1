const express = require("express");
const router = express.Router();
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

router.use(validateToken);
router.route("/").get(getProducts).post(createProduct);
router.route("/getproductscount").get(getProductscount);
router.route("/:id").get(getProduct).put(updateProduct).delete(deleteProduct);

// router.route("/:id").get(getProduct).put(updateProduct).delete(deleteProduct);

module.exports = router;