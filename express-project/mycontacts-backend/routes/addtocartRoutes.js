const express = require("express");
const router = express.Router();
const {
  addtocartproduct,
  addtocartProducts,
  addtocartproductcount,
  deleteonefromcartProducts

      } = require("../controllers/addtocartController");



router.route("/add-to-cart").post(addtocartproduct);
router.route("/add-to-cart-count").post(addtocartproductcount);
router.route("/all-add-to-cart").post(addtocartProducts);
router.route("/deleteone-add-to-cart").post(deleteonefromcartProducts);



const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);


module.exports = router;