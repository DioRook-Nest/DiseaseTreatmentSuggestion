<?php

$f1 = fopen("DiseasePrediction/remove.csv", "r");
$f2=fopen("DiseasePrediction/values.csv", "r");
$head = fgetcsv($f1);
$head1 = fgetcsv($f2);
$sym=array();
$val=array();

while (($line = fgetcsv($f1)) !== false) {	  
	  array_push($sym,$line[0]);
	  
  } 

while (($line = fgetcsv($f2)) !== false) {	  
	array_push($val,$line[0]);
	
} 
  fclose($f1);
  fclose($f2);
  $dataPoints=array();
	$label=json_encode($sym);
	$data=json_encode($val);
/*  for($i=0; $i<count($val)-1; $i++){
	 array_push($dataPoints,array("label"=> "$sym[$i]", "y"=> $val[$i]));
 } */

/* $dataPoints = array(
	array("label"=> "$output[$x1]", "y"=> 750),
	array("label"=> "$output[$x2]", "y"=> 500),
	array("label"=> "$output[$x3]", "y"=> 250),
	array("label"=> "$output[$x4]", "y"=> 250),
	array("label"=> "$output[$x5]", "y"=> 100),
	
); */
/*
$dataPoints = array(
	array("label"=> "$output[0]", "y"=> 750),
	array("label"=> "$output[1]", "y"=> 500),
	array("label"=> "$output[2]", "y"=> 250),
	array("label"=> "$output[3]", "y"=> 250),
	array("label"=> "$output[4]", "y"=> 100),
	
);*/

?>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="DiseasePrediction/js/Chart.js"></script>
  <script src="DiseasePrediction/js/palette.js"></script>
 

  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-6 mx-auto">
            
				<canvas id="myChart" width=400 height=400 ></canvas>
                
        </div>
     </div>     
</div>


<script>

window.onload = function () {
	var data=<?php echo $data; ?>

	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
	responsive: true,
    type: 'pie',
    data: {
        labels: <?php echo $label; ?>,
        datasets: [{
            label: <?php echo $label; ?>,
			data: data,
			backgroundColor: palette('tol',data.length).map(function(hex){
				return '#'+hex;
			}),
			
            /* backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ], */
            borderWidth: 1
        }]
    },
    options: {
        //animation.animateRotate: true
    }
});
}
</script>





