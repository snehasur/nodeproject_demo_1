<!DOCTYPE html>
<html lang="en">
<head>

 
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
  <style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="http://localhost/nodefrontend/admin/productlist.php">Product List</a></li>
        <li><a href="http://localhost/nodefrontend/admin/orders.php">Order List</a></li>
        <li><a href="http://localhost/nodefrontend/admin/userlist.php">User List</a></li>
        <li><a href="http://localhost/nodefrontend/profile.php">My ACcount</a></li>
        <li onclick="logout()">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">

      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <h4>Users</h4>
            <p id="usercount"></p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Product</h4>
            <p id="productcount"> </p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h4>Orders</h4>
            <p id="order"></p> 
          </div>
        </div>

      </div>

  </div>
</div>

</body>
<script>

 $(window).on('load', function () {
   console.log("window loaded");
   var accessToken =localStorage.getItem("accessToken");
   if(accessToken=="" || accessToken == null){
    window.location.href = "http://localhost/nodefrontend/login.php";
   }else{
    var accessToken =localStorage.getItem("accessToken");
    var accessTokenBearer ="Bearer "+accessToken;
    //usercount
    var settings = {
      "url": "http://localhost:5001/api/users/getuserscount",
      "method": "GET",
      "timeout": 0,//{"Authorization": accessToken},
      "headers": {
        "Authorization": accessTokenBearer
      },
    };

    $.ajax(settings).done(function (response) {
      console.log(response.data);     
      
      if(response.data!=""){
        $("#usercount").text(response.data);
      }else{
        $("#usercount").text("0");
      }
    });
    var settings1 = {
      "url": "http://localhost:5001/api/products/getproductscount", //not working
      "method": "GET",
      "timeout": 0,//{"Authorization": accessToken},
      "headers": {
      "Authorization": accessTokenBearer  
      },
    };

    $.ajax(settings1).done(function (response) {
      console.log(response.data);
      if(response.data!=""){
        $("#productcount").text(response.data);
      }else{
        $("#productcount").text("0");
      }
     
    });


   }
  });
  function logout() {
    localStorage.clear();
    window.location.href = "http://localhost/nodefrontend/login.php";
  }
 
  </script>

</html>

