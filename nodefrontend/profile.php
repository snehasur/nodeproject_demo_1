<!DOCTYPE html>
<html>
   <head>
      <title>Profile Edit</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
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
              console.log(response.data[0]);
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
          console.log(response);
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
         
              
          
      </script>
   </body>
</html>