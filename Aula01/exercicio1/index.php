<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadoras</title>
</head>
<body>
    <form action="dados.php" method="post"> 
        <input type="radio" name="figura" value="circulo" checked> Circulo <br/>
        <input type="radio" name="figura" value="triangulo"> Triangulo <br/>
        <input type="radio" name="figura" value="quadrado"> Quadrado <br/>
        <input type="radio" name="figura" value="retangulo"> Retangulo <br/>

        <label for="raio"> Raio </label>
        <input type="number" id="raio" name="raio" />
        <br>
        <label for="lado"> Lado </label>
        <input type="number" id="lado" name="lado" />
        <br>
        <label for="base"> Base </label>
        <input type="number" id="base" name="base" />
        <br>
        <label for="altura"> Altura </label>
        <input type="number" id="altura" name="altura" />
    <br>
        <input type="submit"> 

    </form>

    <?php
        session_start();
        if(isset($_SESSION['resultado'])){
            echo'O resultado é '.$_SESSION['resultado'];
            unset($_SESSION['resultado']);
        }
        ?>
</body>
</html>