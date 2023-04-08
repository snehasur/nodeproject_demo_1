const asyncHandler = require("express-async-handler");
const Contact = require("../models/contactModel");
//@desc Get all contacts
//@route Get /api/contacts
//@access private
const getContacts = asyncHandler (async (req,res)=>{
    const contacts =await Contact.find({user_id:req.user.id});

    //res.status(200).json({message:"Get all contacts"});
    res.status(200).json({message:contacts});
});
//@desc Create new contact
//@route POST /api/contacts
//@access private
const createtContact = asyncHandler (async (req,res)=>{
    console.log("The request body is",req.body);
    const {name,email,phone}=req.body;
    if(!name || !email || !phone){
        res.status(400);
        throw new Error("All fields are mandetory")
    }
    const contact = await Contact.create({
        name,
        email,
        phone,
        user_id:req.user.id
    });
    //res.status(200).json({message:"Create contacts"});
    res.status(200).json(contact);
});
//@desc Get contact
//@route Get /api/contacts/:id
//@access private
const getContact = asyncHandler (async (req,res)=>{
    const contact = await Contact.findById(req.params.id);
    if(!contact){
        res.status(404);
        throw new Error("Contact not found");
    }
    if(contact.user_id.toString() !==req.user.id){

        console.log(contact.user_id.toString());
        console.log(req.user.id);
        req.status(403);
        throw new Error("User don't have permission to update other user contacts");
    }
    //res.status(200).json({message:`Get contact for ${req.params.id}`});
    res.status(200).json(contact);
});


//@desc Update contact
//@route Put /api/contacts/:id
//@access private
const updateContact = asyncHandler ( async (req,res)=>{
    const contact = await Contact.findById(req.params.id);
    if(!contact){
        res.status(404);
        throw new Error("Contact not found");
    }

    if(contact.user_id.toString() !==req.user.id){
        req.status(403);
        throw new Error("User don't have permission to update other user contacts");
    }
    const updateContact =await Contact.findByIdAndUpdate(
        req.params.id,
        req.body,{new:true}
    );
    //res.status(200).json({message:`Update contact for ${req.params.id}`});
    res.status(200).json(updateContact);

});


//@desc Delete contact
//@route DELETE /api/contacts/:id
//@access private
const deleteContact = asyncHandler( async (req,res)=>{
    const contact = await Contact.findById(req.params.id);
    if(!contact){
        res.status(404);
        throw new Error("Contact not found");
    }
    if(contact.user_id.toString() !==req.user.id){
        req.status(403);
        throw new Error("User don't have permission to update other user contacts");
    }
    await Contact.deleteOne({_id:req.params.id});
    //res.status(200).json({message:`Delete contact for ${req.params.id}` });
    res.status(200).json(contact);
});



module.exports = {
    getContacts,
    createtContact,
    getContact,
    updateContact,
    deleteContact
};