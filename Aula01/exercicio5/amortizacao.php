<?php
    session_start();
    $emprestimo = $_POST['emp']; 
    $juros = $_POST['juros'];
    $qtdeparcelas = $_POST['parc']; 

    $parcela = $emprestimo * (($juros / 100 * ((1 + $juros / 100) ** $qtdeparcelas)) / (((1 + $juros / 100) ** $qtdeparcelas) - 1));

    $_SESSION['emprestimo'] = $emprestimo;
    $_SESSION['juros'] = $juros; 
    $_SESSION['parcela'] = $parcela;
    $_SESSION['qtdeparcelas'] = $qtdeparcelas;

    header("Location: index.php");
?>
