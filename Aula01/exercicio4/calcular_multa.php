<?php
    session_start();
    $multa = 0;
    $peso = $_POST['peso']; 
    if($peso > 50){
        $excesso = $peso - 50;
        $multa = ceil($excesso / 5) * 4;
    }
    else{
        $multa = 0;
    }

    $_SESSION['multa'] = $multa;
    header("Location: index.php");
?>
