<?php
$dis=trim(file_get_contents('disease.txt'));
#echo $dis;
$result=exec("python treat.py .$dis",$output);
$_POST['result']=$result;
    header('Location: /AI_Care_tina/doctor_details.php');
?>