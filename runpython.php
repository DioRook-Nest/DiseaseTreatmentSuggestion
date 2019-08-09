<?php
    $arr=$_POST;
    array_shift($arr);
    if(!empty($arr)){
        
        
        #$arr=unserialize(base64_decode($_POST['ip'])) ;
        $k1=json_encode($arr);
        $k= str_replace( '_', ' ', $k1);
        ///echo $k;
        $file='rem.json';
        $handle=fopen($file,'w');
        fwrite($handle,$k);
        $cmd='python "te_svd.py" ';
        $p=exec($cmd,$output); 
        //print_r($output);
        
        
    }
    if(isset($_POST['next'])){

        session_start();
        $_SESSION['opt']=$output;
        if($output)
            header('Location: symp.php');
        else
            echo "Error";
            exit;

    }
    else{
        exec('python "optimization.py" ',$output);
        if(file_exists('disease.txt'))
            $dis = file_get_contents('disease.txt');
        #exec("python treat.py .$dis",$output);
        session_start();
        $_SESSION['abcd']=1;
        if(file_exists('res.csv'))
            unlink('res.csv');
        header('Location: /AI-Care/medical.php');
        exit;
    }
    
    ?>




