const express = require("express");
const router = express.Router();
const {
  create

      } = require("../controllers/checkoutController");



router.route("/checkout").post(create);




const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);


module.exports = router;