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

    $query = "INSERT INTO `animal` (`nome_animal`, `sexo_animal`, `data_nasc_animal`, `para_que`, `preco_animal`, `cod_raca`, `cod_especie`, `cod_usu`) VALUES ('$nomeAnimal', '$sexo', '$nascimentoAnimal', '$paraQue', $precoAnimal, $raca, $especie, $cod_usu)";

    $result = mysqli_query($conexao, $query);

    if(!$result){
        $_SESSION['animal_nao_cadastrado'] = true;
        header('Location: ../cadastre-seu-pet');
    }else{
        header('Location: ../pets-cadastrado');
    }
