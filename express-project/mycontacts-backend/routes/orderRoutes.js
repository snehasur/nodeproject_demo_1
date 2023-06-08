const express = require("express");
const router = express.Router();
const {
    getorders,
    createorder,
    getorder,
    updateorder,
    deleteorder,
    getorderscount,
    getordersFrontend,
    getorderdetailsFrontend,
    getneworder,
    getordersnew,
    createordernew,
    getorderrecent
      } = require("../controllers/orderController");



router.route("/orderdetails/:id").get(getorderdetailsFrontend);


const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);
router.route("/myorders").get(getordersFrontend);

router.route("/").get(getorders).post(createorder);

router.route("/getorderscount").get(getordersnew);

router.route("/:id").get(getorder).put(updateorder).delete(deleteorder);
router.route("/getneworder").get(getneworder);

router.route("/createordernew").post(createordernew);
router.route("/getorderrecent").post(getorderrecent);


module.exports = router;