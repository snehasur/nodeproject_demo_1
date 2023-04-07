const asyncHandler = require("express-async-handler");
const Contact = require("../models/contactModel");
//@desc Get all contacts
//@route Get /api/contacts
//@access public
const getContacts = asyncHandler (async (req,res)=>{
    const contacts =await Contact.find();

    //res.status(200).json({message:"Get all contacts"});
    res.status(200).json({message:contacts});
});
//@desc Create new contact
//@route POST /api/contacts
//@access public
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
    });
    //res.status(200).json({message:"Create contacts"});
    res.status(200).json(contact);
});
//@desc Get contact
//@route Get /api/contacts/:id
//@access public
const getContact = asyncHandler (async (req,res)=>{
    const contact = await Contact.findById(req.params.id);
    if(!contact){
        res.status(404);
        throw new Error("Contact not found");
    }
    //res.status(200).json({message:`Get contact for ${req.params.id}`});
    res.status(200).json(contact);
});


//@desc Update contact
//@route Put /api/contacts/:id
//@access public
const updateContact = asyncHandler ( async (req,res)=>{
    const contact = await Contact.findById(req.params.id);
    if(!contact){
        res.status(404);
        throw new Error("Contact not found");
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
//@access public
const deleteContact = asyncHandler( async (req,res)=>{
    const contact = await Contact.findById(req.params.id);
    if(!contact){
        res.status(404);
        throw new Error("Contact not found");
    }
    await Contact.remove();
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