<?php
include("conexao.php");

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio da visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar banco
$result_pet = "SELECT nome_raca AS raca,
cod_animal, nome_animal, sexo_animal, data_nasc_animal, preco_animal, cod_status_animal AS animal,
nome_especie AS especie
FROM animal AS A
INNER JOIN raca AS R
ON A.cod_raca = R.cod_raca
INNER JOIN especie AS E
ON R.cod_especie = E.cod_especie
LIMIT $inicio, $qnt_result_pg";
$resultado_pet = mysqli_query($conexao, $result_pet);


?>


<?php
//Verificar se encontrou resultado na tabela usuario
if(($resultado_pet) AND ($resultado_pet->num_rows !=0)){
    ?>
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Sexo</th>
                <th>Raça</th>
                <th>Nascimento</th>
                <th>Para</th>
                <th>Preço</th>
                <th>ações</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row_pet = mysqli_fetch_assoc($resultado_pet)){
        ?>
        <tr>
            <th><?php echo $row_pet['cod_animal'];?></th>
            <td><?php echo $row_pet['nome_animal'];?></td>
            <td><?php echo $row_pet['especie'];?></td>
            <td><?php echo $row_pet['sexo_animal'];?></td>
            <td><?php echo $row_pet['raca'];?></td>
            <td><?php echo $row_pet['data_nasc_animal'];?></td>
            <td><?php echo $row_pet['animal'];?></td>
            <td><?php echo $row_pet['preco_animal'];?></td>
            <td>
				<a href="pages/editar-pet.php?p=editar&animal=<?php echo $row_pet['cod_animal'];?>" class="btn btn-xs btn-warning">Editar</a>
				<a href="javascript: if(confirm('Tem certeza que deseja deletar o animal <?php echo $row_pet['nome_animal'];?>?'))
				location.href='php/deletar-pet.php?p=deletar&animal=<?php echo $row_pet['cod_animal'];?>';" type="button" class="btn btn-xs btn-danger">Apagar</a>
			</td>
        </tr>
        <?php
    }?>
        </tbody>
    </table>
<?php
//Paginação - somara quantidade de usuarios
$result_pg = "SELECT COUNT(cod_animal) AS num_result FROM animal";
$resultado_pg = mysqli_query($conexao, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de pagina
$quantidade_pg= ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os links antes e depois
$max_links = 2;

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
    echo "<div class='alert alert-danger' role='alert'>Nenhum animal encontrado!</div>";
}
?>
    