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
    getneworder
      } = require("../controllers/orderController");



router.route("/allorders").get(getordersFrontend);
router.route("/orderdetails/:id").get(getorderdetailsFrontend);


const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);
router.route("/").get(getorders).post(createorder);
router.route("/:id").get(getorder).put(updateorder).delete(deleteorder);
router.route("/getorderscount").get(getorderscount);
router.route("/getneworder").get(getneworder);

module.exports = router;