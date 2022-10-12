<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    
</head>
<body>
    <div class="divCentral" style="height: 700px;">
        <ul style="text-align: left; padding: 0px;">
            <li><a href="/">Voltar</a></li>
        </ul>
    <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Cadastro de clientes</h2>
    <form action="endpoints.php" method="POST">
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="endereco">Endereço: </label><br>
        <input type="text" id="endereco" name="endereco"><br>
        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero"><br>
        <button class="w3-button w3-blue w3-margin" type="submit" name="cadastrarCliente" class="btnEnviar">Cadastrar</button>
    </form>
    <table style="background-color: #6fa1fe; margin-top: 10px; border-radius: 7px; text-align: center; padding: 5px;">
  <tr>
    <th style="width: 18%;">Código</th>
    <th style="width: 18%;">CPF</th>
    <th style="width: 18%;">Nome</th>
    <th style="width: 18%;">Endereço</th>
    <th style="width: 18%;">Número</th>
    <th style="width: 0px;"></th>
  </tr>
    <?php 
    include_once("listagem.php");
    
    $clientesAtuais = retornar_clientes();

    if (mysqli_num_rows($clientesAtuais) > 0) {
         while($i = mysqli_fetch_assoc($clientesAtuais)) {
            echo("<tr>");
            echo("<td>".$i["codigo"]."</td>");
            echo("<td>".$i["cpf"]."</td>");
            echo("<td>".$i["nome"]."</td>");
            echo("<td>".$i["endereco"]."</td>");
            echo("<td>".$i["numero"]."</td>");
            echo('<td><button class="w3-button w3-blue w3-margin" onclick="document.getElementById(\'id'.$i["codigo"].'\').style.display=\'block\'">Alterar</button></td>');
            echo("</tr>");

            echo('<div id="id'.$i["codigo"].'" class="w3-modal">');
            echo('<div class="w3-modal-content">');
            echo('<div class="w3-container">');
            echo('<span onclick="document.getElementById(\'id'.$i["codigo"].'\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span>');

            echo('<h2>Editando cliente id '.$i["codigo"].'</h2>');
            echo('<form action="endpoints.php" method="POST">');
            echo('<input type="hidden" id="id" name="id" value="'.$i["codigo"].'">');
            echo('<label for="cpf">CPF: *não pode ser alterado</label><br>');
            echo('<input type="text" id="cpf" name="cpf" readonly="readonly" value="'.$i["cpf"].'"><br>');
            echo('<label for="nome">Nome:</label><br>');
            echo('<input type="text" id="nome" name="nome" value="'.$i["nome"].'"><br>');
            echo('<label for="endereco">Endereço: </label><br>');
            echo('<input type="text" id="endereco" name="endereco" value="'.$i["endereco"].'"><br>');
            echo('<label for="numero">Número:</label><br>');
            echo('<input type="text" id="numero" name="numero" value="'.$i["numero"].'"><br>');
            echo('<button class="w3-button w3-blue w3-margin" type="submit" name="editarCliente" class="btnEnviar">Alterar</button>');
            echo('</form>');

            echo('</div>');
            echo('</div>');
            echo('</div>');
            echo('</div>');
         }
        }
    ?>
    </table>
    <h3><?php echo($_GET['mensagem'] ?? ""); ?></h1>
    </div>
</body>
</html>