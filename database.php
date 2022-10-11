<?php
$user = "root";
$pass = "";
$db = "Telecontrol";

$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

if ($db->connect_error) {
    die("Erro ao efetuar conexão ao banco: " . $db->connect_error);
  } else{
    $db->query("use Telecontrol;");
}
  
?>