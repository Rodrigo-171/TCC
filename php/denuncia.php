<?php
    include_once("php/conexao.php");
    //recebendo post
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']); 

    $queryDenuncia = 'INSERT INTO `denuncia` (`cod_denuncia`, `desc_denuncia`, `cod_usu_denuncia`, `cod_usu_denunciado`, `data_hora_denuncia`, `cod_status_denuncia`) VALUES (?, ?, ?, '$descricao', )';
?>