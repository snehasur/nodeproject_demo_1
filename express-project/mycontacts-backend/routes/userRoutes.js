const express = require("express");
const { registerUser,loginUser,currentUser } = require("../controllers/userController");
const validateToken = require("../middleware/validateTokenHandler");
const router = express.Router();
// router.post("/register",(req,res)=>{
//   res.json({message:"Register the user"});
// });
router.post("/register",registerUser);
router.post("/login",loginUser);
router.get("/current",validateToken ,currentUser);
module.exports = router;