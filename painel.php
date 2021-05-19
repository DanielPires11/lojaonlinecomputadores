<?php
session_start();
include('verifica_login.php');
?>

<h2>Bem-Vindo, <?php echo $_SESSION['utilizador'];?></h2>
<h2><a href="logout.php">Sair</a></h2>