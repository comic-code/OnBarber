<?php
session_start();
if(!$_SESSION['email']) {
	header('Location: index.php');
	$_SESSION['nao_autenticado'] = true;
	exit();
}