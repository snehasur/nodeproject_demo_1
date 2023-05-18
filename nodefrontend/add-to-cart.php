<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
    margin-top:20px;
    background:#eee;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body>
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody class="productlist">
        

        
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <!-- <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div> -->
              <div class="d-flex">                
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong id="totalprice" ></strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
            <a style="text-decoration" href="http://localhost/nodefrontend/">  <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button> </a>
              <button type="button" class="btn btn-lg btn-primary mt-2 checkout">Checkout</button>
            </div>
        
          </div>
      </div>
  </div>
  <script>
    $(window).on('load', function () {
      var accessToken =userid="";
      var alltotalprice=0;
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            userid=localStorage.getItem("userid");
            
            if(accessToken=="" || accessToken == null){
              //alert("1");
                window.location.href = "http://localhost/nodefrontend/login.php";
            }else{   
             // alert("3");
            console.log(userid+"userid");


                var settings = {
                  "url": "http://localhost:5001/api/cart/all-add-to-cart",
                  "method": "POST",
                  "timeout": 0,
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": accessTokenBearer                },
                  "data": JSON.stringify({
                            "userid":userid
                  }),
                };

                $.ajax(settings).done(function (response) {
                  console.log(response);
                  var totalprice=0;
                  if(response.data!=""){
                  console.log(response.data);
                  $.each(response.data, function(key, val) {
                  var data;
                  var Tprice;
                  Tprice=val.Pprice*val.Pcount;
                  
                  //data +="<div class='card'><img src='"+val.image+"' style='width:100%'><h1 id='name'>"+val.name+"</h1><p class='price'>"+val.price+"</p><p id='description'>"+val.description+"</p><p><button id='addtocart' data-id='"+val._id+"' >Add to Cart</button></p><p><button id='"+val._id+"'><a href='http://localhost/nodefrontend/product-details.php/?id="+val._id+"'>Product details</a></button></p></div>";
                  data +='<tr><td class="p-4"><div class="media align-items-center"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="d-block ui-w-40 ui-bordered mr-4" alt=""><div class="media-body">'+val.Pname+'</div></div></td><td class="text-right font-weight-semibold align-middle p-4">$'+val.Pprice+'</td><td class="align-middle p-4">'+val.Pcount+'</td><td class="text-right font-weight-semibold align-middle p-4">$'+Tprice+'</td><td class="text-center align-middle px-0"><a href="javascript:void(0);" class="shop-tooltip close float-none text-danger removecartone" title="" data-original-title="Remove" pid="'+val.Pid+'" pprice="'+Tprice+'" cartid="'+val.cartid+'" userid="'+val.userid+'">×</a></td></tr>';
                  $('.productlist').append(data);
                  
                   alltotalprice = alltotalprice + Tprice;
                  
                  



                  return data;

                }); 
                $('#totalprice').text(alltotalprice);
                $('#totalprice').attr('totalprice',alltotalprice);
                }else{
                  $("#errormsg").text("Something went wrong please try again after sometime....");
               }
         
                
              });
            }  
            var settings1 = {
              "url": "http://localhost:5001/api/cart/add-to-cart-count",
              "method": "POST",
              "timeout": 0,
              "headers": {
                "Content-Type": "application/json",
                "Authorization": accessTokenBearer      
                         },
              "data": JSON.stringify({
                "userid":userid
              }),
            };

            $.ajax(settings1).done(function (response) {
              console.log(response);
              if(response.cartproductcount==0){               
                $(".checkout").prop('disabled', true);
                } else {
                  $(".checkout").removeAttr("disabled"); 
                }             
            });




          });
          $(document).on("click",".checkout",function() {
            var accessToken ="";
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;        
           
            
            if(accessToken=="" || accessToken == null){
                window.location.href = "http://localhost/nodefrontend/login.php";
              }else{
                window.location.href = "http://localhost/nodefrontend/checkout.php";
              }
          }); 
          $(document).on("click",".removecartone",function() {

            var _this =this;//$(this).parents('tr').remove();
            var accessToken =userid=cartid="";
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            var pid=$(this).attr("data-id");
            userid=localStorage.getItem("userid");
            
            if(accessToken=="" || accessToken == null){
                window.location.href = "http://localhost/nodefrontend/login.php";
            }else{  
              pid=$(this).attr("pid");
              cartid=$(this).attr("cartid");
              //console.log(pid);
             // console.log(cartid);
              var settings = {
                "url": "http://localhost:5001/api/cart/deleteone-add-to-cart",
                "method": "POST",
                "timeout": 0,
                "headers": {
                  "Content-Type": "application/json",
                  "Authorization": accessTokenBearer                 },
                "data": JSON.stringify({               
                  "cartid":cartid,
                  "pid":pid
                }),
              };

              $.ajax(settings).done(function (response) {
                console.log(response);
                console.log($(this));
                
                var oldprice=$('#totalprice').text();
                var currentprice=$(_this).attr('pprice');
                var newprice=oldprice-currentprice;
                $('#totalprice').text(newprice);
                $(_this).parents('tr').remove();
                if(newprice==0){
                  $(".checkout").prop('disabled', true);
                }


              });
            }
          });
  </script>

</body>
</html>