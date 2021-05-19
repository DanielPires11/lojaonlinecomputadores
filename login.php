<?php
session_start();
include('conexao.php');

if(empty($_POST['utilizador']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$utilizador = mysqli_real_escape_string($conexao, $_POST['utilizador']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select utilizador from utilizador where utilizador = '{$utilizador}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['utilizador'] = $utilizador;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}