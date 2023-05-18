const mongoose = require("mongoose");

const UserdetailsModelSchema = mongoose.Schema({
    firstname: {
        type: String,
        required: [true,"Please add firstname"],
    },
    lastname: {
        type: String,
        required: [true,"Please add lastname"]
    },
    address: {
        type: String,
        required: [true,"Please add address"],
    },
    address2: {
        type: Number,
        required: [true,"Please add address2"],
    },
    country: {
        type: Number,
        required: [true,"Please add country"],
    },
    state: {
        type: Number,
        required: [true,"Please add state"],
    },
    zip: {
        type: Number,
        required: [true,"Please add zip"],
    },
    

},{
    timestamps:true,
});

module.exports =mongoose.model("Userdetails",UserdetailsModelSchema);