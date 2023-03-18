<?php
class Carro
{
    private $combustivel;
    private $consumo;

    function __construct($combustivel, $consumo)
    {
        $this->combustivel = $combustivel;
        $this->consumo = $consumo;
    }

    function setCombustivel($combustivel)
    {
        $this->combustivel = $combustivel;
    }

    function getCombustivel()
    {
        return $this->combustivel;
    }

    public function andar($distancia)
    {
        $combustivel_consumido = $distancia * $this->consumo;
        $this->combustivel -= $combustivel_consumido;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio Carro</title>
</head>

<body>
    <form method="post">
        <label for="combustivel"> Combustível no carro: </label>
        <input type="text" name="comb">
        <br>
        <label for="consumo"> Consumo: </label>
        <input type="text" name="cons">
        <br>
        <label for="andar"> Km andados: </label>
        <input type="text" name="andar">
        <br>
        <input type="submit" value="Calcular">
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $combustivel = $_POST['comb'];
            $consumo = $_POST['cons'];
            $distancia = $_POST['andar'];
            $carro1 = new Carro($combustivel, $consumo);
            $carro1->andar($distancia);
            echo "Combustível restante: " . $carro1->getCombustivel() . " litros\n";
        } ?>
    </form>
</body>

</html>