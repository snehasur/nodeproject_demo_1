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
        <li><a href="http://localhost/nodefrontend/admin/orderlist.php">Order List</a></li>
        <li><a href="http://localhost/nodefrontend/admin/userlist.php">User List</a></li>
        <li><a href="http://localhost/nodefrontend/admin/orderlist.php">User Profile</a></li>
        <li><a href="http://localhost/nodefrontend/admin/userlist.php">Logout</a></li>
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
            <h4>OrderSessions</h4>
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
   if(accessToken==" "){
    window.location.href = "http://localhost/nodefrontend/login.php";
   }else{
    console.log("1hghghghygjj");
    var accessToken =localStorage.getItem("accessToken");
    //usercount
    var settings = {
      "url": "http://localhost:5001/api/users/getuserscount",
      "method": "GET",
      "timeout": 0,//{"Authorization": accessToken},
      "headers": {
        "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJuYW1lIjoiYWRtaW4iLCJlbWFpbCI6ImFkbWluQHRlc3QuY29tIiwiaWQiOiI2NDM0MTEwNjU4ZjNmN2Q1YjFlYzc3MDEiLCJyb2xlIjoxfSwiaWF0IjoxNjgxMzk2MjUzLCJleHAiOjE2OTAwMzYyNTN9.1TsP_stFaKNKNHmzPDF5Djye8UTRjN4mUpHcH8Uj8pI"
      },
    };

    $.ajax(settings).done(function (response) {
      console.log(response.data);
      
      $("#usercount").text(response.data);
    });
    var settings1 = {
      "url": "http://localhost:5001/api/products/getproductscount",
      "method": "GET",
      "timeout": 0,//{"Authorization": accessToken},
      "headers": {
        "Authorization": "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJuYW1lIjoiYWRtaW4iLCJlbWFpbCI6ImFkbWluQHRlc3QuY29tIiwiaWQiOiI2NDM0MTEwNjU4ZjNmN2Q1YjFlYzc3MDEiLCJyb2xlIjoxfSwiaWF0IjoxNjgxMzk2MjUzLCJleHAiOjE2OTAwMzYyNTN9.1TsP_stFaKNKNHmzPDF5Djye8UTRjN4mUpHcH8Uj8pI"
      },
    };

    $.ajax(settings1).done(function (response) {
      console.log(response.data);
      
      $("#productcount").text(response.data);
    });


   }
  });
 
      
  </script>

</html>

