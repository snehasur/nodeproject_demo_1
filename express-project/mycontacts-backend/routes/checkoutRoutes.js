const express = require("express");
const router = express.Router();
const {
  create,
  getcheckout,
  defaultcheckout,
  getdefaultcheckout

      } = require("../controllers/checkoutController");



router.route("/checkout").post(create);
router.route("/getcheckout").post(getcheckout);
router.route("/defaultcheckout").post(defaultcheckout);
router.route("/getdefaultcheckout").post(getdefaultcheckout);





const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);


module.exports = router;