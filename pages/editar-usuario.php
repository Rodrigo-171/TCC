<?php
  define('HOST', 'mysql.devs4teste.kinghost.net');
  #vai ter o usuário no banco de dados
  // define('USUARIO', 'root');
  define('USUARIO', 'devs4teste01');
  #vai armazenar a senha do banco de dados
  // define('SENHA', '');
  define('SENHA', 'BFF9Yxz2aKq3mZp');
  #vai armazenar a base de dados
  // define('DB', 'BDPET');
  define('DB', 'devs4teste01');
  
  /*essa função vai receber as constantes na ordem. Se ele não conseguir conectar,
  ele vai dar um erro*/
  $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB)or die('Não foi possível conectar');

  $cod_usu = intval($_GET['usuario']);

  $result_usuario = "SELECT * FROM usuario WHERE cod_usu = '$cod_usu'";
  $resultado_usuario = mysqli_query($conexao, $result_usuario);
  $row_usuario = mysqli_fetch_assoc($resultado_usuario);

  $result_endereco = "SELECT * FROM enderecos WHERE cod_endereco = '$cod_usu'";
  $resultado_endereco = mysqli_query($conexao, $result_endereco);
  $row_endereco = mysqli_fetch_assoc($resultado_endereco);

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
				<li><a href="#about">Vendas</a></li>
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

<form method="POST" action="../php/alterar.php" class="form-horizontal">
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
  <input id="cod_usu" name="cod_usu" class="form-control" placeholder="ID" required="" readonly="readonly" type="text" value="<?php echo $row_usuario['cod_usu']?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  
  <div class="col-md-8">
  <input id="Nome" name="fname" placeholder="Nome Completo" class="form-control input-md" required="" type="text" value="<?php echo $row_usuario['nome_usu']?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">CPF <h11>*</h11></label>  
  <div class="col-md-2">
  <input id="cpf" disabled name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$"value="">
  </div>
  
  <label class="col-md-1 control-label" for="Nome">Nascimento<h11>*</h11></label>  
  <div class="col-md-2">
  <input id="dtnasc" name="dtnasc" disabled placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()" value="<?php echo $row_usuario['nascimento_usu']?>">
 </div>

 <!-- Multiple Radios (inline) -->

  <label class="col-md-1 control-label" for="radios">Sexo <h11>*</h11></label>

  <?php if($row_usuario['genero_usu'] == 'M'):?>
    <div class="col-md-4"> 
      <label class="radio-inline" for="radios-1">
        <input name="gen" id="sexo" value="M" type="radio" checked disabled>
        Masculino
      </label>
      <label required="" class="radio-inline" for="radios-0" >
        <input name="gen" id="sexo" value="F" type="radio" disabled>
        Feminino
      </label> 
    </div>
  <?php else:?>

    <div class="col-md-4"> 
      <label class="radio-inline" for="radios-1">
        <input name="gen" id="sexo" value="M" type="radio">
        Masculino
      </label>
      <label required="" class="radio-inline" for="radios-0" >
        <input name="gen" id="sexo" value="F" type="radio" checked>
        Feminino
      </label> 
    </div>

  <?php endif;?>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Celular <h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
      <input id="prependedtext" name="celular" class="form-control" placeholder="XXXXXXXXXXX" type="text" maxlength="13"
      OnKeyPress="formatar('## #####-####', this)" value="<?php echo $row_usuario['celular_usu']?>"disabled>
    </div>
  </div>
 </div> 

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
  <div class="col-md-5">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="prependedtext" name="email" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $row_usuario['email_usu']?>">
    </div>
  </div>
</div>


<!-- Search input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="CEP">CEP <h11>*</h11></label>
  <div class="col-md-2">
    <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" type="search" maxlength="8" pattern="[0-9]+$" value="<?php echo $row_endereco['cep']?>">
  </div>
  <div class="col-md-2">
      <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
    </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Endereço</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Rua</span>
      <input id="rua" name="rua" class="form-control" placeholder="" required="" readonly="readonly" type="text" value="<?php echo $row_endereco['rua']?>">
    </div>
    
  </div>
    <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Nº <h11>*</h11></span>
      <input id="numero" name="num" class="form-control" placeholder="" required=""  type="text" value="<?php echo $row_endereco['numero']?>">
    </div>
    
  </div>
  
  <div class="col-md-3">
    <div class="input-group">
      <span class="input-group-addon">Bairro</span>
      <input id="bairro" name="bairro" class="form-control" placeholder="" required="" readonly="readonly" type="text" value="<?php echo $row_endereco['bairro']?>">
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Cidade</span>
      <input id="cidade" name="city" class="form-control" placeholder="" required=""  readonly="readonly" type="text" value="<?php echo $row_endereco['cidade']?>">
    </div>
    
  </div>
  
   <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Estado</span>
      <input id="estado" name="estado" class="form-control" placeholder="" required=""  readonly="readonly" type="text" value="<?php echo $row_endereco['estado']?>">
    </div>
    
  </div>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Complemento</span>
      <input id="complemento" name="complemento" class="form-control" placeholder="" required=""  type="text" value="<?php echo $row_endereco['complemento']?>">
    </div>
    
  </div>
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
    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
            document.getElementById('cep').value=("");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    }

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i);
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
 
function idade (){
    var data=document.getElementById("dtnasc").value;
    var dia=data.substr(0, 2);
    var mes=data.substr(3, 2);
    var ano=data.substr(6, 4);
    var d = new Date();
    var ano_atual = d.getFullYear(),
        mes_atual = d.getMonth() + 1,
        dia_atual = d.getDate();
        
        ano=+ano,
        mes=+mes,
        dia=+dia;
        
    var idade=ano_atual-ano;
    
    if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
        idade--;
    }
return idade;
} 
  
  
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


