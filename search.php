<?php
require('conn.php');
if(isset($_POST['search'])){

  

  

  $search=$_POST['search'];
  $sql="select * from student where name LIKE '%$search%'";
  if(isset($_POST['orderby'])){
    $sql="select * from student where name LIKE '%$search%' order by  ".$_POST['orderby'];
  }
  

  
  
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count==0){
    echo"no records";
    
  }
  else{
    echo"<div class='container'>"; 
echo"<table class='table table-bordered'>";

   echo"<tr>";
   echo" <th>name</th>";
   echo" <th>roll_no</th>";
   echo" <th>class</th>";
   echo" <th>rank</th>";
   echo" <th>remarks</th>";
   echo" <th><input type='checkbox' id='selectall'>select all</th>";
   
  echo"</tr>";
    while ($row = mysqli_fetch_object($result))  
{ 

  $stuname='"'.$row->name.'"';
  $stuid='"'.$row->id.'"';
  $stuclass='"'.$row->class.'"';
  $sturank='"'.$row->rank.'"';
  $sturoll='"'.$row->roll_no.'"';
  $sturemark='"'.$row->remarks.'"';
 

  echo"<tr>";
   echo" <td>$row->name</td>";
   echo" <td>$row->roll_no</td>";
   echo" <td>$row->class</td>";
   echo" <td>$row->rank</td>";
   echo" <td>$row->remarks</td>";
   echo" <td><input type='checkbox' class='checkboxall' name='empids[]' value='$row->id'></td>";
   echo" <td><a  class='btn' data-toggle='modal' data-target='#myModal' onclick='setvalue(".$stuid.",".$stuname.",".$sturoll.",".$stuclass.",".$sturank.",".$sturemark.")'>edit</a></td>";
  echo"</tr>";

 

 

} 
mysqli_free_result($result); 
echo"</table>";

echo"</div>";
  }

}
if(isset($_POST['text'])){
    $sql="select * from student where class =  ".$_POST['text'];
    $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count==0){
    echo"no records";
    
  }
  else{
    echo"<div class='container'>"; 
echo"<table class='table table-bordered'>";

   echo"<tr>";
   echo" <th>name</th>";
   echo" <th>roll_no</th>";
   echo" <th>class</th>";
   echo" <th>rank</th>";
   echo" <th>remarks</th>";
   echo" <th><input type='checkbox' id='selectall'>select all</th>";
   
  echo"</tr>";
    while ($row = mysqli_fetch_object($result))  
{ 

  $stuname='"'.$row->name.'"';
  $stuid='"'.$row->id.'"';
  $stuclass='"'.$row->class.'"';
  $sturank='"'.$row->rank.'"';
  $sturoll='"'.$row->roll_no.'"';
  $sturemark='"'.$row->remarks.'"';
 

  echo"<tr>";
   echo" <td>$row->name</td>";
   echo" <td>$row->roll_no</td>";
   echo" <td>$row->class</td>";
   echo" <td>$row->rank</td>";
   echo" <td>$row->remarks</td>";
   echo" <td><input type='checkbox' class='checkboxall' name='empids[]' value='$row->id'></td>";
   echo" <td><a  class='btn' data-toggle='modal' data-target='#myModal' onclick='setvalue(".$stuid.",".$stuname.",".$sturoll.",".$stuclass.",".$sturank.",".$sturemark.")'>edit</a></td>";
  echo"</tr>";

 

 

} 
mysqli_free_result($result); 
echo"</table>";

echo"</div>";
  }
  }


?>