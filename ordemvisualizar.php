<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordens</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body>
    <div class="divCentral" style="height: 1000px;">
        <ul style="text-align: left; padding: 0px;">
            <li><a href="/ordem.php">Voltar</a></li>
        </ul>

        <form action="ordemvisualizar.php" method="POST">
            <label for="numero">Filtrar por número da ordem:</label><br>
            <input type="text" id="numero" name="numero"><br>
            <button class="w3-button w3-blue w3-margin" type="submit" name="filtrarNumero" class="btnEnviar">Filtrar</button>
        </form><br>

        <form action="ordemvisualizar.php" method="POST">
            <label for="nome">Filtrar por nome do cliente:</label><br>
            <input type="text" id="nome" name="nome"><br>
            <button class="w3-button w3-blue w3-margin" type="submit" name="filtrarCliente" class="btnEnviar">Filtrar</button>
        </form><br>

        <form action="ordemvisualizar.php" method="POST">
            <label for="numero">Filtrar por período:</label><br>
            Entre <input type="date" id="dataInicio" name="dataInicio">
            e
            <input type="date" id="dataFim" name="dataFim"><br>
            <button class="w3-button w3-blue w3-margin" type="submit" name="filtrarPeriodo" class="btnEnviar">Filtrar</button>
        </form><br>

        <?php
        if (isset($_POST['filtrarNumero'])) {
            $numero = $_POST['numero'];
            echo ('<table style="background-color: #6fa1fe; margin-top: 10px; border-radius: 7px; text-align: center; padding: 5px;">');
            echo ('<tr>');
            echo ('<th style="width: 10%;">Código</th>');
            echo ('<th style="width: 10%;">Data de Abertura</th>');
            echo ('<th style="width: 10%;">Nome consumidor</th>');
            echo ('<th style="width: 10%;">CPF consumidor</th>');
            echo ('<th style="width: 10%;">Cod Produto</th>');
            echo ('<th style="width: 10%;">Finalizado</th>');
            echo ('<th style="width: 0px;"></th>');
            echo ('</tr>');

            include_once("listagem.php");

            $filtroNumero = filtrar_numero_ordem($numero);

            if (mysqli_num_rows($filtroNumero) > 0) {
                while ($i = mysqli_fetch_assoc($filtroNumero)) {
                    echo ("<tr>");
                    echo ("<td>" . $i["codigo"] . "</td>");
                    echo ("<td>" . $i["data_abertura"] . "</td>");
                    echo ("<td>" . $i["nome_consumidor"] . "</td>");
                    echo ("<td>" . $i["cpf_consumidor"] . "</td>");
                    echo ("<td>" . $i["cod_produto"] . "</td>");
                    if ($i["finalizado"] == "0") {
                        echo ("<td><input type=\"checkbox\" disabled></td>");
                    } else {
                        echo ("<td><input type=\"checkbox\" checked disabled></td>");
                    }
                    echo ("<td>");
                    echo ("<form action=\"endpoints.php\" method=\"POST\">");
                    echo ('<input type="hidden" id="codigo" name="codigo" value="' . $i["codigo"] . '">');
                    echo ('<button class="w3-button w3-blue w3-margin" type="submit" name="finalizarOrdem" class="btnEnviar">Finalizar</button>');
                    echo ('</form>');
                    echo ('</td>');
                    echo ("</tr>");
                }
            }
            echo ('</table>');
        }
        ?>

        <?php
        if (isset($_POST['filtrarCliente'])) {
            $nome = $_POST['nome'];
            echo ('<table style="background-color: #6fa1fe; margin-top: 10px; border-radius: 7px; text-align: center; padding: 5px;">');
            echo ('<tr>');
            echo ('<th style="width: 10%;">Código</th>');
            echo ('<th style="width: 10%;">Data de Abertura</th>');
            echo ('<th style="width: 10%;">Nome consumidor</th>');
            echo ('<th style="width: 10%;">CPF consumidor</th>');
            echo ('<th style="width: 10%;">Cod Produto</th>');
            echo ('<th style="width: 10%;">Finalizado</th>');
            echo ('<th style="width: 0px;"></th>');
            echo ('</tr>');

            include_once("listagem.php");

            $filtroNome = filtrar_nome_ordem($nome);

            if (mysqli_num_rows($filtroNome) > 0) {
                while ($i = mysqli_fetch_assoc($filtroNome)) {
                    echo ("<tr>");
                    echo ("<td>" . $i["codigo"] . "</td>");
                    echo ("<td>" . $i["data_abertura"] . "</td>");
                    echo ("<td>" . $i["nome_consumidor"] . "</td>");
                    echo ("<td>" . $i["cpf_consumidor"] . "</td>");
                    echo ("<td>" . $i["cod_produto"] . "</td>");
                    if ($i["finalizado"] == "0") {
                        echo ("<td><input type=\"checkbox\" disabled></td>");
                    } else {
                        echo ("<td><input type=\"checkbox\" checked disabled></td>");
                    }
                    echo ("<td>");
                    echo ("<form action=\"endpoints.php\" method=\"POST\">");
                    echo ('<input type="hidden" id="codigo" name="codigo" value="' . $i["codigo"] . '">');
                    echo ('<button class="w3-button w3-blue w3-margin" type="submit" name="finalizarOrdem" class="btnEnviar">Finalizar</button>');
                    echo ('</form>');
                    echo ('</td>');
                    echo ("</tr>");
                }
            }
            echo ('</table>');
        }
        ?>

        <?php
        if (isset($_POST['filtrarPeriodo'])) {
            $dataInicio = $_POST['dataInicio'];
            $dataFim = $_POST['dataFim'];
            echo ('<table style="background-color: #6fa1fe; margin-top: 10px; border-radius: 7px; text-align: center; padding: 5px;">');
            echo ('<tr>');
            echo ('<th style="width: 10%;">Código</th>');
            echo ('<th style="width: 10%;">Data de Abertura</th>');
            echo ('<th style="width: 10%;">Nome consumidor</th>');
            echo ('<th style="width: 10%;">CPF consumidor</th>');
            echo ('<th style="width: 10%;">Cod Produto</th>');
            echo ('<th style="width: 10%;">Finalizado</th>');
            echo ('<th style="width: 0px;"></th>');
            echo ('</tr>');

            include_once("listagem.php");

            $filtroData = filtrar_data_ordem($dataInicio, $dataFim);

            if (mysqli_num_rows($filtroData) > 0) {
                while ($i = mysqli_fetch_assoc($filtroData)) {
                    echo ("<tr>");
                    echo ("<td>" . $i["codigo"] . "</td>");
                    echo ("<td>" . $i["data_abertura"] . "</td>");
                    echo ("<td>" . $i["nome_consumidor"] . "</td>");
                    echo ("<td>" . $i["cpf_consumidor"] . "</td>");
                    echo ("<td>" . $i["cod_produto"] . "</td>");
                    if ($i["finalizado"] == "0") {
                        echo ("<td><input type=\"checkbox\" disabled></td>");
                    } else {
                        echo ("<td><input type=\"checkbox\" checked disabled></td>");
                    }
                    echo ("<td>");
                    echo ("<form action=\"endpoints.php\" method=\"POST\">");
                    echo ('<input type="hidden" id="codigo" name="codigo" value="' . $i["codigo"] . '">');
                    echo ('<button class="w3-button w3-blue w3-margin" type="submit" name="finalizarOrdem" class="btnEnviar">Finalizar</button>');
                    echo ('</form>');
                    echo ('</td>');
                    echo ("</tr>");
                }
            }
            echo ('</table>');
        }
        ?>

        <h3><?php echo ($_GET['mensagem'] ?? ""); ?></h1>
    </div>
</body>

</html>