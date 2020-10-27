<?php

    #pegar a instância da conexão que foi criada
    include('conexao.php');

    $especie = mysqli_real_escape_string($conexao, $_POST['especie']);

    $query = "SELECT * FROM `raca` where cod_especie in (0, $especie)";

    $result = mysqli_query($conexao, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if($result){
        echo json_encode(['success' => true, 'data' => $data]);
    }else{
        echo json_encode(['success' => false, 'msg' => 'Ocorreu um erro inexperado']);
    }
