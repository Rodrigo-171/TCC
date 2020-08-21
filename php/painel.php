<?php

session_start();
include('verifica_login.php')
print_r($_SESSION);exit;

<h2>Olá , <?php echo $_SESSION['fname'];?></h2>
<h2><a href="logout.php">Sair</a></h2>