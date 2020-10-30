<?php 

    include('conexao.php');
    $cod_usu = intval($_GET['usuario']);

    $sql_code = "DELETE FROM usuario WHERE cod_usu = '$cod_usu'";
   
    $sql_query = mysqli_query($conexao, $sql_code);

    if($sql_query)
        echo "
        <script>
        alert('O usuário foi deletado com sucesso!')
        location.href='../administrativo'
        </script>";
    else
    echo "
    <script>
        alert('Não foi possível deletar o usuário.');
        location.href='../administrativo';
    </script>
    "
?>

<script>location.href='administrativo';</script>