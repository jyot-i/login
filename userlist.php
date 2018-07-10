
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div style="width: 640px height: 500px">
	<canvas id="myChart" width="300" height="100px" ></canvas>
</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
                  $.ajax({
                  	url:'user.php',
                  	method:'get',
                  	dataType : "json",
                  	success: function(data){
                  		console.log(data);
                  		var user=[];
                  		var month2=[];
                  		
                  		for(var i in data){

                             user.push(data[i].total_user);
                             month2.push( data[i].month);  
                            
                  		 	}
                  		 	

                  		var chartdata= {

                  			labels: month2,
                  			datasets:[
                  			{
                  				label:'total_user',
                  				 backgroundColor: 'rgb(255, 99, 132)',
                                 borderColor: 'rgb(255, 99, 132)',
                  				hoverbackgroundColor:'rgba(200,200,200,1)',
                  				data: user
                  			}
                                     
                  			]
                  		};
                  		   var ctx = document.getElementById('myChart').getContext('2d');
                  		   var barGraph = new Chart(ctx,
                  		   {
                            type: 'bar',
                           data: chartdata

    
                                     });
     


                  	}


                  });
   

}); 


		</script>


</body>
</html>