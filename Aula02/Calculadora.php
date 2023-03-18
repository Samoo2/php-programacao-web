<?php

session_start();

if (!isset($_SESSION['calculadora'])) {
    $_SESSION['calculadora'] = new Calculadora();
}

$calculadora = $_SESSION['calculadora'];
class Calculadora
{
    private $resultado;
    private $memoria;

    public function __construct()
    {
        $this->resultado = 0;
        $this->memoria = 0;
    }

    public function soma($num)
    {
        $this->memoria = $this->resultado;
        $this->resultado = $this->resultado + $num;
    }

    public function subtrai($num)
    {
        $this->memoria = $this->resultado;
        $this->resultado = $this->resultado - $num;
    }

    public function multiplica($num)
    {
        $this->memoria = $this->resultado;
        $this->resultado = $this->resultado * $num;
    }

    public function divide($num)
    {
        if ($num != 0) {
            $this->memoria = $this->resultado;
            $this->resultado = $this->resultado / $num;
        } else {
            echo "Não é possível dividir por zero.";
        }
    }
    public function potencia($num)
    {
        $this->memoria = $this->resultado;
        $this->resultado = $this->resultado ** $num;
    }
    public function raizQuadrada()
    {
        $this->memoria = $this->resultado;
        $this->resultado = sqrt($this->resultado);
    }

    public function zerar()
    {
        $this->resultado = 0;
    }

    public function desfazer()
    {
        $this->resultado = $this->memoria;
    }

    public function getResultado()
    {
        return $this->resultado;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Calculadora</title>
</head>

<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["numero1"];
        if (isset($_POST["op"])) {
            $op = $_POST["op"];
            switch ($op) {
                case "+":
                    $calculadora->soma($num);
                    break;
                case "-":
                    $calculadora->subtrai($num);
                    break;
                case "*":
                    $calculadora->multiplica($num);
                    break;
                case "/":
                    $calculadora->divide($num);
                    break;
                case "^":
                    $calculadora->potencia($num);
                    break;
                case "√":
                    $calculadora->raizQuadrada();
                    break;
                case "zerar":
                    $calculadora->zerar();
                    break;
                case "desfazer":
                    $calculadora->desfazer();
                    break;
            }
            echo "<p>Resultado: " . $calculadora->getResultado() . "</p>";
        }
    }    
    ?>
    <form method="POST" action="">
        <input type="text" name="numero1" placeholder="Digite o primeiro número"><br><br>
        <input type="submit" name="op" value="+">
        <input type="submit" name="op" value="-">
        <input type="submit" name="op" value="*">
        <input type="submit" name="op" value="/">
        <input type="submit" name="op" value="^">
        <input type="submit" name="op" value="√"> 
        <input type="submit" name="op" value="zerar">
        <input type="submit" name="op" value="desfazer">
    </form>
</body>
</html>