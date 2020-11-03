<?php 

    include('conexao.php');
    $cod_animal = intval($_GET['animal']);

    $sql_code = "DELETE FROM animal WHERE cod_animal = '$cod_animal'";
   
    $sql_query = mysqli_query($conexao, $sql_code);

    if($sql_query)
        echo "
        <script>
        alert('O animal foi deletado com sucesso!')
        location.href='../administrativo-pet'
        </script>";
    else
    echo "
    <script>
        alert('Não foi possível deletar o animal.');
        location.href='../administrativo-pet';
    </script>
    "
?>

<script>location.href='administrativo-pet';</script>