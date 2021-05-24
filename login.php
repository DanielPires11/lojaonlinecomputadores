<?php
    include_once 'includes/dbh.inc.php';
	
	if(isset($_POST['button'])) {
	header('Location: desktops.php');}
	
/*if(empty($_POST['email']) || empty($_POST['PasswordHash'])) {
	header('Location: index.php');
	exit();
}

$utilizador = mysqli_fetch_assoc($conn, $_POST['email']);
//$senha = mysqli_fetch_assoc($conn, $_POST['PasswordHash']);

//$query = "select * from utilizador where email = '{$utilizador}' and PasswordHash '{$senha}'";

if($row == 1) {
	$_SESSION['email'] = $utilizador;
	header('Location: desktops.php');
	exit();

/*$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['email'] = $utilizador;
	header('Location: desktops.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}*/