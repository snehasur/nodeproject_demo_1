const mongoose = require("mongoose");

const paymentSchema = mongoose.Schema({
    
    User: {
        type: String,
        ref: "User",
        required: [true,"Need user id"],
    },
    type: {
        type: String,        
        required: [true,"Need type"],
    },
    orderid: {
        type: String
    },
    status: {
        type: String
    },

    

},{
    timestamps:true,
});

module.exports =mongoose.model("payment",paymentSchema);