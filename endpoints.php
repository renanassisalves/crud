<?php

include_once("database.php");


if (isset($_POST['cadastrarCliente'])) {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];

    if (($cpf != "") && ($nome != "") && ($endereco != "") && ($numero != "")) {
        if ($db->query('insert into clientes(cpf, nome, endereco, numero) values("' . $cpf . '","' . $nome . '","' . $endereco . '","' . $numero . '");') === TRUE) {
            header('location:cliente.php?mensagem=Cadastrado com sucesso!');
        } else {
            header('location:cliente.php?mensagem=Erro ao realizar o cadastro, tente novamente');
        }
    } else {
        header('location:cliente.php?mensagem=Verifique se todos os campos estão preenchidos');
    }
}

if (isset($_POST['editarCliente'])) {
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];

    if (($cpf != "") && ($nome != "") && ($endereco != "") && ($numero != "")) {
        if ($db->query('update clientes set cpf = "' . $cpf . '", nome = "' . $nome . '", endereco = "' . $endereco . '", numero = "' . $numero . '" WHERE codigo = "' . $id . '";') === TRUE) {
            header('location:cliente.php?mensagem=Alterado com sucesso!');
        } else {
            header('location:cliente.php?mensagem=Erro ao atualizar o cadastro, tente novamente');
        }
    } else {
        header('location:cliente.php?mensagem=Verifique se todos os campos foram preenchidos' . $id . $cpf . $nome . $endereco . $numero);
    }
}

if (isset($_POST['cadastrarProduto'])) {
    $descricao = $_POST['descricao'];
    $ativo = $_POST['ativo'];

    if ($ativo == "on") {
        $ativo = "True";
    } else {
        $ativo = "False";
    }

    if (($descricao != "")) {
        if ($db->query('insert into produtos(descricao, ativo) values("' . $descricao . '",' . $ativo . ');') === TRUE) {
            header('location:produto.php?mensagem=Cadastrado com sucesso!');
        } else {
            header('location:produto.php?mensagem=Erro ao realizar o cadastro, tente novamente');
        }
    } else {
        header('location:produto.php?mensagem=Verifique se todos os campos estão preenchidos');
    }
}

if (isset($_POST['editarProduto'])) {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $ativo = $_POST['ativo'];

    if ($ativo == "on") {
        $ativo = "True";
    } else {
        $ativo = "False";
    }

    if (($descricao != "") && ($ativo != "")) {
        if ($db->query('update produtos set descricao = "' . $descricao . '", ativo = ' . $ativo . ' WHERE codigo = "' . $id . '";') === TRUE) {
            header('location:produto.php?mensagem=Alterado com sucesso!');
        } else {
            header('location:produto.php?mensagem=Erro ao atualizar o cadastro, tente novamente');
        }
    } else {
        header('location:produto.php?mensagem=Verifique se todos os campos foram preenchidos' . $id . $cpf . $nome . $endereco . $numero);
    }
}

if (isset($_POST['cadastrarOrdem'])) {
    $data = $_POST['data'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $produto = $_POST['produto'];

    if (($data != "") && ($nome != "") && ($cpf != "") && ($produto != "")) {
        if ($db->query('insert into ordem(data_abertura, nome_consumidor, cpf_consumidor, cod_produto, finalizado) values("' . $data . '","' . $nome . '","' . $cpf . '",' . $produto . ', false);') === TRUE) {
            header('location:ordem.php?mensagem=Cadastrado com sucesso!');
        } else {
            header('location:ordem.php?mensagem=Erro ao realizar o cadastro, tente novamente');
        }
    } else {
        header('location:ordem.php?mensagem=Verifique se todos os campos estão preenchidos');
    }
}

if (isset($_POST['finalizarOrdem'])) {
    $codigo = $_POST['codigo'];

    if (($codigo != "")) {
        if ($db->query('update ordem set finalizado = true where ordem.codigo =' . $codigo) === TRUE) {
            header('location:ordemvisualizar.php?mensagem=Ordem finalizada com sucesso!');
        } else {
            header('location:ordemvisualizar.php?mensagem=Erro ao finalizar ordem, tente novamente');
        }
    } else {
        header('location:ordemvisualizar.php?mensagem=Verifique se todos os campos estão preenchidos');
    }
}
