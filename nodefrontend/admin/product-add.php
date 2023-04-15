<!DOCTYPE html>
<html>
<head>
  <title>Product Add</title>
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
    <label for="name" class="col-sm-3 control-label">Image</label>
    <div class="col-sm-3">
      <label class="control-label small" for="file_img"></label> <input type="file" name="file_img" id="image">
    </div>
	</div> <!-- form-group // -->
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

  
</div> <!-- container// -->
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
             var image= $("#image").attr('src');
             
         
                     
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
          "url": "http://localhost:5001/api/products/",
          "type": "POST",
          "timeout": 0,
          "headers": {
            "Authorization": accessTokenBearer
            },
          "processData": false,
          //"dataType": "json",
          "mimeType": "multipart/form-data",
          //"contentType": "application/json",
          "contentType": false,
          "data": JSON.stringify({
                              "name":name,
                              "price":price,
                              "description":description,
                              "image":"image",
                              "userid":userid
                             
                            }),
         };
         
         $.ajax(settings1).done(function (response) {
          console.log(response);
          if(response.data!=""){
            $("#successmsg").text("Product Added Successfully...");
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
