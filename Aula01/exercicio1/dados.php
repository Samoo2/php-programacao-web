<?php

    session_start();
    $figura = $_POST['figura'];
    $resultado = 0;

    switch($figura){
        case 'circulo':
            $raio = $_POST['raio'];
            $resultado = ($raio ** 2)*M_PI;
            break;
            
        case 'quadrado':
            $lado = $_POST['lado'];
            $resultado = $lado * $lado;
            break;
        
        case 'triangulo':
            $base = $_POST['base'];
            $altura = $_POST['altura'];
            $resultado = ($base * $altura) / 2;
            break;

        case 'retangulo':
            $base = $_POST['base'];
            $altura = $_POST['altura'];
            $resultado = $base * $altura;
            break;
    }

    $_SESSION['resultado'] = $resultado;

    header("Location: index.php");
?>
