<?php
session_start();
#pegar a instância da conexão que foi criada
include('conexao.php');

$especie = mysqli_real_escape_string($conexao, $_POST['especie']); 
$sexo = mysqli_real_escape_string($conexao, $_POST['sexo']); 
$raca = mysqli_real_escape_string($conexao, $_POST['raca']); 
$nomeAnimal = mysqli_real_escape_string($conexao, $_POST['nome']); 
$nascimentoAnimal = mysqli_real_escape_string($conexao, $_POST['especie']); 
$precoAnimal= mysqli_real_escape_string($conexao, $_POST['precoAnimal']);

$queryAnimal = "INSERT INTO `animal` (`sexo_animal`, `nome_animal`, `ano_nasc_animal`, `preco_animal`) VALUES ('$sexo', '$nomeAnimal', '$nascimentoAnimal', '$precoAnimal')";
$resultAnimal = mysqli_query($conexao, $queryAnimal);

$queryEspecie = "INSERT INTO `animal` (`especie`, `cod_status_especie`) VALUES ('$especie', 'E')";
$resultEspecie = mysqli_query($conexao, $queryEspecie);

$queryEspecie = "INSERT INTO `animal` (`raca`, `cod_status_raca`, `cod_especie`) VALUES ('$raca', 'R', '$cod_especie')";
$resultEspecie = mysqli_query($conexao, $queryEspecie);

if($resultAnimal){
    $query_get_cod_animal = "SELECT LAST_INSERT_ID() as cod_animal;";
    $result_get_cod_animal = mysqli_query($conexao, $query_get_cod_animal);
    $row_cod_animal = mysqli_fetch_assoc($result_get_cod_animal);
    $cod_animal = $row_cod_animal['cod_animal'];


if($resultEspecie){
    $query_get_cod_especie = "SELECT LAST_INSERT_ID() as cod_especie;";
    $result_get_cod_especie = mysqli_query($conexao, $query_get_cod_especie);
    $row_cod_especie = mysqli_fetch_assoc($result_get_cod_especie);
    $cod_especie = $row_cod_especie['cod_especie'];
?>

