<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

  
 

  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-8 mx-auto">
            
				<canvas id="myChart" width=400 height=400 ></canvas>
                
        </div>
     </div>     
</div>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>

  
  <script src="DiseasePrediction/js/Chart.js"></script>
  <script src="DiseasePrediction/js/palette.js"></script>
  <script src="DiseasePrediction/js/graph.js"></script>






