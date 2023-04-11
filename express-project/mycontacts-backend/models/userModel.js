const mongoose = require("mongoose");

const UserSchema = mongoose.Schema({
    username: {
        type: String,
        required: [true,"Please add the username"],
    },
    email: {
        type: String,
        required: [true,"Please add the email"],
        unique:[true,"Email address already taken"]
    },
    password: {
        type: String,
        required: [true,"Please add the user password"],
    },
    role: {
        type: Number,
        required: [true,"Please add the user password"],
    },
    

},{
    timestamps:true,
});

module.exports =mongoose.model("User",UserSchema);