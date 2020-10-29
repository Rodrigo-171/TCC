<?php
session_start();
#pegar a instância da conexão que foi criada
include('conexao.php');

/*Se o campo estiver vindo por post usuário for vazio, ou o campo que estiver vindo por post
chamado senha também for vazio,irá redirecionar de volta para o inicio*/
if(empty($_POST['fname']) || empty($_POST['lname'])) {
    header('Location: ../login');
    exit();
}

$nome_usu = mysqli_real_escape_string($conexao, $_POST['fname']);
$senha_usu = mysqli_real_escape_string($conexao, $_POST['lname']);

#md5 função do mysql
#query vai verificar no mysql se o login está correto ou não
$query = "select * from usuario inner join enderecos on enderecos.cod_endereco = usuario.cod_endereco where email_usu = '$nome_usu' and senha_usu = md5('$senha_usu')";

$result = mysqli_query($conexao, $query);

$row = mysqli_fetch_assoc($result);

$cod_tipo_usu = $row['cod_tipo_usu'];

if($row){
    $_SESSION['user_logado'] = $row;
        if($cod_tipo_usu == 1){
            header('Location: ../administrativo');
        }else{
            header('Location: ../perfil-pessoa');
        }
    exit();
}else{
    $_SESSION['nao_autenticado'] = true;
	header('Location: ../login');
	exit();
}