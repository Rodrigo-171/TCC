<?php

#ip do banco de dados do mysql
// define('HOST', '127.0.0.1:3307');
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