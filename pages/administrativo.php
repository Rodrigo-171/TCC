<?php
include_once("php/conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Cesar Szpak - Celke">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Administrativo - Celke</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Dashboard</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="administrativo">Usuários</a></li>
					<li><a href="#about">Doações</a></li>
					<li><a href="php/deslogar.php">Sair</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>
	
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Usuários</h1>
		</div>

		<?php 

			//Receber o numero da pagina
			$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

			//Setar a quantidade de itens por pagina
			$qnt_result_pg = 15;

			//calcular o inicio visualização
			$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

			//Listar usuarios
			$result_usuarios = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pg";
			$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
			$row_usuario = mysqli_fetch_assoc($resultado_usuarios);

			//Definindo o sexo
			$sexo['M'] = "Masculino";
			$sexo['F'] = "Feminino";

			//Definindo Cod_tipo_usu
			$cod_tipo_usu[1] = "Administrator";
			$cod_tipo_usu[2] = "Básico";
		?>

		
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Nivel de acesso</th>
							<th>Celular</th>
							<th>Sexo</th>
							<th>Nascimento</th>
							<th>Ações</th>
						</tr>
					</thead>

					<tbody>
					<?php
						do{
					?>
						<tr>
							<td><?php echo $row_usuario['cod_usu'] ?></td>
							<td><?php echo $row_usuario['nome_usu'] ?></td>
							<td><?php echo $row_usuario['email_usu'] ?></td>
							<td><?php echo $cod_tipo_usu[$row_usuario['cod_tipo_usu']] ?></td>
							<td><?php echo $row_usuario['celular_usu'] ?></td>
							<td><?php echo $sexo[$row_usuario['genero_usu']] ?></td>
							<td><?php echo $row_usuario['nascimento_usu'] ?></td>
							
							<td>
								<a href="pages/editar-usuario.php?p=editar&usuario=<?php echo $row_usuario['cod_usu'];?>" type="button" class="btn btn-xs btn-warning">Editar</a>
								<a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $row_usuario['nome_usu'];?>?'))
								location.href='php/deletar.php?p=deletar&usuario=<?php echo $row_usuario['cod_usu'];?>';" type="button" class="btn btn-xs btn-danger">Apagar</a>
							</td>
						</tr>
						<?php }while($row_usuario = mysqli_fetch_assoc($resultado_usuarios));?>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

