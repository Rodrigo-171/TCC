<?php
session_start();
#pegar a instância da conexão que foi criada
include('conexao.php');

/*Aqui define os campos obrigatorios para validação, se algum deles estiver vazio pode retornar para o cadastro e falar que são todos obrigatórios*/
// if(empty($_POST['email']) || empty($_POST['password'])) { //nome de todos os campos obrigátorios
//     header('Location: ../cadastro');
//     exit();
// }

#endereco
$rua = mysqli_real_escape_string($conexao, $_POST['rua']); 
$numero = mysqli_real_escape_string($conexao, $_POST['num']); 
$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']); 
$cidade = mysqli_real_escape_string($conexao, $_POST['city']); 
$estado = mysqli_real_escape_string($conexao, $_POST['estado']); 
$cep = mysqli_real_escape_string($conexao, $_POST['cep']); //Substituir pelo POST, tem que tirar os caracteres especiais
$complemento = mysqli_real_escape_string($conexao, $_POST['compl']); 
#usuario
$name = mysqli_real_escape_string($conexao, $_POST['fname']); 
$email = mysqli_real_escape_string($conexao, $_POST['email']); 
$password = mysqli_real_escape_string($conexao, md5($_POST['password'])); 
$sexo = mysqli_real_escape_string($conexao, $_POST['gen']); 
$telefone = mysqli_real_escape_string($conexao, str_replace(['(',')', ' ', '-'], '', $_POST['cellphone']));
$nascimento = mysqli_real_escape_string($conexao, $_POST['birthday']); //Substituir pelo POST, tem que transformar em data americana

$queryEndereco = "INSERT INTO `enderecos` (`rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `complemento`) VALUES ('$rua', '$numero', '$bairro', '$cidade', '$estado', '$cep', '$complemento')";
$resultEndereco = mysqli_query($conexao, $queryEndereco);
if($resultEndereco){
    $query_get_cod_endereco = "SELECT LAST_INSERT_ID() as cod_endereco;";
    $result_get_cod_endereco = mysqli_query($conexao, $query_get_cod_endereco);
    $row_cod_endereco = mysqli_fetch_assoc($result_get_cod_endereco);
    $cod_endereco = $row_cod_endereco['cod_endereco'];
    
    #foto tem que fazer o upload depois pegunta que eu ajuda a fazer.
    $foto = 'fotoPerfil.jpg';
    
    $queryUsuario = "INSERT INTO `usuario` (`cod_tipo_usu`, `nome_usu`, `email_usu`, `senha_usu`, `genero_usu`, `celular_usu`, `nascimento_usu`, `imagem_usu`, `cod_endereco`, `cod_status_usu`) VALUES (2, '$name', '$email', '$password', '$sexo', $telefone, '$nascimento', '$foto', $cod_endereco, 'A')";
    $resultUsuario = mysqli_query($conexao, $queryUsuario);

    if($resultUsuario){
        header('Location: ../login');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
    	header('Location: ../cadastro');
    	exit();
    }
}else{
    $_SESSION['nao_autenticado'] = true;
	header('Location: ../cadastro');
	exit();
}