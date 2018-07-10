



<?php
//header('content-Type: application/json');
require('conn.php');
$query="SELECT count(*) as total_user, month FROM registration group by month;";
$result=mysqli_query($con,$query);
$data=array();
foreach($result as $row){
	 $data[]=$row;

}
header('Content-Type: application/json');

print json_encode($data);

?>


