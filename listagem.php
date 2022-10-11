<?php

function retornar_clientes()
{
    include_once("database.php");
    $final = mysqli_query($db, "select * from clientes");
    return $final;
}

?>