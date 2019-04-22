<?php
$dis=$_POST['disease'];
$result=exec("python treat.py .$dis",$output);

header('Location: results.php');
?>