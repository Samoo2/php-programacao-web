<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calcular.php" method="post">

    <h3> Calculo de preço de custo </h3>
    <label for="v_venda"> Valor de Venda </label>
    <br>
    <input type="number" id="v_venda" name="v_venda" />
    <br>
    <label for="p_lucro"> Porcentagem de Lucro</label>
    <br>
    <input type="number" id="p_lucro" name="p_lucro" />
    <br>
    <input type="submit">
    </form>

    <?php
        session_start();
        if(isset($_SESSION['p_custo'])){
            echo'O preço de custo  do produto é '.$_SESSION['p_custo'];
            unset($_SESSION['p_custo']);
        }
        ?>
</body>
</html>
