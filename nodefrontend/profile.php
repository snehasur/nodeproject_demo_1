<!DOCTYPE html>
<html>
   <head>
      <title>Profile Edit</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
  <a href="javascript:void(0);">My Account</a>
  <a href="javascript:void(0);" onclick="logout()">Logout</a>
  </div>
  </div>
</div>
<div class="container-fluid">

    
    <div class="col-sm-9">

      <div class="row">
        <div class="container">
          <section class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Profile Edit</h3>
              </div>
              <br><span id="errormsg"></span><br>
              <div class="panel-body">
                <form action="designer-finish.html" class="form-horizontal" role="form">
                    <input type="hidden" value="" id="pid">
                    <div class="form-group">
                      <label for="username" class="col-sm-3 control-label">User Name</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="username" id="username" placeholder="" >
                          <br><span id="usernameerror"></span><br>
                      </div>
                    </div>
                    <!-- form-group // -->
                    <div class="form-group">
                      <label for="email" class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                          <input type="email" class="form-control" name="email" id="email" placeholder="" readonly onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');"
                            >
                          <br><span id="emailerror"></span><br>
                      </div>
                    </div>
                    
                    <!-- form-group // -->
                    <hr>
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                          <button type="button" class="btn btn-primary" id="btnSubmit">Save</button>
                      </div>
                    </div>
                    <!-- form-group // -->
                </form>
                <br>
                <span id="successmsg"></span>
                <span id="error"></span>
              </div>
              <!-- panel-body // -->
          </section>
          <!-- panel// -->
        </div>
        <!-- container// -->
      </div>


    </div>

</div>
      <script>
         $(window).on('load', function () {
           var accessToken =_id="";
           accessToken=localStorage.getItem("accessToken");
           _id=localStorage.getItem("userid");

           if(accessToken=="" || accessToken == null){
            window.location.href = "http://localhost/nodefrontend/login.php";
           }else{
            //profileedit

            var accessTokenBearer ="Bearer "+accessToken;
            var settings = {
              "url": "http://localhost:5001/api/users/profile",
              "method": "GET",
              "timeout": 0,//{"Authorization": accessToken},
              "headers": {
                "Authorization": accessTokenBearer
              },
              "data": JSON.stringify({                             
                              "_id":_id
                            }),
            };
         
            $.ajax(settings).done(function (response) {
              //console.log(response.data[0]);
              if(response.data!=""){
                $("#username").val(response.data[0].username);
                $("#email").val(response.data[0].email);
                  
              }
              if(response.message!="" && response.status=="error"){
                $("#errormsg").text(response.message);
              }
              // else{
              //   $("#errormsg").text("Something went wrong please try again after sometime....");
              // }
                   
                
              });
         
              
         
           }
           //profileupdate
           $(document).on('click','#btnSubmit',function(){
             var username="";
             var username= $("#username").val();
             username=$('#username').val();
                     if(username==''){
                       $('#usernameerror').text("Please give username.");
                       return false;
                     }else{
                       $('#usernameerror').text(" ");
                     }
                    
                     
         var settings1 = {
          "url": "http://localhost:5001/api/users/profile/",
          "type": "PUT",
          "timeout": 0,
          "headers": {
            "Authorization": accessTokenBearer
            },
          "dataType": "json",
          "contentType": "application/json",
          "data": JSON.stringify({
                              "username":username,
                              "_id":_id
                            }),
         };
         
         $.ajax(settings1).done(function (response) {
          //console.log(response);
          if(response.data!=""){
            $("#successmsg").text("Profile Update Successfully...");
            setTimeout(function() { 
              $("#successmsg").hide();               
              //window.location.href = "http://localhost/nodefrontend/profile.php";
            },
            5000);
          }
         if(response.message!="" && response.status=="error"){
                $("#errormsg").text(response.message);
              }
          // else{
          //   $("#errormsg").text("Something went wrong please try again after sometime....");
          // }
         });
           });
          });
         
          function logout() {
    localStorage.clear();
    window.location.href = "http://localhost/nodefrontend/login.php";
  }
          
      </script>
   </body>
</html>