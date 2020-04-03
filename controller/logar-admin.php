<?php
session_start();
include('conexao.php');

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: ../login-admin.php');
	$_SESSION['dados_vazios'] = true;
	exit();
}



$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from tb_funcionarios where email = '$email' and senha = md5('$senha')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['email'] = $email;
	header('Location: ../painel-admin.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login-admin.php');
	exit();
}