<?php
session_start();
$dis=trim(file_get_contents('disease.txt'));
#echo $dis;
#$result=exec("python treat.py ".$dis,$output);
$result=exec("python treat.py ",$output);
print_r($output);
#session_start();
$_SESSION["result"]=(int)$result;
    header('Location: /AI-Care/doctor_details.php');
?>