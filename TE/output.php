<?php
function output()
{
    $result=exec('python "optimization.py" ',$output);
    
    for($x = 0; $x < count($output)-1; $x++) {
        echo "<br>";
        echo $output[$x];
       
    }
    echo "<br>";
    echo "<br>";
   
    echo "Probable Disease" ;
    echo "<br>"; 
    echo  $output[$x];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Prediction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  
  <div class="card">
    <center><div class="card-header"><h2>Final Result</h2></div></center>
    <center><div class="card-body"><h3>Your Symptoms</h3><h4><?php output() ?></h4></div>
   
  </div>
</div>

</body>
</html>

