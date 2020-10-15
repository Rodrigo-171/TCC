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

?>

