<!DOCTYPE html>
<html>
   <head>
      <title>Product Edit</title>
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
               <h3 class="panel-title">Product Edit</h3>
            </div>
            <br><span id="errormsg"></span><br>
            <div class="panel-body">
               <form action="designer-finish.html" class="form-horizontal" role="form">
                  <input type="hidden" value="" id="pid">
                  <div class="form-group">
                     <label for="name" class="col-sm-3 control-label">Name</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                        <br><span id="nameerror"></span><br>
                     </div>
                  </div>
                  <!-- form-group // -->
                  <div class="form-group">
                     <label for="price" class="col-sm-3 control-label">Price</label>
                     <div class="col-sm-9">
                        <input type="tel" class="form-control" name="price" id="price" placeholder="" onKeyUp="javascript: this.value = this.value.replace(/[^0-9]/g,'');"
                           >
                        <br><span id="priceerror"></span><br>
                     </div>
                  </div>
                  <!-- form-group // -->
                  <div class="form-group">
                     <label for="about" class="col-sm-3 control-label">Description</label>
                     <div class="col-sm-9">
                        <textarea class="form-control description" id="description"  ></textarea>
                        <br><span id="descriptionerror"></span><br>
                     </div>
                  </div>
                  <!-- form-group // -->
                  <div class="form-group">
                     <label for="name" class="col-sm-3 control-label">Image</label>
                     <div class="col-sm-3">
                        <label class="control-label small" for="file_img"></label> 
                        <input type="file" name="file_img">
                        <img src="" id="showimg" width="500" height="600">
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
           var accessToken ="";
           accessToken=localStorage.getItem("accessToken");
           if(accessToken=="" || accessToken == null){
            window.location.href = "http://localhost/nodefrontend/login.php";
           }else{
            //productedit
            var urlParams = new URLSearchParams(window.location.search);
            var id=urlParams.get('id');
            var accessTokenBearer ="Bearer "+accessToken;
            var settings = {
              "url": "http://localhost:5001/api/products/"+id,
              "method": "GET",
              "timeout": 0,//{"Authorization": accessToken},
              "headers": {
                "Authorization": accessTokenBearer
              },
            };
         
            $.ajax(settings).done(function (response) {
              console.log(response.data);
              if(response.data!=""){
                 $("#name").val(response.data.name);
                $("#price").val(response.data.price);
                $("textarea#description").val(response.data.description);
                var img=response.data.image;
                $("#showimg").attr('src',img );
                $("#pid").val(response.data._id);     
              }
              if(response.message!="" && response.status=="error"){
                $("#errormsg").text(response.message);
              }
              // else{
              //   $("#errormsg").text("Something went wrong please try again after sometime....");
              // }
                   
                
              });
         
              
         
           }
           $(document).on('click','#btnSubmit',function(){
             var name=price=description=_id=image="";
             var name= $("#name").val();
             var price= $("#price").val();
             var description= $("textarea#description").val();
             var image= $("#showimg").attr('src');
             var _id= $("#pid").val();
         
                     
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
                     
                     description=$("textarea#description").val().length;
                     if(description==0){
                       $('#descriptionerror').text("Please give description.");
                       return false;
                     }else{
                       $('#descriptionerror').text(" ");
                     }
         var settings1 = {
          "url": "http://localhost:5001/api/products/"+id,
          "type": "PUT",
          "timeout": 0,
          "headers": {
            "Authorization": accessTokenBearer
            },
          "dataType": "json",
          "contentType": "application/json",
          "data": JSON.stringify({
                              "name":name,
                              "price":price,
                              "description":description,
                              "image":image,
                              "_id":_id
                            }),
         };
         
         $.ajax(settings1).done(function (response) {
          console.log(response);
          if(response.data!=""){
            $("#successmsg").text("Product Update Successfully...");
            setTimeout(function() { 
              $("#successmsg").hide();               
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
         
              
          
      </script>
   </body>
</html>