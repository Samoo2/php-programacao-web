<?php
    session_start();
    $soma = 0;
    $num = $_POST['num']; 

    for ($i = 0; $i < strlen($num); $i++){
        $soma += $num[$i];
    }
    $_SESSION['soma'] = $soma;
    header("Location: index.php");
?>
