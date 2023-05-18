const mongoose = require("mongoose");

const addtocartSchema = mongoose.Schema({
    
    User: {
        type: String,
        ref: "User",
        required: [true,"Need user id"],
    },
    product: {
        type: String,
        ref: "product",
        required: [true,"Need product id"],
    }
    

},{
    timestamps:true,
});

module.exports =mongoose.model("addtocart",addtocartSchema);