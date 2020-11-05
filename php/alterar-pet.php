<?php 
    include('conexao.php');
    
    //Recebendo o post
    #endereco
    $rua = $_POST['rua']; 
    $numero = $_POST['num']; 
    $bairro = $_POST['bairro']; 
    $cidade = $_POST['city']; 
    $estado = $_POST['estado']; 
    $cep = $_POST['cep']; 
    $complemento = $_POST['complemento'];
    #usuario
    $cod_usu = $_POST['cod_usu'];
    $name = $_POST['fname'];
    $email = $_POST['email'];
    
    

    //Alterando os dados
    $result_usuario = "UPDATE usuario SET nome_usu = '$name', email_usu = '$email' WHERE cod_usu = '$cod_usu'";                                 
    $resultado_usuario = mysqli_query($conexao, $result_usuario);

    $result_endereco = "UPDATE enderecos SET cep = '$cep', numero = '$numero' WHERE cod_usu = '$cod_usu'";                                 
    $resultado_endereco = mysqli_query($conexao, $result_endereco);
    
    header("Location: ../administrativo");
?>