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
    <div class="divCentral" style="height: 700px;">
        <a href="/" style="margin: 20px;">Voltar</a>

        <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Gerenciamento de ordens</h2>
        <form action="endpoints.php" method="POST">
            <label for="data">Data:</label><br>
            <input type="date" id="data" name="data"><br>
            <label for="nome">Nome consumidor: </label><br>
            <input type="text" id="nome" name="nome"><br>
            <label for="numero">CPF consumidor:</label><br>
            <input type="text" id="cpf" name="cpf"><br>
            <label for="produto">Código produto:</label><br>
            <input type="text" id="produto" name="produto"><br>
            <button type="button" class="w3-button w3-blue w3-margin" onclick="document.getElementById('selecionarProduto').style.display='block'">Selecionar Produto</button><br>
            <button type="button" class="w3-button w3-blue w3-margin" onclick="window.location.href = '/ordemvisualizar.php';">Visualizar ordens</button>
            <button type="submit" class="w3-button w3-blue w3-margin" name="cadastrarOrdem" class="btnEnviar">Cadastrar</button>
        </form>

        <div id="selecionarProduto" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('selecionarProduto').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <table style="background-color: #6fa1fe; margin-top: 10px; border-radius: 7px; text-align: center; padding: 5px;">
                        <tr>
                            <th style="width: 33%;">Código</th>
                            <th style="width: 33%;">Descrição</th>
                            <th style="width: 33%;">Ativo</th>
                            <th style="width: 0px;"></th>
                        </tr>
                        <?php
                        include_once("listagem.php");

                        $produtosAtuais = retornar_produtos();

                        if (mysqli_num_rows($produtosAtuais) > 0) {
                            while ($i = mysqli_fetch_assoc($produtosAtuais)) {
                                echo ("<tr>");
                                echo ("<td>" . $i["codigo"] . "</td>");
                                echo ("<td>" . $i["descricao"] . "</td>");
                                if ($i["ativo"] == "0") {
                                    echo ("<td><input type=\"checkbox\" disabled></td>");
                                } else {
                                    echo ("<td><input type=\"checkbox\" checked disabled></td>");
                                }

                                echo ('<td><button onclick="document.getElementById(\'produto\').value = \'' . $i["codigo"] . '\'; document.getElementById(\'selecionarProduto\').style.display=\'none\';">Selecionar</button></td>');
                                echo ("</tr>");

                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                                echo ('</div>');
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <h3><?php echo ($_GET['mensagem'] ?? ""); ?></h1>
    </div>
</body>

</html>