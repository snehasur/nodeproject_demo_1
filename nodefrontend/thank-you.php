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
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="http://localhost/nodefrontend/">Product</a>
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
<!-- <div id="shipping">
<p class="info">Name:</p>

<p class="info">Email:</p>

<p class="info">ShippingAddress1:</p>

<p class="info">ShippingState: 
    ShippingCity: 
    ShippingZip:
</p>

<p class='info'>Phone No:</p>
</div> -->
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
          
      </script>
</body>
</html>
