<?php

include_once("database.php");


if(isset($_POST['cadastrarCliente']))
{
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    
    if (($cpf != "") && ($nome != "") && ($endereco != "") && ($numero != ""))
    {
        if($db->query('insert into clientes(cpf, nome, endereco, numero) values("'.$cpf.'","'.$nome.'","'.$endereco.'","'.$numero.'");') === TRUE)
        {
            header('location:cliente.php?mensagem=Cadastrado com sucesso!');
        }
        else
        {
            header('location:cliente.php?mensagem=Erro ao realizar o cadastro, tente novamente');
        }
    }
    else
    {
        header('location:cliente.php?mensagem=Verifique se todos os campos estão preenchidos');
    }
}

if(isset($_POST['editarCliente']))
{   
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    
    if (($cpf != "") && ($nome != "") && ($endereco != "") && ($numero != ""))
    {
        if($db->query('update clientes set cpf = "'.$cpf.'", nome = "'.$nome.'", endereco = "'.$endereco.'", numero = "'.$numero.'" WHERE codigo = "'.$id.'";') === TRUE)
        {
            header('location:cliente.php?mensagem=Alterado com sucesso!');
        }
        else
        {
            header('location:cliente.php?mensagem=Erro ao atualizar o cadastro, tente novamente');
        }
    }
    else
    {
        header('location:cliente.php?mensagem=Verifique se todos os campos foram preenchidos'.$id.$cpf.$nome.$endereco.$numero);
    }
}
?>