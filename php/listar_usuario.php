<?php
include("conexao.php");

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio da visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar banco
$result_usuario = "SELECT * FROM usuario ORDER BY cod_usu DESC LIMIT $inicio, $qnt_result_pg";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

?>


<?php
//Verificar se encontrou resultado na tabela usuario
if(($resultado_usuario) AND ($resultado_usuario->num_rows !=0)){
    ?>
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>CPF</th>
                <th>Nivel de acesso</th>
                <th>ações</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
        ?>
        <tr>
            <th><?php echo $row_usuario['cod_usu'];?></th>
            <td><?php echo $row_usuario['nome_usu'];?></td>
            <td><?php echo $row_usuario['email_usu'];?></td>
            <td><?php echo $row_usuario['celular_usu'];?></td>
            <td><?php echo $row_usuario['cpf'];?></td>
            <td><?php echo $row_usuario['cod_tipo_usu'];?></td>
            <td>
				<a href="pages/editar-usuario.php?p=editar&usuario=<?php echo $row_usuario['cod_usu'];?>" class="btn btn-xs btn-warning">Editar</a>
				<a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $row_usuario['nome_usu'];?>?'))
				location.href='php/deletar.php?p=deletar&usuario=<?php echo $row_usuario['cod_usu'];?>';" type="button" class="btn btn-xs btn-danger">Apagar</a>
			</td>
        </tr>
        <?php
    }?>
        </tbody>
    </table>
<?php
//Paginação - somara quantidade de usuarios
$result_pg = "SELECT COUNT(cod_usu) AS num_result FROM usuario";
$resultafo_pg = mysqli_query($conexao, $result_pg);
$row_pg = mysqli_fetch_assoc($resultafo_pg);

//Quantidade de pagina
$quantidade_pg= ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os links antes e depois
$max_links = 5;

echo '<nav aria-label="paginacao">';
    echo '<ul class="pagination">';
        echo '<li class="page-item">';
            echo "<a href='#' onclick='listar_usuario(1, $qnt_result_pg)'>Primeira </a>";
        echo '</li>';
        echo '<li class="page-item">';
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1){
                    echo "<a href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg)'>$pag_ant </a>";
                }
            }
        echo '</li>';
        echo '<li class="page-item active">';
            echo '<span class="page-link">';
                echo "$pagina ";
            echo '</span>';
        echo '</li>';
        echo '<li class="page-item">'; 
            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <=$quantidade_pg){
                    echo "<a href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg)'>$pag_dep </a>";
                }
            }
        echo '</li>';
        echo '<li class="page-item">';
            echo "<a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg)'>Última </a>";
        echo '</li>';
    echo '</ul>';
echo '</nav>';

}else{
    echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
?>
    