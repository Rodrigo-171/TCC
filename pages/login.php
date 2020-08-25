<?php 
    if(isset($_SESSION['user_logado'])){
        header('Location: home');
    }
?>
<div class="body-x">
<header class="header-login">
    <h1 class="h1-login">NetworkPet's</h1>
</header>

<div>
    <form class="form-login"action="./php/action_page.php" method="POST">
        <input class="inp-login" type="text" id="fname" name="fname" placeholder="E-mail" ><br><br>
        <input class="inp-login" type="password" id="lname" name="lname" placeholder="Senha" ><br><br>
        <input class="entrar" type="submit" value="Entrar">
        </form> 
</div>

<?php
if(isset($_SESSION['nao_autenticado'])):
?>
<div class="notification is-danger">
    <p>ERRO: Usuário e/ou senha inválidos.</p>
</div>
<?php
endif;
unset($_SESSION['nao_autenticado']);
?>
<!--<div class="div-imagem">
    <img class="logo" src="imagens/LOGO/logo_branca.gif">
</div>-->

<footer class="footer-login">
    <a class="link-cadastrase" href="cadastro">Cadastra-se no NetworkPet's</a><br>
    <a class="link-esq-senha"href="link">Esqueceu a senha?</a>
</footer>
</div>