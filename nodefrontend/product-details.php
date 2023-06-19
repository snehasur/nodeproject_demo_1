<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  #loader{
  position: fixed;
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, .5);
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
  /* Navbar */
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .login-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

.topnav .login-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #555;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: green;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
/* Navbar end*/
</style>
<style>
.picZoomer{
	position: relative;
    /*margin-left: 40px;
    padding: 15px;*/
}
.picZoomer-pic-wp{
	position: relative;
	overflow: hidden;
    text-align: center;
}
.picZoomer-pic-wp:hover .picZoomer-cursor{
	display: block;
}
.picZoomer-zoom-pic{
	position: absolute;
	top: 0;
	left: 0;
}
.picZoomer-pic{
	/*width: 100%;
	height: 100%;*/
}
.picZoomer-zoom-wp{
	display: none;
	position: absolute;
	z-index: 999;
	overflow: hidden;
    border:1px solid #eee;
    height: 460px;
    margin-top: -19px;
}
.picZoomer-cursor{
	display: none;
	cursor: crosshair;
	width: 100px;
	height: 100px;
	position: absolute;
	top: 0;
	left: 0;
	border-radius: 50%;
	border: 1px solid #eee;
	background-color: rgba(0,0,0,.1);
}
.picZoomCursor-ico{
	width: 23px;
	height: 23px;
	position: absolute;
	top: 40px;
	left: 40px;
	background: url(images/zoom-ico.png) left top no-repeat;
}

.my_img {
    vertical-align: middle;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 100%;
}
.piclist li{
    display: inline-block;
    width: 90px;
    height: 114px;
    border: 1px solid #eee;
}
.piclist li img{
    width: 97%;
    height: auto;
}

/* custom style */
.picZoomer-pic-wp,
.picZoomer-zoom-wp{
    border: 1px solid #eee;
}



.section-bg {
    background-color: #fff1e0;
}
section {
    padding: 60px 0;
}
.row-sm .col-md-6 {
    padding-left: 5px;
    padding-right: 5px;
}

/*===pic-Zoom===*/
._boxzoom .zoom-thumb {
    width: 90px;
    display: inline-block;
    vertical-align: top;
    margin-top: 0px;
}
._boxzoom .zoom-thumb ul.piclist {
    padding-left: 0px;
    top: 0px;
}
._boxzoom ._product-images {
    width: 80%;
    display: inline-block;
}
._boxzoom ._product-images .picZoomer {
    width: 100%;
}
._boxzoom ._product-images .picZoomer .picZoomer-pic-wp img {
    left: 0px;
}
._boxzoom ._product-images .picZoomer img.my_img {
    width: 100%;
}
.piclist li img {
    height:100px;
    object-fit:cover;
}

/*======products-details=====*/
._product-detail-content {
    background: #fff;
    padding: 15px;
    border: 1px solid lightgray;
}
._product-detail-content p._p-name {
    color: black;
    font-size: 20px;
    border-bottom: 1px solid lightgray;
    padding-bottom: 12px;
}
.p-list span {
    margin-right: 15px;
}
.p-list span.price {
    font-size: 25px;
    color: #318234;
}
._p-qty > span {
    color: black;
    margin-right: 15px;
    font-weight: 500;
}
._p-qty .value-button {
    display: inline-flex;
    border: 0px solid #ddd;
    margin: 0px;
    width: 30px;
    height: 35px;
    justify-content: center;
    align-items: center;
    background: #fd7f34;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #fff;
}

._p-qty .value-button {
    border: 0px solid #fe0000;
    height: 35px;
    font-size: 20px;
    font-weight: bold;
}
._p-qty input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #fe0000;
    border-bottom: 1px solid #fe0000;
    margin: 0px;
    width: 50px;
    height: 35px;
    font-size: 14px;
    box-sizing: border-box;
}
._p-add-cart {
    margin-left: 0px;
    margin-bottom: 15px;
}
.p-list {
    margin-bottom: 10px;
}
._p-features > span {
    display: block;
    font-size: 16px;
    color: #000;
    font-weight: 500;
}
._p-add-cart .buy-btn {
    background-color: #fd7f34;
    color: #fff;
}
._p-add-cart .btn {
    text-transform: capitalize;
    padding: 6px 20px;
    /* width: 200px; */
    border-radius: 52px;
}
._p-add-cart .btn {
    margin: 0px 8px;
}

/*=========Recent-post==========*/
.title_bx h3.title {
    font-size: 22px;
    text-transform: capitalize;
    position: relative;
    color: #fd7f34;
    font-weight: 700;
    line-height: 1.2em;
}
.title_bx h3.title:before {
    content: "";
    height: 2px;
    width: 20%;
    position: absolute;
    left: 0px;
    z-index: 1;
    top: 40px;
    background-color: #fd7f34;
}
.title_bx h3.title:after {
    content: "";
    height: 2px;
    width: 100%;
    position: absolute;
    left: 0px;
    top: 40px;
    background-color: #ffc107;
}
.common_wd .owl-nav .owl-prev, .common_wd .owl-nav .owl-next {
    background-color: #fd7f34 !important;
    display: block;
    height: 30px;
    width: 30px;
    text-align: center;
    border-radius: 0px !important;
}
.owl-nav .owl-next {
    right:-10px;
}
.owl-nav .owl-prev, .owl-nav .owl-next {
    top:50%;
    position: absolute;
}
.common_wd .owl-nav .owl-prev i, .common_wd .owl-nav .owl-next i {
    color: #fff;
    font-size: 14px !important;
    position: relative;
    top: -1px;
}
.common_wd .owl-nav {
    position: absolute;
    top: -21%;
    right: 4px;
    width: 65px;
}
.owl-nav .owl-prev i, .owl-nav .owl-next i {
    left: 0px;
}
._p-qty .decrease_ {
    position: relative;
    right: -5px;
    top: 3px;
}

._p-qty .increase_ {
    position: relative;
    top: 3px;
    left: -5px;
}
/*========box========*/
.sq_box {
    padding-bottom: 5px;
    border-bottom: solid 2px #fd7f34;
    background-color: #fff;
    text-align: center;
    padding: 15px 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}
.item .sq_box span.wishlist {
    right: 5px !important;
}
.sq_box span.wishlist {
    position: absolute;
    top: 10px;
    right: 20px;
}
.sq_box span {
    font-size: 14px;
    font-weight: 600;
    margin: 0px 10px;
}
.sq_box span.wishlist i {
    color: #adb5bd;
    font-size: 20px;
}
.sq_box h4 {
    font-size: 18px;
    text-align: center;
    font-weight: 500;
    color: #343a40;
    margin-top: 10px;
    margin-bottom: 10px !important;
}
.sq_box .price-box {
    margin-bottom: 15px !important;
}
.sq_box .btn {
    border-radius: 50px;
    padding: 5px 13px;
    font-size: 15px;
    color: #fff;
    background-color: #fd7f34;
    font-weight: 600;
}
.sq_box .price-box span.price {
    text-decoration: line-through;
    color: #6c757d;
}
.sq_box span {
    font-size: 14px;
    font-weight: 600;
    margin: 0px 10px;
}
.sq_box .price-box span.offer-price {
    color:#28a745;
}
.sq_box img {
    object-fit: cover;
    height: 150px !important;
    margin-top: 20px;
}
.sq_box span.wishlist i:hover {
    color: #fd7f34;
}
</style>
</head>
<body>
<div class="topnav">
  <!-- <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a> -->
  <div class="login-container">
  <div id="notlogin">
    <button type="submit"> <a href="http://localhost/nodefrontend/login.php" > Login</a></button> 
    <button type="submit"><a href="http://localhost/nodefrontend/register.php" >Register </a></button>
  </div>
  <div id="login">
  <a class="active" href="http://localhost/nodefrontend">Home</a>
  <a href="http://localhost/nodefrontend#about">About</a>
  <a href="http://localhost/nodefrontend#productlisting">Product</a>
  <a href="javascript:void(0);"><i class="fa fa-shopping-cart" aria-hidden="true" id="cartproductcount">0</i></a>
  <a href="http://localhost/nodefrontend/orders.php">Orders</a>
  <a href="http://localhost/nodefrontend/profile.php">My Account</a>
  <a href="javascript:void(0);" onclick="logout()">Logout</a>
  </div>
  </div>
</div>
<section id="services" class="services section-bg">
   <div class="container-fluid">
     
      <div class="row row-sm">
         <div class="col-md-6 _boxzoom">
            <div class="zoom-thumb">
               <ul class="piclist">
                  <!-- <li><img src="https://s.fotorama.io/1.jpg" alt=""></li>
                  <li><img src="https://s.fotorama.io/2.jpg" alt=""></li>
                  <li><img src="https://s.fotorama.io/3.jpg" alt=""></li> -->
                  <li><img src="https://ucarecdn.com/382a5139-6712-4418-b25e-cc8ba69ab07f/-/stretch/off/-/resize/760x/" alt=""></li>
               </ul>
            </div>
            <div class="_product-images">
               <div class="picZoomer">
                  <img class="my_img" src="https://s.fotorama.io/1.jpg" alt="">
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="_product-detail-content">
               <p class="_p-name" id="name"> Milton Bottle </p>
               <div class="_p-price-box">
                  <div class="p-list">
                     <span> M.R.P. : <i class="fa fa-inr"></i> <del id="delprice" > 1399  </del>   </span>
                     <span class="price" id="price"> Rs. 699 </span>
                  </div>
                  <!-- <div class="_p-add-cart">
                     <div class="_p-qty">
                        <span>Add Quantity</span>
                        <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                        <input type="number" name="qty" id="number" value="1" />
                        <div class="value-button increase_" id="" value="Increase Value">+</div>
                     </div>
                  </div> -->
                  <div class="_p-features">
                     <span > Description About this product:- </span>
                     <span id="description">
                     Solid color polyester/linen full blackout thick sunscreen floor curtain
                     Type: General Pleat
                     Applicable Window Type: Flat Window
                     Format: Rope
                     Opening and Closing Method: Left and Right Biparting Open
                     Processing Accessories Cost: Included
                     Installation Type: Built-in
                     Function: High Shading(70%-90%)
                     Material: Polyester / Cotton
                     Style: Classic
                     Pattern: Embroidered
                     Location: Window
                     Technics: Woven
                     Use: Home, Hotel, Hospital, Cafe, Office
                     Feature: Blackout, Insulated, Flame Retardant
                     Place of Origin: India
                     Name: Curtain
                     Usage: Window Decoration
                     Keywords: Ready Made Blackout Curtain
                  </span>                        
                  </div>
                  <form method="post" accept-charset="utf-8">
                     <ul class="spe_ul"></ul>
                     <div class="_p-qty-and-cart">
                        <div class="_p-add-cart">
                           <button class="btn-theme btn buy-btn" tabindex="0" data_id="" id="buynow" type="button">
                           <i class="fa fa-shopping-cart"></i> Buy Now
                           </button>
                           <button class="btn-theme btn btn-success" type="button" tabindex="0" id="addtocart" data-id="" >
                            Add to Cart
                           </button>
                           
                        </div>
                     </div>
                  </form>

               <span id="successmsg"></span>
               <span id="error"></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div style="display:none;" id="loader">
<img  src="https://media.tenor.com/wpSo-8CrXqUAAAAi/loading-loading-forever.gif" width="200" height="200">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
         $(window).on('load', function () {
            var accessToken ="";
           accessToken=localStorage.getItem("accessToken");
           if(accessToken=="" || accessToken == null){
            //not login
            $('#notlogin').show();
            $('#login').hide();


           }else{    
             //login
             $('#notlogin').hide();
             $('#login').show();
           }
           
            //product details
            var urlParams = new URLSearchParams(window.location.search);
            var id=urlParams.get('id');
            var settings = {
              "url": "http://localhost:5001/api/products/productdetails/"+id,
              "method": "GET",
              "timeout": 0,
              
            };
         
            $.ajax(settings).done(function (response) {
              if(response.data!=""){
                $("#name").text(response.data.name);
                $("#description").text(response.data.description);
                $("#price").text(response.data.price);
                $("#delprice").text((response.data.price+10));
                
                var img=response.data.image;
                $(".my_img").attr('src',img );
                $("#buynow").attr('data_id',response.data._id );
                $("#addtocart").attr('data-id',response.data._id );
              }
              if(response.message!="" && response.status=="error"){
                $("#errormsg").text(response.message);
              }
           
                   
                
              });
              //add to cart count
                var accessToken =userid="";
                accessToken=localStorage.getItem("accessToken");

                var accessTokenBearer ="Bearer "+accessToken;
                userid=localStorage.getItem("userid");
              var settings1 = {
              "url": "http://localhost:5001/api/cart/add-to-cart-count",
              "method": "POST",
              "timeout": 0,
              "headers": {
                "Content-Type": "application/json",
                "Authorization": accessTokenBearer      
                         },
              "data": JSON.stringify({
                "userid":userid
              }),
            };

            $.ajax(settings1).done(function (response) {
              $("#cartproductcount").text(response.cartproductcount);
            });

           
         
       

          });
         //order
              
         function logout() {
            localStorage.clear();
            window.location.href = "http://localhost/nodefrontend/login.php";
          }
         

      

               $(document).on("click","#buynow",function() {
                $("#loader").show(); 
                document.getElementById("buynow").disabled = true;
                var accessToken =userid=pid="";
                accessToken=localStorage.getItem("accessToken");
               
                var accessTokenBearer ="Bearer "+accessToken;
                var pid=$(this).attr("data_id");
                userid=localStorage.getItem("userid");
                
                if(accessToken=="" || accessToken == null){
                    window.location.href = "http://localhost/nodefrontend/login.php";
                }else{    
                
            
                
                var settings = {
                  "url": "http://localhost:5001/api/cart/add-to-cart",
                  "method": "POST",
                  "timeout": 0,
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": accessTokenBearer                },
                  "data": JSON.stringify({
                            "productid":pid,
                            "userid":userid
                  }),
                };

                $.ajax(settings).done(function (response) {
                    window.location.href = "http://localhost/nodefrontend/add-to-cart.php";
                    $("#loader").hide();

                });  


            }
            
                });



        
        $(document).on("click","#cartproductcount",function() {
            var accessToken =userid="";
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            userid=localStorage.getItem("userid");
            
            if(accessToken=="" || accessToken == null){
                window.location.href = "http://localhost/nodefrontend/login.php";
            }else{   

              window.location.href = "http://localhost/nodefrontend/add-to-cart.php";

              
                }
          });
          $(document).on("click","#addtocart",function() {
            $("#loader").show();
            document.getElementById("addtocart").disabled = true;

            var accessToken =userid=pid="";
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            var pid=$(this).attr("data-id");
            userid=localStorage.getItem("userid");
            
            if(accessToken=="" || accessToken == null){
                window.location.href = "http://localhost/nodefrontend/login.php";
            }else{  
                var settings = {
                  "url": "http://localhost:5001/api/cart/add-to-cart",
                  "method": "POST",
                  "timeout": 0,
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": accessTokenBearer                },
                  "data": JSON.stringify({
                            "productid":pid,
                            "userid":userid
                  }),
                };

                $.ajax(settings).done(function (response) {                  
                  $("#cartproductcount").text(response.cartproductcount);
                  $("#loader").hide();
                  document.getElementById("addtocart").disabled = false;


                });
                }
          });
      </script>
</body>
</html>
