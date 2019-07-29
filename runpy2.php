<?php
$dis=$_POST['disease'];
$result=exec("python treat.py .$dis",$output);
if(empty($output)){
    echo "<h1> Treatment unavaiable. Kindly contact a Doctor.";
}
else
    header('Location: results.php');
?>