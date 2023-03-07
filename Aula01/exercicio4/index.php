<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calcular_multa.php" method="post">

        <p> Calculo de multa de Peixes </p>
        <label for="peso"> Peso do peixe </label>
        <br>
        <input type="number" id="peso" name="peso" />
        <br>
        <input type="submit">
        <br>

    </form>

    <?php
        session_start();
        if(isset($_SESSION['multa'] )){
            echo "A multa é de R$ " . number_format($_SESSION['multa'], 2) . ".";  
            unset($_SESSION['multa']);
        }               
        ?>
</body>
</html>
