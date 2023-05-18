<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout - One Step Checkout</title>
    <!-- Required meta tags always come first -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Checkout - One Step Checkout , Responsive Bootstrap 4 template , bootstrap 4 starter template, bootstrap4 template, checkout template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" lang="en" content="Checkout Bootstrap 4 pricing template , Responsive and Modern HTML5 Template made from bootstrap 4.">
    <meta name="keywords" lang="en" content="pricing template, bootstrap 4 template,bootstrap 4 checkout template, responsive bootstrap 4 template, bootstrap 4, bootstraping, bootstrap4, oribitthemes">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <meta name="description" content="">
    <!--Font Awesome-->
    <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <!--[if IE]>
      <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3"></script>
    <![endif]-->
    <!--[if lt IE 9]>
      <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie8.min.css" rel="stylesheet">
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>
    <div class="loader"></div>
    <header id="header">
        <nav class="navbar navbar-expand-md navbar-light bg-light border-bottom">
            <!-- <div class="container">
                <a class="navbar-brand" href="#" id="header-logo">
                    <img src="https://raw.githubusercontent.com/orbitthemes/Orbit-Themes/master/assets/logo.png" class="img-fluid" width="200"
                        alt="Orbit Themes">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item active">
                            <a class="nav-link text-dark" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Features</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Enterprise</a>
                        </li>
                        <li class="nav-item mr-md-3">
                            <a class="nav-link text-dark" href="#">Support</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="btn btn-outline-primary"> Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </nav>
    </header>
    <main id="main" role="main">
        <section id="checkout-container">
            <div class="container">
                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-3x text-primary"></i>
                    <h2 class="my-3">Checkout form</h2>
                    <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has
                        a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
                </div>
                <div class="row py-5">
                    <!-- <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Second product</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Third item</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>EXAMPLE CODE</small>
                                </div>
                                <span class="text-success">-$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>$20</strong>
                            </li>
                        </ul>
                        <form class="card p-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Redeem</button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                    <div class="table-responsive ">
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
            </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="" value="" >
                                    <div class="invalid-feedback">
                                    <span id="firstnameerror"></span><br>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="" value="" >
                                    <div class="invalid-feedback">
                                    <span id="lastnameerror"></span><br>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" >
                                <div class="invalid-feedback">
                                <span id="addresserror"></span><br>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address2">Address 2
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100" id="country" >
                                        <option value="">Choose...</option>
                                        <option>India</option>
                                    </select>
                                    <div class="invalid-feedback">
                                    <span id="countryerror"></span><br>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select class="custom-select d-block w-100" id="state" >
                                        <option value="">Choose...</option>
                                        <option>Kolkata</option>
                                        <option>Mumbai</option>
                                    </select>
                                    <div class="invalid-feedback">
                                    <span id="stateerror"></span><br>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" id="zip" placeholder="" >
                                    <div class="invalid-feedback">
                                    <span id="ziperror"></span><br>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr class="mb-4"> -->
                            <!-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div> -->
                            <!-- <hr class="mb-4"> -->


                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block checkout" type="button">Continue to checkout</button>
                        </form>
                    </div>
                </div>

            <a href="#" class="btn btn-primary scrollUp">
                <i class="fa fa-arrow-circle-o-up"></i>
            </a>
        </section>
    </main>
    <!-- Footer -->
    <footer id="footer">
        <p class="copyright">Made with
            <i class="fa fa-heart"></i> By
            <a target="_blank" title="" href="http://localhost/nodefrontend"></a> &copy;
            <span id="currentYear"></span> All Rights Reserved.
        </p>
       
    </footer>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="dist/jquery/jquery.min.js"></script>
    <script src="dist/popper/popper.min.js" integrity=""></script>
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/main.min.js"></script>
    <script>
    $(window).on('load', function () {
      var accessToken =userid="";
            accessToken=localStorage.getItem("accessToken");
          
            var accessTokenBearer ="Bearer "+accessToken;
            userid=localStorage.getItem("userid");
            
            if(accessToken=="" || accessToken == null){

                window.location.href = "http://localhost/nodefrontend/login.php";
            }

          });
          $(document).on("click",".checkout",function() {
            var firstname=lastname=address=address2=country=state=zip="";
            firstname=$('#firstname').val();
             alert(firstname);
              if(firstname==''){
                $('#firstnameerror').text("Please give firstname.");
                return false;
              }else{
                $('#firstnameerror').text(" ");
              }
              lastname=$('#lastname').val();
             // alert(name);
              if(lastname==''){
                $('#lastnameerror').text("Please give lastname.");
                return false;
              }else{
                $('#lastnameerror').text(" ");
              }
              
              address=$('#address').val();
              if(address==''){
                $('#addresserror').text("Please give address.");
                return false;
              }else{
                $('#addresserror').text(" ");
              }
              address2=$('#address2').val();
              
              country=$('#country').val();
              if(country==''){
                $('#countryerror').text("Please give country.");
                return false;
              }else{
                $('#countryerror').text(" ");
              }
              state=$('#state').val();
              if(state==''){
                $('#stateerror').text("Please give state.");
                return false;
              }else{
                $('#stateerror').text(" ");
              }
              zip=$('#zip').val();
              if(zip==''){
                $('#ziperror').text("Please give zip.");
                return false;
              }else{
                $('#ziperror').text(" ");
              }
              var accessToken =userid="";
              accessToken=localStorage.getItem("accessToken");
              var accessTokenBearer ="Bearer "+accessToken;
              userid=localStorage.getItem("userid");
            //   console.log(firstname+lastname+address+address2+country+state+zip);
                var settings = {
                  "url": "http://localhost:5001/api/checkout/checkout",
                  "method": "POST",
                  "timeout": 0,
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": accessTokenBearer               
                 },
                  "data": JSON.stringify({
                            "userid":userid,
                            "firstname":firstname,
                            "lastname":lastname,
                            "address":address,
                            "address2":address2,
                            "country":country,
                            "state":state,
                            "zip":zip
                  }),
                };

                $.ajax(settings).done(function (response) {
                  console.log(response);
 
                  if(response.data!=""){
                  console.log(response.data);

                }else{
                  $("#errormsg").text("Something went wrong please try again after sometime....");
               }
         
                
              });
         });
          </script>    
</body>

</html>