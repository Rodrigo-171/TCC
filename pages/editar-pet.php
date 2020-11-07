<?php
  include('../php/conexao.php');
  //include("php/protect.php");
  //protect();
  $cod_animal = intval($_GET['animal']);

  $result_pet = "SELECT nome_raca AS raca,
  cod_animal, nome_animal, sexo_animal, data_nasc_animal, preco_animal, cod_status_animal AS animal,
  nome_especie AS especie
  FROM animal AS A
  INNER JOIN raca AS R
  ON A.cod_raca = R.cod_raca
  INNER JOIN especie AS E
  ON R.cod_especie = E.cod_especie
  WHERE cod_animal = '$cod_animal'";
  $resultado_pet = mysqli_query($conexao, $result_pet);
  $row_pet = mysqli_fetch_assoc($resultado_pet);

?>



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
				<li><a href="../administrativo">Usuários</a></li>
				<li><a href="../administrativo-pet">Animais</a></li>
				<li><a href="../php/deslogar.php">Sair</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<!--------------------------------------------------------------------------------------------->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form method="POST" action="../php/alterar-pet.php" class="form-horizontal">
<fieldset>
<div class="panel panel-primary">
    
    
    <div class="panel-body">
<div class="form-group">

<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">ID<h11>*</h11></label>  
  <div class="col-md-8">
  <input id="cod_animal" name="cod_animal" class="form-control" placeholder="ID" required="" readonly="readonly" type="text" value="<?php echo $row_pet['cod_animal']?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  
  <div class="col-md-8">
  <input id="Nome" name="fname" placeholder="Nome Completo" class="form-control input-md" required="" type="text" value="<?php echo $row_pet['nome_animal']?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Especie <h11>*</h11></label>  
  <div class="col-md-2">
  <input id="especie"  name="especie" class="form-control input-md" required="" readonly="readonly" type="text" value="<?php echo $row_pet['especie']?>">
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>  
  <div class="col-md-2">
  <input id="dtnasc" name="dtnasc" disabled placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" value="<?php echo $row_pet['data_nasc_animal']?>">
 </div>

 <!-- Multiple Radios (inline) -->

  <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>

  <?php if($row_pet['sexo_animal'] == 'M'):?>
    <div class="col-md-4"> 
      <label class="radio-inline" for="radios-1">
        <input name="gen" id="sexo" value="M" type="radio" checked disabled>
        Macho
      </label>
      <label required="" class="radio-inline" for="radios-0" >
        <input name="gen" id="sexo" value="F" type="radio" disabled>
        Femêa
      </label> 
    </div>
  <?php else:?>

    <div class="col-md-4"> 
      <label class="radio-inline" for="radios-1">
        <input name="gen" id="sexo" value="M" type="radio">
        Macho
      </label>
      <label required="" class="radio-inline" for="radios-0" >
        <input name="gen" id="sexo" value="F" type="radio" checked>
        Femêa
      </label> 
    </div>

  <?php endif;?>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Raça <h11>*</h11></label>
  <div class="col-md-2">
    <input id="raca" name="raca" class="form-control input-md" required="" readonly="readonly" type="text" value="<?php echo $row_pet['raca']?>"> 
  </div>
 

  <!-- Prepended text-->
  <div class="form-group">
    <label class="col-md-2 control-label" for="prependedtext">Preço<h11>*</h11></label>
    <div class="col-md-5">
      <div class="input-group">
      <input id="preco" name="preco" class="form-control input-md" readonly="readonly" required="" type="text" value="<?php echo $row_pet['preco_animal']?>"> 
      </div>
    </div>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Salvar" name="Salvar" class="btn btn-success" type="Submit">Salvar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>
</div>

</div>
</div>


</fieldset>
</form>














<script>
  
function exibe(i) {
    
   
        
	document.getElementById(i).readOnly= true;
	    
		
	
    
}

function desabilita(i){
    
     document.getElementById(i).disabled = true;    
    }
function habilita(i)
    {
        document.getElementById(i).disabled = false;
    }


function showhide()
 {
       var div = document.getElementById("newpost");
       
       if(idade()>=18){
 
    div.style.display = "none";
}
else if(idade()<18) {
    div.style.display = "inline";
}

 }
</script>


