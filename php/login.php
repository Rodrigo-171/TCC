<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset=UTF-8>
    <meta name=author content="">
    <meta name=description content="">
    <meta name=keywords content="">
    <meta name=viewport content="width=device-width, initial-scale=1.0">

    <link rel=stylesheet href="css/normalize.css">
    <link rel=stylesheet href="css/default.css">

    <link rel=stylesheet media="screen and (max-width:480px)" href="css/estilo-480px.css">
    <link rel=stylesheet media="screen and (min-width: 481px) and (max-width:839px) " href="css/estilo-839px.css">
    <link rel=stylesheet media="screen and (min-width: 840px) and (max-width:1024px) " href="css/estilo-1024px.css">
    <link rel=stylesheet media="screen and (min-width: 1025px)" href="css/estilo-1025px.css">
</head>
<body>
    <header class="header-login">
        <h1 class="h1-login">NetworkPet's</h1>
    </header>

    <div>
        <form class="form-login"action="action_page.php" method="POST">
            <input class="inp-login" type="text" id="fname" name="fname" placeholder="E-mail" ><br><br>
            <input class="inp-login" type="text" id="lname" name="lname" placeholder="Senha" ><br><br>
            <input class="entrar" type="submit" value="Entrar">
          </form> 
    </div>

    <?php
    if(isset($_SESSION['nao_autenticado'])):
    ?>
    <div class="notification is-danger">
      <p>ERRO: Usuário ou senha inválidos.</p>
    </div>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <div class="div-imagem">
        <img class="logo" src="imagens/LOGO/logo_branca.gif">
    </div>

    <footer class="footer-login">
        <a class="link-cadastrase" href="link">Cadastra-se no NetworkPet's</a><br>
        <a class="link-esq-senha"href="link">Esqueceu a senha?</a>
    </footer>
</body>
</html>