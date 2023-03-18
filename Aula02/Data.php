<?php
class Data {
    private $dia;
    private $mes;
    private $ano;

    public function __construct($dia = 0, $mes = 0, $ano = 0) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
    }

    public function incrementar() {
        $this->dia++;
        if ($this->dia > $this->diasNoMes()) {
            $this->dia = 1;
            $this->mes++;
            if ($this->mes > 12) {
                $this->mes = 1;
                $this->ano++;
            }
        }
    }

    public function decrementar() {
        $this->dia--;
        if ($this->dia < 1) {
            $this->mes--;
            if ($this->mes < 1) {
                $this->ano--;
                $this->mes = 12;
            }
            $this->dia = $this->diasNoMes();
        }
    }

    public function retornarData() {
        return sprintf("%02d/%02d/%04d", $this->dia, $this->mes, $this->ano);
    }

    private function diasNoMes() {
        return cal_days_in_month(CAL_GREGORIAN, $this->mes, $this->ano);
    }

    public function anoBissexto(){
        if ($this->ano % 4 == 0 && ($this->ano % 100 != 0 || $this->ano % 400 == 0)) {
            return true;
        } else {
            return false;
        }
    }
    public function diferencaDias($dia2, $mes2, $ano2) {
        $data1 = new DateTime($this->ano . '/' . $this->mes . '/' . $this->dia);
        $data2 = new DateTime($ano2 . '/' . $mes2 . '/' . $dia2);
        $intervalo = $data1->diff($data2);
        return $intervalo->days;
    }

    public function compararData($dia2, $mes2, $ano2){
        $data1 = new DateTime($this->ano . '/' . $this->mes . '/' . $this->dia);
        $data2 = new DateTime($ano2 . '/' . $mes2 . '/' . $dia2);
        if  ($data1 == $data2){
            return 0;
        }
        else if ($data1 > $data2){
            return 1;
        }else{
            return -1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h4>Manipulação de Datas</h4>
    <form method="post">
        <label for="dia">Dia:</label>
        <input type="number" name="dia" id="dia" min="1" max="31" required>
        <br><br>
        <label for="mes">Mês:</label>
        <input type="number" name="mes" id="mes" min="1" max="12" required>
        <br><br>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dia = $_POST['dia'];
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
    
            $data = new Data($dia, $mes, $ano);
            echo "<p>Data inserida: " . $data->retornarData() . "</p>";
    
            $data->incrementar();
            echo "<p>Data incrementada: " . $data->retornarData() . "</p>";
    
            $data->decrementar();
            echo "<p>Data decrementada: " . $data->retornarData() . "</p>";
    
            if ($data->anoBissexto()) {
                echo "<p>O ano é bissexto.</p>";
            } else {
                echo "<p>O ano não é bissexto.</p>";
            }
            //pegando sempre a data atual
            $dataAtual = date("Y-m-d");
            list($anoAtual, $mesAtual, $diaAtual) = explode("-", $dataAtual);
            //diferença de dias com a data corrente
            $diasDiferenca = $data->diferencaDias($diaAtual, $mesAtual, $anoAtual);
            echo "<p>Diferença em dias com a data atual: " . $diasDiferenca . " dias.</p>";
            //comparando com a data corrente
            $dataComparacao = $data->compararData($diaAtual, $mesAtual, $anoAtual);

            if ($dataComparacao == 0){
                echo  "<p>". $dataComparacao . " As datas são iguais </p>";
            }
            else if ($dataComparacao == 1){
                echo  "<p>". $dataComparacao . " A data corrente é maior que a atual. </p>";
            } else{
                echo  "<p>". $dataComparacao . " A data corrente é menor que a atual. </p>";
            }
        }
    ?>
</body>
</html>