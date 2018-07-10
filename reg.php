<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="1028853452082-0ppic6r0qq22h225fqgj3625784dfusb.apps.googleusercontent.com">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
   

 






	<div class="form">
	<h1>Registration</h1>
<form id="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required data-validation="alphanumeric" data-validation-error-msg-container="#user-error-dialog" />
  <div id="user-error-dialog"></div>
<input type="email" name="email" placeholder="Email" required data-validation="email" data-validation-error-msg="You did not enter a valid e-mail"            data-validation-error-msg-container="#email-error-dialog"  />
		 <div id="email-error-dialog"></div>
<input type="password"  name="password" placeholder="Password" required data-validation="strength" data-validation-strength="2" data-validation-error-msg-container="#pass-error-dialog" data-validation-error-msg="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character" data-validation-regexp="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}"/>
<div id="pass-error-dialog"></div>

<input type="password"  name="pass"  placeholder="RE_Password" required data-validation="confirmation" data-validation-confirm="password"           data-validation-error-msg-container="#repass-error-dialog"  />   
<div id="repass-error-dialog"></div>
<input type="submit" name="submit" value="Register" />



</form>

<div class="g-signin2" data-onsuccess="onSignIn"></div>
<script>
  function onSignIn(googleUser) {
   var profile = googleUser.getBasicProfile();
 console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
 console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
   insert_user(profile.getEmail(),profile.getName()).done();
}
function insert_user(email,username){
     var email= email;
    var name= username;
    var apptype= "google user";

  jason={'email':email,'name':name,' apptype': apptype}

  $.ajax({
        type :'get',
        url:'insert.php',
        data:jason,
        success:function(data){
               $('#result').html(data);
        }
      })
}


function init() {
  gapi.auth2.init() 
  {
  client_id: '1028853452082-0ppic6r0qq22h225fqgj3625784dfusb.apps.googleusercontent.com';
}
  gapi.load('auth2', function() { 


if (auth2.isSignedIn.get()) {
  var profile = auth2.currentUser.get().getBasicProfile();
  document.write('ID: ' + profile.getId());
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName());
  console.log('Family Name: ' + profile.getFamilyName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());

 
  
}
  });
}





</script>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<div id="result"></div>

<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    form : '#registration',
    modules : 'security',
    onModulesLoaded : function() {
    var optionalConfig = {
      fontSize: '12pt',
      padding: '4px',
      bad : 'Very bad',
      weak : 'Weak',
      good : 'Good',
      strong : 'Strong',
      errorMessagePosition : 'top'
    };

    $('input[name="password"]').displayPasswordStrength(optionalConfig);
  }

  
  });
</script>
</div>
   <?php
require('conn.php');
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
	$username = stripslashes($_POST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
	
    $query = "INSERT into `registration` (username, email, password)
         VALUES ('$username', '$email', '$password')";

    $result = mysqli_query($con,$query);
   

        if($result){
          
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
    
  
  ?>
  

</body>

</html>
 