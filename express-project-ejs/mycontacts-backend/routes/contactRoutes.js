const express = require("express");
const router = express.Router();
const {
    getContacts,
    createtContact,
    getContact,
    updateContact,
    deleteContact
      } = require("../controllers/contactController");
const validateToken =require("../middleware/validateTokenHandler");

router.use(validateToken);
// router.route("/").get((req,res)=>{
//     res.status(200).json({message:"Get all contacts"});
// }); //or

// router.route("/").get(getContacts);
// router.route("/").post(createtContact); //or
router.route("/").get(getContacts).post(createtContact);
// router.route("/:id").get(getContact);
// router.route("/:id").put(updateContact);
//router.route("/:id").delete(deleteContact);
router.route("/:id").get(getContact).put(updateContact).delete(deleteContact);
module.exports = router;