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
  <a href="http://localhost/nodefrontend">Home</a>
  <a href="http://localhost/nodefrontend#about">About</a>
  <a href="http://localhost/nodefrontend#productlisting">Product</a>
  <a class="active" href="javascript:void(0);">Orders</a>
  <a href="http://localhost/nodefrontend/profile.php">My Account</a>
  <a href="javascript:void(0);" onclick="logout()">Logout</a>
  </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row content">

    
    <div class="col-sm-9">

      <div class="row">

<div class="container">
  <h2>Orders</h2>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <th class="tg-0pky" rowspan="2">SL No</th>
              <th class="tg-0pky" colspan="4" rowspan="2">Order ID</th>
              <th class="tg-0pky" colspan="4" rowspan="2">Customer Details</th>
              <th class="tg-0pky" rowspan="2">Product Name</th>
              <th class="tg-0pky" rowspan="2">Product Price</th>         
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
        <tfoot>
            <tr>
              <th class="tg-0pky" rowspan="2">SL No</th>
              <th class="tg-0pky" colspan="4" rowspan="2">Order ID</th>
              <th class="tg-0pky" colspan="4" rowspan="2">Customer Details</th>
              <th class="tg-0pky" rowspan="2">Product Name</th>
              <th class="tg-0pky" rowspan="2">Product Price</th>              
            </tr>
        </tfoot>
    </table>
</div>
</div>

</div>
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
           var accessToken ="";
           accessToken=localStorage.getItem("accessToken");
           if(accessToken=="" || accessToken == null){
            window.location.href = "http://localhost/nodefrontend/login.php";
           }else{    
            //orderlist
            //alert("1");
            var accessTokenBearer ="Bearer "+accessToken;
            var settings = {
              "url": "http://localhost:5001/api/orders/myorders",
              "method": "GET",
              "timeout": 0,
              "headers": {
                "Authorization": accessTokenBearer
              },
            };
         
            $.ajax(settings).done(function (response) {
               if(response.data!=""){
                  console.log(response.data);
                  $.each(response.data, function(key, val) {
                    // table.row.add([
                    //     (key+1)
                    //      val._id,
                    //      val.User.username,
                    //      val.product.name,
                    //      val.product.price
                    // ]).draw(false);
                
                  var data;
                  var pl=val.products.length;
                  console.log(val.products.length);
                  // data +="<tr><td>"+(key+1)+"</td><td>"+val._id+"</td><td>"+val.User[0].username+"</td><td>"+val.checkoutdata[0].firstname+"</td><td>"+val._id+"<hr>"+val._id+"</td></tr>";
                  data +=`<tr>
                  <td>`+(key+1)+`</td>
                  <td colspan="4" rowspan=`+pl+`>`+val._id+`</td>
                  <td colspan="4" rowspan=`+pl+`>`+val.User[0].username+`</td>
                  <td colspan="4">`+val.checkoutdata[0].firstname+`</td>`;
                 
                  
                  $.each(val.products, function(key1, val1) {
                   
                      data +=`<td>`+val1.Pname+`</td><td>`+val1.Pprice+`</td></tr>`;
                    if(pl>1){
                      data +=` <tr>
                      <td>`+val1.Pname+`</td>
                      <td>`+val1.Pprice+`</td>
                      </tr>`;
                    }
                    
                  });
                

                  $('#tbody').append(data);
                  return data;
                  });
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