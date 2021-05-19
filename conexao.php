<?php
define('HOST', '127.0.0.1');
define('UTILIZADOR', 'root');
define('SENHA', '20359');
define('DB', 'login');

$conexao = mysqli_connect(HOST, UTILIZADOR, SENHA, DB) or die ('Não foi possível conectar');