<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form style="border:1px solid #ccc">
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to login.</p>
    <hr>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email">
    <span id="emailerror"></span><br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="password">
       <span id="passworderror"></span><br>
      <button type="button" class="signupbtn" onclick="login()">Login</button>
      <br>
      <span id="successmsg"></span>
      <span id="error"></span>
      <br>
      <br>
      <br>
      <span>Not a member yet?<a href="http://localhost/nodefrontend/register.php"> Register now</a> </span>
    </div>
  </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
  function IsEmail(email) {
          var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regex.test(email)) {
            return false;
          }else{
            return true;
          }
}

        function login () {
          var password=email="";
             
              email=$('#email').val();
              if(email==''){
                $('#emailerror').text("Please give email.");
                return false;
              }else{
                $('#emailerror').text(" ");
              }
              if(IsEmail(email)==false){
                  $('#emailerror').text("Please give valid email.");
                  return false;
                }else{
                $('#emailerror').text(" ");
              }
              password=$('#password').val();

              if(password==''){
                $('#passworderror').text("Please give password.");
                return false;
              }else{
                $('#passworderror').text(" ");
              }
            
          $.ajax({
              url:"http://localhost:5001/api/users/login",    //the page containing php script
              type: "post",    //request type,
              dataType: 'json',
              contentType: "application/json",
              data: JSON.stringify({
                      "email":email,
                      "password":password 
                    }),
              success:function(result){
                  $("#successmsg").text("User Login Successfully");
                  setTimeout(function() { $("#successmsg").hide(); }, 5000);

                  $('#error').text(" ");
                  localStorage.setItem("accessToken",result.accessToken)
                  localStorage.setItem("email",result.email)
                  localStorage.setItem("userid",result.id)
                  localStorage.setItem("role",result.role)


                 if(result.role==1){
                     //redirect for admin
                      window.location.href = "http://localhost/nodefrontend/admin/dashboard.php";
                  }
                  if(result.role==2){
                    //redirect for customer
                     window.location.href = "http://localhost/nodefrontend/";


                  }

                  

              },
              error: function(e) {
                if(e.status==400){

                  $('#error').text("All fields are mandetory");
                  return false;              
                }
                else{
                  $('#error').text(" ");
                }
                if(e.status==401){

                  $('#error').text("email or password is not valid");
                  return false;              
                  }
                  else{
                  $('#error').text(" ");
                  } 
              }

          });
    }

 </script>   
</body>
</html>
