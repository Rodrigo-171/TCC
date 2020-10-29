<?php
session_start();
include_once("conexao.php");

$cod_usu= $_GET['cod_usu'];
$result_usuario = "DELETE FROM usuario WHERE cod_usu = '$cod_usu' ";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
?>