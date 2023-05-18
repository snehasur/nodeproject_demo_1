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
    getordersnew
      } = require("../controllers/orderController");



router.route("/orderdetails/:id").get(getorderdetailsFrontend);


const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);
router.route("/myorders").get(getordersFrontend);

router.route("/").get(getorders).post(createorder);

router.route("/getorderscount").get(getordersnew);

router.route("/:id").get(getorder).put(updateorder).delete(deleteorder);
//router.route("/getorderscount").get(getorderscount);
router.route("/getneworder").get(getneworder);
// router.route('/getorderscount')
//     .get(function (req, res, next) {
//       console.log("jkjkjj");      
//             res.setHeader('Content-Type', 'application/json');
//             res.send(JSON.stringify({key:"fdvdcf"}));
//             //res.status(200).json({data:products,message:"success"});
//             res.end();
//       //}
//     });
module.exports = router;