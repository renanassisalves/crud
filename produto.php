<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    
</head>
<body>
    <div class="divCentral" style="height: 700px;">
        <ul style="text-align: left; padding: 0px;">
            <li><a href="/">Voltar</a></li>
        </ul>
    <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Cadastro de produtos</h2>
    <form action="endpoints.php" method="POST">
        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao"><br>
        <label for="ativo">Ativo:</label><br>
        <input type="checkbox" id="ativo" name="ativo"><br>
        <button class="w3-button w3-blue w3-margin" type="submit" name="cadastrarProduto" class="btnEnviar">Cadastrar</button>
    </form>
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
         while($i = mysqli_fetch_assoc($produtosAtuais)) {
            echo("<tr>");
            echo("<td>".$i["codigo"]."</td>");
            echo("<td>".$i["descricao"]."</td>");
            if ($i["ativo"] == "0")
            {
                echo("<td><input type=\"checkbox\" disabled></td>");
            }
            else
            {
                echo("<td><input type=\"checkbox\" checked disabled></td>");
            }
            
            echo('<td><button class="w3-button w3-blue w3-margin" onclick="document.getElementById(\'id'.$i["codigo"].'\').style.display=\'block\'">Alterar</button></td>');
            echo("</tr>");

            echo('<div id="id'.$i["codigo"].'" class="w3-modal">');
            echo('<div class="w3-modal-content">');
            echo('<div class="w3-container">');
            echo('<span onclick="document.getElementById(\'id'.$i["codigo"].'\').style.display=\'none\'" class="w3-button w3-display-topright">&times;</span>');
            echo('<h2>Editando cliente id '.$i["codigo"].'</h2>');
            echo('<form action="endpoints.php" method="POST">');
            echo('<input type="hidden" id="id" name="id" value="'.$i["codigo"].'">');
            echo('<label for="descricao">Descrição:</label><br>');
            echo('<input type="text" id="descricao" name="descricao" value="'.$i["descricao"].'"><br>');
            echo('<label for="ativo">Ativo:</label><br>');
            if ($i["ativo"] == "0")
            {
                echo('<input type="checkbox" id="ativo" name="ativo"><br>');
            }
            else
            {
                echo('<input type="checkbox" id="ativo" name="ativo" checked><br>');
            }
            
            echo('<button class="w3-button w3-blue w3-margin" type="submit" name="editarProduto" class="btnEnviar">Alterar</button>');
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