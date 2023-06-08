const mongoose = require("mongoose");

const ordernewSchema = mongoose.Schema({
    userid: {
        type: String,
        ref: "User",
        required: [true,"Need user id"],
    },
    User: {
        type: Object,
        ref: "User",
        required: [true,"Need user details"],
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