</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script>
	function check(){
		var name=prompt('enter your age please');
		if(name>18){
			alert('eligible');
		}
		else{
			alert('you are only'+' ' + name+' ' + 'years old'+ ' how can you think about driving!!')
		}
	}

	function add( num1, num2){
          return num1+num2;
	}
	//alert(add(5,1))

</script>
<button onclick='check()'>check your elegibilty here </button>

<?php
for($i=0; $i>5; $i++){

     for($j=0; $j<$i; $j++){

      echo"*";
} 

echo "<br />";
}

?>
</body>
</html>



<?php
require('conn.php');

$veg=array("35","37","43","50","35","37","43","50","35","37","43","50","35","37","43","50","35","37","43","50");
$arrlength = count($veg);

function myarray($incre,$len,$ar){
      
 for ($x = $incre; $x < $len; $x++){
      echo $ar[$x].' ';

  }
}





  

$a=array("red","green","blue","yellow","brown");
$delete=array_slice($a,1,1);
if(in_array('blue',$a))
{
	unset($a[array_search('blue',$a)]);
}
print_r($a);


myarray(0,2,$a);
 
?>



