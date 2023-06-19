<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">

        function getDate(days) {

            var dayNames = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

            var monthNames = new Array("January", "February", "March", "April", "May", "June", "July", "August",

                "September", "October", "November", "December");

            var now = new Date();

            now.setDate(now.getDate() + days);

            var nowString = dayNames[now.getDay()] + ", " + monthNames[now.getMonth()] + " " + now.getDate() + ", " +

                now.getFullYear();

            document.write(nowString);

        }

    </script>
</head>
<body>

<div class="topnav">
  <!-- <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a> -->
  <div class="login-container">
  <!-- <div id="notlogin">
    <button type="submit"> <a href="http://localhost/nodefrontend/login.php" > Login</a></button> 
    <button type="submit"><a href="http://localhost/nodefrontend/register.php" >Register </a></button>
  </div> -->
  <div id="login">
  <a class="active" href="http://localhost/nodefrontend/">Home</a>
  <a href="http://localhost/nodefrontend#about">About</a>
  <a href="http://localhost/nodefrontend#productlisting">Product</a>
  <a href="http://localhost/nodefrontend/orders.php">Orders</a>
  <a href="http://localhost/nodefrontend/profile.php">My Account</a>
  <a href="javascript:void(0);" onclick="logout()">Logout</a>
  </div>
  </div>
</div>

<h1>Thank You For Your Order!</h1>
<div>Orderid:<?php echo $_GET['orderid'];?></div>
            <h2>Your orders are currently being processed and will ship promptly.</h2>

            <h3>Orders Placed: <script type="text/javascript">

                    getDate(0);

                </script>
<div id="shipping">
<div class="card">
        <div class="card-header">
            <h2>Products</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody class="productlist">
        

        
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        

        
            
        
          </div>
      </div>
      <div>
        <h2>Shipping Details</h2>
      <div class="prevdata">
      <span>Name:</span><span id="fullname"></span><br>
      <span>Email:</span><span id="email"></span><br>
      <span >Address</span><span id="address" >   </span><br>
      <span>Address2:</span><span id="address2">    </span><br>
      <span >Phone No:</span><span id="phno"></span>                     
                    
      </div>
      
         




      <div>
        <h2>Payment Details</h2>
      <div class="prevdatapayment">

                   
                   
                
      </div>
      <div class="d-flex">                
      <div class="text-right mt-4">
        <label class="text-muted font-weight-normal m-0">Total price</label>
        <div class="text-large"><strong id="totalprice" ></strong></div>
      </div>
    </div>
</div>
  </div>
</div>
<div class="footer">

<p class="copyright">

    &copy; <?=date('Y')?> Node &mdash; All rights reserved.

</p>

<p class="customerservice">

    Customer Service: <a href="tel:(xxx) xxx-xxxx">(xxx) xxx-xxxx</a> </p>
</div>    
<script>
function logout() {
            localStorage.clear();
            window.location.href = "http://localhost/nodefrontend/login.php";
          }
    $(window).on('load', function () {
      var accessToken ="";
      var alltotalprice=0;
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            
            if(accessToken=="" || accessToken == null){
              ////alert("1");
                window.location.href = "http://localhost/nodefrontend/login.php";
            }else{   

            const orderid =  new URLSearchParams(window.location.search).get('orderid');

                var settings = {
                  "url": "http://localhost:5001/api/orders/getorderrecent",
                  "method": "POST",
                  "timeout": 0,
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": accessTokenBearer                
                  },
                  "data": JSON.stringify({
                            "orderid":orderid
                  }),
                };

                $.ajax(settings).done(function (response) {
                 
                  if(response.data){        
                    if(response.data[0].paymentdata[0].type=="cod")  {     
                      $(".prevdatapayment").text("Cash On Delivery");
                      
                      } 
                       $("#email").text(response.data[0].User[0].email);
                       $("#fullname").text(response.data[0].checkoutdata[0].firstname+ ' '+response.data[0].checkoutdata[0].lastname);
                       $("#address").text(response.data[0].checkoutdata[0].address+' '+response.data[0].checkoutdata[0].country+' '+response.data[0].checkoutdata[0].state+' '+' '+response.data[0].checkoutdata[0].zip);
                       $("#address2").text(response.data[0].checkoutdata[0].address2);
                       $("#phno").text(response.data[0].checkoutdata[0].phoneno);


                    var i=1;
                  $.each(response.data[0].products, function(key, val) {
                  var data;
                  var Tprice; 
                  
                  Tprice=val.Pprice*val.Pcount;
                  
                  data +='<tr><input type="hidden" class="products" name="products['+i+']" value="'+val.Pname+'_'+val.Pprice+'_'+val.Pcount+'"><td class="p-4"><div class="media align-items-center"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="d-block ui-w-40 ui-bordered mr-4" alt=""><div class="media-body">'+val.Pname+'</div></div></td><td class="text-right font-weight-semibold align-middle p-4">$'+val.Pprice+'</td><td class="align-middle p-4">'+val.Pcount+'</td><td class="text-right font-weight-semibold align-middle p-4">$'+Tprice+'</td><td class="text-center align-middle px-0"></td></tr>';
                  $('.productlist').append(data);
                  
                   alltotalprice = alltotalprice + Tprice;
                   i++;
                  
                  



                  return data;

                }); 
                $('#totalprice').text(alltotalprice);




                
                  }else{
                  $("#errormsg").text("Something went wrong please try again after sometime....");
                  }             



                });


             
           
              }
                
              });
                      
      </script>
</body>
</html>
