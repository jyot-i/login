<?php
session_start();

?>
<DOCTYPE!>
<html>
  <head>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  	
  	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
  </head>
  <body>
    <p>Welcome <?php echo $_SESSION['email']; ?>!</p>
   <div> <a href="userlist.php">view user graph</a></div>
  	<button class="btn-primary btn-lg">create user</button>

  	<form class="navbar-form" role="search" id="search">
    <div class="input-group add-on">
      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit" name="search" id="srch"><i class="glyphicon glyphicon-search"></i></button>
        
      </div>
    </div>
    <div >
    	<select name="filter1" id="sort_by">
    		<option value="">Select</option>
    		<option value="roll_no asc">Roll Asc</option>
    		<option value="roll_no desc">Roll Desc</option>
    		<option value=" rank asc">Rank Asc</option>
    		<option value=" rank desc">Rank Desc</option>
    	</select>
    	<input type="checkbox" id="cio" value="12" name=group[] class="cio">  class 12 &nbsp; &nbsp; <input type="checkbox" id="ceo" value="10" name=group[] class="cio"> class 10
    </div>
    
  </form>
 
  <div id="result"></div>

  	
  	<form id="deleteform" method='get' action='delete.php'>

  		
 <?php
require('conn.php');
 
  
$result = mysqli_query($con,"select * from student");  
echo "<h2>information:</h2>"; 
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
?>  



<input type='submit' name='delete' value="delete user" class="btn btn-lg"> 

</form>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        


<form method="post" name='updateform'>
  <div class="md-form mb-5">
  	
    <label for="exampleInputEmail1"> name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="enter name" name="name">
  </div>
  <div class="form-group">
    <label for="roll">roll no</label>
    <input type="text" class="form-control" name="roll" placeholder="roll no">
  </div>
  <div class="form-group">
    <label for="class">class</label>
    <input type="text" name="class" class="form-control" placeholder="class">
    
  </div>
  <div class="form-group">
    <label for="rank">rank</label>
    <input type="text" name="rank"  class="form-control" placeholder="rank">
    
  </div>
  <div class="form-group">
    <label for="remark">remarks</label>
    <input type="text" name="remark" class="form-control" placeholder="remark">
    
  </div>
  <input type="hidden" name="uid" class="form-control" placeholder="remark">
  
  <input type="submit" class="btn btn-default" name="update" value="update">
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
<?php
require('conn.php');
if(isset($_POST['update'])){
	$id=$_POST['uid'];
	$name=$_POST['name'];
	$roll=$_POST['roll'];
	$class=$_POST['class'];
	$rank=$_POST['rank'];
	$remark=$_POST['remark'];
    
    $sql="UPDATE student SET name = '$name', roll_no = '$roll', class = '$class', rank = '$rank', remarks = '$remark' WHERE id = '$id'";

    $result = mysqli_query($con,$sql);

        if(!$result){
            echo "<div class='form'>
                <h3>record has not been added.</h3></div>";

        }
}

?>

  	
  	
  		
  	
  <div class="container">


<form method="post" id='insertform'>
  <div class="form-group">
    <label for="exampleInputEmail1"> name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="enter name" name="name">
  </div>
  <div class="form-group">
    <label for="roll">roll no</label>
    <input type="text" class="form-control" name="roll" placeholder="roll no">
  </div>
  <div class="form-group">
    <label for="class">class</label>
    <input type="text" name="class" class="form-control" placeholder="class">
    
  </div>
  <div class="form-group">
    <label for="rank">rank</label>
    <input type="text" name="rank"  class="form-control"placeholder="rank">
    
  </div>
  <div class="form-group">
    <label for="remark">rank</label>
    <input type="text" name="remark" class="form-control" placeholder="remark">
    
  </div>
  
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
</div>

<script>
	$( "#insertform" ).hide();
$( "button.btn-primary" ).click(function() {
  $( "#insertform" ).toggle( "blind", 1000 );
});
</script>
<script>
$(document).ready(function(){
$("#selectall").click(function(){
        //alert("just for checks        
        if(this.checked){
            $('.checkboxall').each(function(){
                this.checked = true;
            })
        }else{
            $('.checkboxall').each(function(){
                this.checked = false;
            })
        }
        });

      

  $('#srch').click(function(e){
  	e.preventDefault();
  	$( "#deleteform" ).hide();
   // var orderby
  
  
  	var search= $('#srch-term').val();
  	
  	  
 

  	  
  	if(search.length==0){
  		
  		$('#result').html('please enter something');

  	}	
  	else{
  		var sort_by = $('#sort_by').val();
  		
  		//var sort_by2 = $('#sort_by2').val();
  		var jason={'search':search}
  		if(sort_by != ""){
  			jason={'search':search,'orderby':sort_by}
  		}
  		

  		

  		$.ajax({
  			type :'post',
  			url:'search.php',
  			data:jason,
  			success:function(data){
               $('#result').html(data);
  			}
  		})
  	}
  	

  });
  

   $('.cio').click(function(){
   	$( "#deleteform" ).hide();
   	var text='';
   	 $(".cio:checked").each(function(){
        text+=$(this).val()+' '+'OR'+' '+'Class =';
         
        
    });
   	 text=text.substring(0,text.length-11);
   	 alert(text);
   	
   	 $.ajax({
  			type :'post',
  			url:'search.php',
  			data:{'text':text},
  			success:function(data){
               $('#result').html(data);
  			}
  		})
    	 
        //alert("just for checks        
       


        
        });

  
     
});
</script>
<script>
	function setvalue(id,name,roll_no,class1,rank,remark){
		
		document.forms[2]["uid"].value=id;
		document.forms[2]["name"].value=name;
		document.forms[2]["roll"].value=roll_no;
		document.forms[2]["class"].value=class1;
		document.forms[2]["rank"].value=rank;
		document.forms[2]["remark"].value=remark;
		
	}

</script>

  </body>



</html>

<?php
if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$roll=$_POST['roll'];
	$class=$_POST['class'];
	$rank=$_POST['rank'];
	$remark=$_POST['remark'];

	$query = "INSERT into `student` (name, roll_no, class, rank,remarks)
         VALUES ('$name', '$roll', '$class','$rank','$remark')";

    $result = mysqli_query($con,$query);
    

        if($result){
            header('location:dash.php');

        }

}

?>