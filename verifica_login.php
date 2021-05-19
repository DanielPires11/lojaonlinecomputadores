<?php
session_start();
if(!$_SESSION['utilizador']) {
	header('Location: index.php');
	exit();
}