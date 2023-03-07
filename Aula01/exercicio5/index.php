<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4> Sistema PRICE de Amortização </h4>
    <form action="amortizacao.php" method="post">
        <label for="emp"> Valor do Empréstimo </label>
        <br>
        <input type="number" id="emp" name="emp" />
        <br>
        <label for="juros"> Porcent. de Juros </label>
        <br>
        <input type="number" step="0.01" id="juros" name="juros" />
        <br>
        <label for="parc"> N° de Parcelas </label>
        <br>
        <input type="number" id="parc" name="parc" />
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    session_start();

    if (isset($_SESSION['parcela']) && isset($_SESSION['emprestimo']) && isset($_SESSION['juros']) && isset($_SESSION['qtdeparcelas'])) {

        $emprestimo = $_SESSION['emprestimo'];
        $juros = $_SESSION['juros'];
        $parcela = $_SESSION['parcela'];
        $qtdeparcelas = $_SESSION['qtdeparcelas'];

        ?>
        <table>
            <thead>
                <tr>
                    <th>N° Parcela</th>
                    <th>Valor Parcela</th>
                    <th>Amortização</th>
                    <th>Juros</th>
                    <th>Saldo Devedor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $qtdeparcelas; $i++) {
                    $j = $emprestimo * ($juros / 100);
                    $amortizacao = $parcela - $j;
                    $saldo = $emprestimo - $amortizacao;

                    // atualiza o valor de $emprestimo para a próxima iteração
                    $emprestimo = $saldo;
                    ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <?php echo number_format($parcela,2); ?>
                        </td>
                        <td>
                            <?php echo number_format($amortizacao,2); ?>
                        </td>
                        <td>
                            <?php echo number_format($j,2); ?>
                        </td>
                        <td>
                            <?php echo number_format($saldo,2); ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php

        unset($_SESSION['emprestimo']);
        unset($_SESSION['juros']);
        unset($_SESSION['parcela']);
        unset($_SESSION['qtdeparcelas']);
    }
    ?>
</body>
</html>
