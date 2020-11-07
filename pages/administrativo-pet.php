<?php
include_once("php/conexao.php");
//include("php/protect.php");
//protect();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>

	</head>

	<body role="document">

		<!-- MENU RESPONSIVO -->

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">NetworkPet</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="administrativo">Usuários</a></li>
						<li><a href="administrativo-pet">Animais</a></li>
						<li><a href="php/deslogar.php">Sair</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
    	</nav>

		<div class="container mt-3">
			<h2>Animais</h2>
			<span id="conteudo"></span>
		</div>
		<script>
			var qnt_result_pg = 50; //quantidade de registro por página
			var pagina = 1; //pagina inicial
			$(document).ready(function () {
				listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});

			function listar_usuario(pagina, qnt_result_pg){
				var dados = {
					pagina : pagina,
					qnt_result_pg : qnt_result_pg
				}
				$.post('php/listar_pet.php', dados ,function(retorna){
					//Substitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}
		</script>

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

