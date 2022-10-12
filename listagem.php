<?php

function retornar_cliente($id_cliente)
{
    include_once("database.php");
    $final = mysqli_query($db, "select * from clientes where clientes.codigo = ".$id_cliente);
    return $final;
}

function retornar_clientes()
{
    include_once("database.php");
    $final = mysqli_query($db, "select * from clientes");
    return $final;
}

function retornar_produtos()
{
    include_once("database.php");
    $final = mysqli_query($db, "select * from produtos");
    return $final;
}

function filtrar_numero_ordem($numero_ordem)
{
    include_once("database.php");
    $final = mysqli_query($db, "select * from ordem where ordem.codigo = ".$numero_ordem);
    return $final;
}

function filtrar_nome_ordem($nome_cliente)
{
    include_once("database.php");
    $final = mysqli_query($db, 'select * from ordem where ordem.nome_consumidor = "'.$nome_cliente.'"');
    return $final;
}

function filtrar_data_ordem($data_inicial, $data_final)
{
    include_once("database.php");
    $final = mysqli_query($db, 'select * from ordem where ordem.data_abertura between "'.$data_inicial.'" and "'.$data_final.'" ');
    return $final;
}


?>