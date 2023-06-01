<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .disable{
        pointer-events:none;
    }
  </style>
</head>
<body>
<h4 class="mb-3">Payment</h4>
<form>
<div class="d-block my-3">
    <div class="custom-control custom-radio disable" >
        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input paymenttype"  required value="credit">
        <label class="custom-control-label" for="credit">Credit card</label>
    </div>
    <div class="custom-control custom-radio disable">
        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input paymenttype" required value="debit">
        <label class="custom-control-label" for="debit">Debit card</label>
    </div>
    <div class="custom-control custom-radio disable">
        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input paymenttype" required value="paypal">
        <label class="custom-control-label" for="paypal">Paypal</label>
    </div>
    <div class="custom-control custom-radio">
        <input id="cod" name="paymentMethod" type="radio" class="custom-control-input paymenttype" required value="cod" checked>
        <label class="custom-control-label" for="paypal">Cash On Delivary</label>
    </div>
</div>
<div class="row disable" style="display:none">
    <div class="col-md-6 mb-3">
        <label for="cc-name">Name on card</label>
        <input type="text" class="form-control" id="cc-name" placeholder="" required>
        <small class="text-muted">Full name as displayed on card</small>
        <div class="invalid-feedback">
            Name on card is required
        </div>
    </div>
    <div class="col-md-6 mb-3" style="display:none">
        <label for="cc-number">Credit card number</label>
        <input type="text" class="form-control" id="cc-number" placeholder="" required>
        <div class="invalid-feedback">
            Credit card number is required
        </div>
    </div>
</div>
<div class="row disable" style="display:none">
    <div class="col-md-3 mb-3">
        <label for="cc-expiration">Expiration</label>
        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
        <div class="invalid-feedback">
            Expiration date required
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="cc-expiration">CVV</label>
        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
        <div class="invalid-feedback">
            Security code required
        </div>
    </div>
</div>
<button class="btn btn-primary btn-lg btn-block " id="payment" type="button">Payment Now</button>
</form>
<img style="display:none;" id="loader" src="https://media.tenor.com/wpSo-8CrXqUAAAAi/loading-loading-forever.gif" width="200" height="200">

<script>
        $(document).on("click","#payment",function() {
          $("#loader").show(); 
          document.getElementById("payment").disabled = true;


            var accessToken =userid="";
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            userid=localStorage.getItem("userid");
            
            if(accessToken=="" || accessToken == null){

                window.location.href = "http://localhost/nodefrontend/login.php";
            }else{
          var type=$('.paymenttype:checked').val();
          //console.log(type);
          var accessToken =userid="";
              accessToken=localStorage.getItem("accessToken");
              var accessTokenBearer ="Bearer "+accessToken;
              userid=localStorage.getItem("userid");
              
            //   //console.log(firstname+lastname+address+address2+country+state+zip);
                var settings = {
                  "url": "http://localhost:5001/api/payment/add",
                  "method": "POST",
                  "timeout": 0,
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": accessTokenBearer               
                 },
                  "data": JSON.stringify({
                            "userid":userid,
                            "type":type
                  }),
                };

                $.ajax(settings).done(function (response) {
                  
                  //console.log(response);
 
                  if(response.data!=""){
                  //console.log(response.data);
                  //window.location.href = "http://localhost/nodefrontend/order.php";
                  var settings = {
                "url": "http://localhost:5001/api/orders/createordernew",
                "method": "POST",
                "timeout": 0,
                "headers": {
                  "Content-Type": "application/json",
                  "Authorization": accessTokenBearer                 },
                "data": JSON.stringify({               
                  "userid":userid                 
                }),
              };

              $.ajax(settings).done(function (response) { 
                 
                //console.log(response.data._id);      
                if(response.data!=""){
                    window.location.href = "http://localhost/nodefrontend/thank-you.php/?orderid="+response.data._id;
                }
              });
                 

                }else{
                  $("#errormsg").text("Something went wrong please try again after sometime....");
               }
         
                
              });
            }
        });
</script>
</body>
</html>
