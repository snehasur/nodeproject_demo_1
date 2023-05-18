const mongoose = require("mongoose");

const checkoutSchema = mongoose.Schema({
    
    User: {
        type: String,
        ref: "User",
        required: [true,"Need user id"],
    },
    firstname: {
        type: String,        
        required: [true,"Need firstname"],
    },
    lastname: {
        type: String,        
        required: [true,"Need lastname"],
    },
    address: {
        type: String,        
        required: [true,"Need address"],
    },
    address2: {
        type: String,        
        required: [true,"Need address2"],
    },
    country: {
        type: String,        
        required: [true,"Need country"],
    },
    state: {
        type: String,        
        required: [true,"Need state"],
    },
    zip: {
        type: String,        
        required: [true,"Need zip"],
    }
    

},{
    timestamps:true,
});

module.exports =mongoose.model("checkout",checkoutSchema);