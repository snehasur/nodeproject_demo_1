<!DOCTYPE html>
<html>
<head>
  <title>Product Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
</head>
<body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Admin</h2>
      <ul class="nav nav-pills nav-stacked">
        <li ><a href="http://localhost/nodefrontend/admin/dashboard.php">Dashboard</a></li>
        <li class="active"><a href="http://localhost/nodefrontend/admin/productlist.php">Product List</a></li>
        <li class=""><a href="http://localhost/nodefrontend/">Offer</a></li>
        <li><a href="http://localhost/nodefrontend/admin/orders.php">Order List</a></li>
        <li><a href="http://localhost/nodefrontend/admin/userlist.php">User List</a></li>
        <!-- <li><a href="http://localhost/nodefrontend/admin/profile.php">My Account</a></li> -->
        <li onclick="logout()"><a href="javascript:void(0);">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">

      <div class="row">
<div class="container">
  
  <section class="panel panel-default">
<div class="panel-heading"> 
<h3 class="panel-title">Product Add</h3> 
<br><span id="errormsg"></span><br>
</div> 
<div class="panel-body">
  
<form action="designer-finish.html" class="form-horizontal" role="form">


   <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="name" id="name" placeholder="">
      <br><span id="nameerror"></span><br>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
      <input type="tel" class="form-control" name="price" id="price" placeholder="" onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');">
      <br><span id="priceerror"></span><br>
    </div>
  </div> <!-- form-group // -->
  
  <div class="form-group">
    <label for="about" class="col-sm-3 control-label ">Description</label>
    <div class="col-sm-9">
    <textarea class="form-control description" id="description"  ></textarea>
      <br><span id="descriptionerror"></span><br>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="image" class="col-sm-3 control-label">Image</label>
    <div class="col-sm-9">
      <label class="control-label small" for="file_img"></label> 
      <!-- <input type="file" name="file_img" id="image"> -->      
      <input type="text" name="file_img" id="image" class="form-control">
      
    </div>
	</div>
   <!-- form-group // -->
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="button" class="btn btn-primary" id="btnSubmit">Save</button>
    </div>
  </div> <!-- form-group // -->
</form>
<br>
               <span id="successmsg"></span>
               <span id="error"></span>
</div><!-- panel-body // -->
</section><!-- panel// -->
</div>

</div>
</div>
  
</div> <!-- container// -->
<img style="display:none;" id="loader" src="https://media.tenor.com/wpSo-8CrXqUAAAAi/loading-loading-forever.gif" width="200" height="200">

      <script>
         $(window).on('load', function () {
           var accessToken=userid ="";
           accessToken=localStorage.getItem("accessToken");
           userid =localStorage.getItem("userid");
           console.log(userid);
           var accessTokenBearer ="Bearer "+accessToken;
           console.log(accessTokenBearer);
           if(accessToken=="" || accessToken == null){
            window.location.href = "http://localhost/nodefrontend/login.php";
           }
          
          $(document).on('click','#btnSubmit',function(){
           
             var name=price=description=_id=image="";
             var name= $("#name").val();
             var price= $("#price").val();
             var description= $("textarea#description").val();
             //var image= $("#image").attr('src');
             var image =$("#image").val();
             if(image==""){
              image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjOr3gxkV28SyZjiJT_s4yI9YXS7fGMQqtuELKb7m_0g&s";
             }
             
         
                     
                     name=$('#name').val();
                     if(name==''){
                       $('#nameerror').text("Please give name.");
                       return false;
                     }else{
                       $('#nameerror').text(" ");
                     }
                    
                     price=$('#price').val();
                     if(price==''){
                       $('#priceerror').text("Please give price.");
                       return false;
                     }else{
                       $('#priceerror').text(" ");
                     }
                     
                     //description=;
                     if($("textarea#description").val().length==0){
                       $('#descriptionerror').text("Please give description.");
                       return false;
                     }else{
                       $('#descriptionerror').text(" ");
                     }
                     $("#loader").show(); 
         var settings1 = {
          "url": "http://localhost:5001/api/products/",
          "type": "POST",
          "timeout": 0,
          "headers": {
            "Authorization": accessTokenBearer
            },
          //"processData": false,
          "dataType": "json",
          "mimeType": "multipart/form-data",
          "contentType": "application/json",
          //"contentType": false,
          "data": JSON.stringify({
                              "name":name,
                              "price":price,
                              "description":description,
                              "image":image,
                              "userid":userid
                             
                            }),
         };
         
         $.ajax(settings1).done(function (response) {
          console.log(response);
          if(response.data!=""){
            $("#successmsg").text("Product Added Successfully...");
            setTimeout(function() { 
              $("#loader").hide();               
              window.location.href = "http://localhost/nodefrontend/admin/productlist.php";
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
