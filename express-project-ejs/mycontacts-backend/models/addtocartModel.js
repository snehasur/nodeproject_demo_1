const mongoose = require("mongoose");

const addtocartSchema = mongoose.Schema({
    productid: {
        type: String,
        required: [true,"Please add the product id"],
    },
    name: {
        type: Number,
        required: [true,"Please add the name"],
    },
    price: {
        type: Number,
        required: [true,"Please add the price"],
    },
    description: {
        type: String,
        required: [true,"Please add the description"],
    },
    image: {
        type: String,
        required: [true,"Please add the image"],
    },
    

},{
    timestamps:true,
});

module.exports =mongoose.model("addtocart",addtocartSchema);