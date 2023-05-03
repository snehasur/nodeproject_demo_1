const express = require("express");
const router = express.Router();
const {
  Addtocartproduct,
  AddtocartProducts
      } = require("../controllers/addtocartController");



router.route("/add-to-cart").post(Addtocartproduct);
router.route("/all-add-to-cart").post(AddtocartProducts);


const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);


module.exports = router;