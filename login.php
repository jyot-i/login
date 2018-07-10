<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
	<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password"  />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='reg.php'>Register Here</a></p>
</div>
<?php
require('conn.php');
//session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
	$username = stripslashes($_POST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
   $query = "SELECT * FROM `registration` WHERE username='$username'
      and password='$password' ";

	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	   $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: welcome.php");
         }
        
         else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }
?>
</body>
</html>