<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="somar.php" method="post">

    <h3> Soma de dígitos de um número </h3>
    <label for="num"> Numero </label>
    <br>
    <input type="number" id="num" name="num" />
    <br>
    <input type="submit">

    </form>

    <?php
        session_start();
        if(isset($_SESSION['soma'])){
            echo'O resultado  da soma é '.$_SESSION['soma'];
            unset($_SESSION['soma']);
        }
        ?>
</body>
</html>
