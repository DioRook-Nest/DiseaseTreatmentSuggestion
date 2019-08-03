<?php
$dis=file_get_contents('disease.txt');
$result=exec("python treat.py .$dis",$output);
$_POST['result']=$result;
if($result==0){
    echo "<h1> Treatment unavaiable. Kindly contact a Doctor.";
}
else
    header('Location: doctor_details.php');
?>