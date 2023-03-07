<?php
    session_start();
    
    $v_venda = $_POST['v_venda']; 
    $p_lucro = $_POST['p_lucro'];

    $p_custo = $v_venda - $v_venda * ($p_lucro / 100);

    $_SESSION['p_custo'] = $p_custo;
    header("Location: index.php");
?>
