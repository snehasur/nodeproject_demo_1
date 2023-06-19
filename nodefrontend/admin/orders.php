<!DOCTYPE html>
<html lang="en">
<head>
  <title>Orders</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


      
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

  <!-- nav -->
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
      <!-- nav -->

</head>
<body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Admin</h2>
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="http://localhost/nodefrontend/admin/dashboard.php">Dashboard</a></li>
        <li class=""><a href="http://localhost/nodefrontend/">Offer</a></li>
        <li><a href="http://localhost/nodefrontend/admin/productlist.php">Product List</a></li>
        <li class="active"><a href="http://localhost/nodefrontend/admin/orders.php">Order List</a></li>
        <li><a href="http://localhost/nodefrontend/admin/userlist.php">User List</a></li>
        <!-- <li><a href="http://localhost/nodefrontend/admin/profile.php">My Account</a></li> -->
        <li onclick="logout()"><a href="javascript:void(0);">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">

      <div class="row">

<div class="container">
  <h2>Orders</h2>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl no</th>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Product Price</th>              
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
        <tfoot>
            <tr>
                <th>Sl no</th>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Product Price</th>              
            </tr>
        </tfoot>
    </table>
</div>
</div>

</div>
</div>
<div style="display:none;" id="loader">
<img  src="https://media.tenor.com/wpSo-8CrXqUAAAAi/loading-loading-forever.gif" width="200" height="200">
</div>
<script>
//   $(document).ready(function () {
//     $('#example').DataTable();
// });
$(document).ready(function() {
    // $('#example').DataTable( {
    //     "ajax": "data.json",
    //     "columns": [
    //         { "data": "Sl no" },
    //         { "data": "Order Id" },
    //         { "data": "Customer Name" },
    //         { "data": "Product Name" },
    //         { "data": "Product Price" }
    //     ]
    // } );
    // Initialize DataTable
var table = $('#example').DataTable();

// Add new row of data dynamically

} );
  </script>
     <script>
         $(window).on('load', function () {  
          $("#loader").show(); 
           var accessToken ="";
           accessToken=localStorage.getItem("accessToken");
           if(accessToken=="" || accessToken == null){
            window.location.href = "http://localhost/nodefrontend/login.php";
           }else{    
            //orderlist
            alert("1");
            var accessTokenBearer ="Bearer "+accessToken;
            var settings = {
              "url": "http://localhost:5001/api/orders",
              "method": "GET",
              "timeout": 0,
              "headers": {
                "Authorization": accessTokenBearer
              },
            };
         
            $.ajax(settings).done(function (response) {
               if(response.data!=""){
                  $.each(response.data, function(key, val) {
                    // table.row.add([
                    //     (key+1)
                    //      val._id,
                    //      val.User.username,
                    //      val.product.name,
                    //      val.product.price
                    // ]).draw(false);
                
                  var data;
                  data +="<tr><td>"+(key+1)+"</td><td>"+val._id+".</td><td>"+val.User.username+".</td><td>"+val.product.name+"</td><td>"+val.product.price+"</td></tr>";
                  $('#tbody').append(data);
                  return data;
                  });
                  $("#loader").hide(); 
               }else{
                  $("#errormsg").text("Something went wrong please try again after sometime....");
               }
         
                
              });
           }          

          });
          
          function logout() {
    localStorage.clear();
    window.location.href = "http://localhost/nodefrontend/login.php";
  }
          
      </script>
</body>
</html>