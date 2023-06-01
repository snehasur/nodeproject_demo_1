const mongoose = require("mongoose");

const ordernewSchema = mongoose.Schema({
    
    User: {
        type: Object,
        ref: "User",
        required: [true,"Need user id"],
    },
    checkoutdata: {
        type: Object,
        ref: "checkout",
        required: [true,"Need checkoutdata"],
    },
    paymentdata: {
        type: Object,
        ref: "payment",
        required: [true,"Need paymentdata"],
    },
    products: {
        type: Object,
        ref: "product",
        required: [true,"Need products"],
    }
    

},{
    timestamps:true,
});

module.exports =mongoose.model("ordernew",ordernewSchema);