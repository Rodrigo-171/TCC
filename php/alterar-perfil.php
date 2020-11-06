<?php 
    include('conexao.php');
    session_start();
    $user = $_SESSION['user_logado'];
    $cod_usu = $user['cod_usu'];
    
    //Recebendo o post
    #endereco
    $rua = $_POST['rua']; 
    $numero = $_POST['numero']; 
    $bairro = $_POST['bairro']; 
    $cidade = $_POST['cidade']; 
    $estado = $_POST['estado']; 
    $cep = $_POST['cep']; 
    #usuario
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $celular = $_POST['cellphone'];
    
    

    //Alterando os dados
    $result_usuario = "UPDATE usuario SET nome_usu = '$name', email_usu = '$email', celular_usu = '$celular' WHERE cod_usu = '$cod_usu'";                                 
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
    
    $result_endereco = "UPDATE enderecos SET cep = '$cep', numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = 'estado', rua = 'rua' WHERE cod_usu = '$cod_usu'";                                 
    $resultado_endereco = mysqli_query($conexao, $result_endereco);

    $result_final = "SELECT * FROM usuario AS U INNER JOIN enderecos AS E ON U.cod_usu = E.cod_usu";
	$resultado_final = mysqli_query($conexao, $result_final);
					
	$row = mysqli_fetch_assoc($resultado_final);
	$_SESSION['user_logado'] = $row;
    
    header("Location: ../editar-perfil");
?>