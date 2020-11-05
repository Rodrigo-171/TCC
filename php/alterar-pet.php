<?php 
    include('conexao.php');
    
    //Recebendo o post
    $cod_animal = $_POST['cod_animal'];
    $name = $_POST['fname'];

    //Alterando os dados
    $result_animal = "UPDATE animal SET nome_animal = '$name' WHERE cod_animal = '$cod_animal'";                                 
    $resultado_animal = mysqli_query($conexao, $result_animal);
    header("Location: ../administrativo-pet");
?>