<?php
session_start();
?>

</!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>


 

<?php


require('conn.php');
if(isset($_GET['email'])){

	 $username=$_GET['name'];
	$email=$_GET['email'];
	$apptype=$_GET['apptype'];

	 $sql="SELECT  * from registration where email = '$email' " ;
	//echo $sql;
	// exit();
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
   
  $rowcount=mysqli_num_rows($result);
   echo $rowcount;
   	
  if($rowcount>0){
  // echo"<script>alert('you have registrerd ')</script>";
    echo '<div style="display:none" id="Modal" ></div>';
}


  //exit();  
  

else{
	

$query = "INSERT into `registration` ( username,email,apptype) VALUES ('$username' ,'$email', '$apptype')";

    $result = mysqli_query($con,$query);
    if( $result){
    	$_SESSION['email'] = $email;
    echo"<script>window.location.href = 'dash.php';</script>";
   // header("location:dash.php");
}
  //  return json_encode(array("response"=>true)) ;
// exit();
    

}

   mysqli_close($con);
}




?>

</body>
</html>
