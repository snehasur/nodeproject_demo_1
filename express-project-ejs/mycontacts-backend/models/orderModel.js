const mongoose = require("mongoose");

const orderSchema = mongoose.Schema({
    
    userid: {
        type: String,
        required: [true,"Need user id"],
    },
    productid: {
        type: String,
        required: [true,"Need product id"],
    }
    

},{
    timestamps:true,
});

module.exports =mongoose.model("order",orderSchema);