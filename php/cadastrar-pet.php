<?php

    #pegar a instância da conexão que foi criada
    include('conexao.php');
    session_start(); // inicia a variavel $_SESSION
    $user = $_SESSION['user_logado'];
    $preco = str_replace(',', '.', $_POST['precoAnimal']);
    if($preco == ''){
        $preco = 'NULL';
    }

    $especie = mysqli_real_escape_string($conexao, $_POST['especie']);
    $nomeAnimal = mysqli_real_escape_string($conexao, $_POST['nomeAnimal']);
    $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);
    $nascimentoAnimal = mysqli_real_escape_string($conexao, $_POST['nascimentoAnimal']);
    $paraQue = mysqli_real_escape_string($conexao, $_POST['paraQue']);
    $precoAnimal = mysqli_real_escape_string($conexao, $preco);
    $raca = mysqli_real_escape_string($conexao, $_POST['raca']);
    $cod_usu = $user['cod_usu'];

    $query_especie = "INSERT INTO `especie` (`nome_especie`, `cod_status_especie`) VALUES ('$especie', 'E')";
    $result_especie = mysqli_query($conexao, $query_especie);
    
    if($result_especie){
        $query_get_cod_especie = "SELECT LAST_INSERT_ID() as cod_especie;";
        $result_get_cod_especie = mysqli_query($conexao, $query_get_cod_especie);
        $row_cod_especie = mysqli_fetch_assoc($result_get_cod_especie);
        $cod_especie = $row_cod_especie['cod_especie'];
    
        $query_raca = "INSERT INTO `raca` (`nome_raca`, `cod_especie`, `cod_status_raca`) VALUES ('$raca', '$cod_especie', 'R')";
        $result_raca = mysqli_query($conexao, $query_raca);
        if($result_raca){
            $query_get_cod_raca = "SELECT LAST_INSERT_ID() as cod_raca;";
            $result_get_cod_raca = mysqli_query($conexao, $query_get_cod_raca);
            $row_cod_raca = mysqli_fetch_assoc($result_get_cod_raca);
            $cod_raca = $row_cod_especie['cod_raca'];

            $query_animal = "INSERT INTO `animal` (`nome_animal`, `sexo_animal`, `data_nasc_animal`, `para_que`, `preco_animal`, `cod_raca`, `cod_especie`, `cod_usu`) VALUES ('$nomeAnimal', '$sexo', '$nascimentoAnimal', '$paraQue', $precoAnimal, $cod_raca, $cod_especie, $cod_usu)";
            $result = mysqli_query($conexao, $query_animal);
        }
    

    if(!$result){
        $_SESSION['animal_nao_cadastrado'] = true;
        header('Location: ../cadastre-seu-pet');
    }else{
        header('Location: ../pets-cadastrado');
    }
