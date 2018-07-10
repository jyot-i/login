<?php


 require('conn.php'); 
//echo "<script type='text/javascript'>alert('message');</script>";
  if (isset($_GET['delete'])) /* checks weather $_GET['delete'] is set*/ 
 {  
 	//echo "<script type='text/javascript'>alert('message');</script>";
 	
 	if (isset($_GET['empids']))/* checks weather $_GET['empids'] is set */
 	{
 		//echo "<script type='text/javascript'>alert('message');</script>";
 	 $checkbox = $_GET['empids']; /* value is stored in $checbox variable */
 	 if (is_array($checkbox)) 
 	 	//alert('hello');
 	 	{
 	 	 foreach ($checkbox as $key )             /* for each loop is used to get id and that id is used to delete the record below */
 	 	 { 
 	 	 	$q="DELETE  FROM student WHERE id=$key "; /* Sql query to delete the records whose id is equal to $your_slected_id */ 
 	 	 	
 	    	mysqli_query($con,$q) ; /* runs the query */
 	    	print_r($q);
 	 	 }
 	 	      header("location:dash.php"); /* Goes back to index.php */ 
 	 	  } 
 	 	} 
 	 	else { echo" you have not selected reords .. to delete"; }

 	 	 }

 	 	 if(isset($_GET['edit'])){
                // echo "<script type='text/javascript'>alert('message');</script>";
 	 	 	
 	 	 }

 	 ?>

