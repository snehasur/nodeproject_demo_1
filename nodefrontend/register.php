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
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"id="username">
    <span id="usernameerror"></span><br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email">
    <span id="emailerror"></span><br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="password">
       <span id="passworderror"></span><br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="rpassword" >
    <span id="rpassworderror"></span><br>

    <!-- <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
     -->
    <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button> -->
      <button type="button" class="signupbtn" onclick="create()">Sign Up</button>
      <br>
      <span id="successmsg"></span>
      <span id="error"></span>
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

        function create () {
          var username=password=email=phno=rpassword="";
              username=$('#username').val();
             // alert(name);
              if(username==''){
                $('#usernameerror').text("Please give username.");
                return false;
              }else{
                $('#usernameerror').text(" ");
              }
              email=$('#email').val();
             // alert(email);
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
             // alert(password);
              if(password==''){
                $('#passworderror').text("Please give password.");
                return false;
              }else{
                $('#passworderror').text(" ");
              }
              rpassword=$('#rpassword').val();
             // alert(password);
              if(rpassword==''){
                $('#rpassworderror').text("Please give repeat password.");
                return false;
              }else{
                $('#rpassword').text(" ");
              }
              if(password!==rpassword){
                $('#rpassworderror').text("Password does not match with repeat password.");
                return false;              
              }
              else{
                $('#rpassworderror').text(" ");
              }
            //   phno=$('#phno').val();
            //   //alert(phno);
            //   if(phno==''){
            //     $('#phnoerror').text("Please give phone no.");
            //     return false;
            //   }else{
            //     $('#phnoerror').text(" ");
            //   }
            // var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/; 
            // if(!p./hone_pattern.test( phno )) {
            //  // alert('1');
            //    $('#phnoerror').text("Please give valid phone no.");
            //     return false;
            //   }else{
            //     //alert('2');
            //     $('#phnoerror').text(" ");
                
            //   }

          alert("1");
          $.ajax({
              url:"http://localhost:5001/api/users/register",    //the page containing php script
              type: "post",    //request type,
              dataType: 'json',
              contentType: "application/json",
              data: JSON.stringify({
                      "username":username,
                      "email":email,
                      "password":password 
                    }),
              success:function(result){
                  console.log(result);
                  $("#successmsg").text("User created");
                  setTimeout(function() { $("#successmsg").hide(); }, 5000);

                  $('#error').text(" ");
                  window.location.href = "http://localhost/nodefrontend/login.php";


              },
              error: function(e) {
                console.log(e.status);
                if(e.status==400){

                  $('#error').text("All fields are mandetory");
                  console.log("All fields are mandetory");
                  return false;              
                }
                else{
                  $('#error').text(" ");
                }
                if(e.status==404){

                  $('#error').text("User already registrated");
                  console.log("User already registrated");
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
