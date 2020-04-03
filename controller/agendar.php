<?php
include('conexao.php');
session_start();

$servico = '';
$_POST['valor'] = 0;

foreach($_POST['servico'] as $item):
    $servico .= $item." ";
endforeach;


// VALOR DO SERVIÇO

if (in_array('corte basico', $_POST['servico'])){
    $_POST['valor'] += 10;
}

if (in_array('barba', $_POST['servico'])){
    $_POST['valor'] += 10;
}

if (in_array('barboterapia', $_POST['servico'])){
    $_POST['valor'] += 20;
}

if (in_array('degrade', $_POST['servico'])){
    $_POST['valor'] += 15;
}

if (in_array('luzes', $_POST['servico'])){
    $_POST['valor'] += 20;
}

if(empty($servico) || empty($_POST['profissional']) || empty($_POST['data']) || empty($_POST['hora'])) {
	header('Location: ../painel-user.php');
	$_SESSION['dados_vazios'] = true;
	exit();
}


$servico = mysqli_real_escape_string($conexao, trim($servico));
$profissional = mysqli_real_escape_string($conexao, trim($_POST['profissional']));
$valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
$data = mysqli_real_escape_string($conexao, trim($_POST['data']));
$hora = mysqli_real_escape_string($conexao, trim($_POST['hora']));

$query = "SELECT email FROM tb_funcionarios where nome = '$profissional';";
$result = mysqli_query($conexao, $query);
$profissional = mysqli_fetch_array($result);
$profissional = $profissional [0];

$sql = "SELECT * FROM tb_funcionarios where email = '$profissional';";


$result2 = mysqli_query($conexao, $sql);
$result2 = mysqli_fetch_array($result2);

$profissionalId =  $_SESSION['id_profissional'] = $result2[0];

$profissional = explode("@", $profissional);
$profissional = $profissional[0]; 
$id = $_SESSION['id'];

$sql = "INSERT INTO tb_servicos (servico, valor, id_cliente, id_funcionario) VALUES ('$servico', $valor, $id, $profissionalId)";

$sql2 = "INSERT INTO tb_horarios_$profissional (data_, hora) VALUES ('$data', '$hora')";

mysqli_query($conexao, $sql2);

if(mysqli_query($conexao, $sql)) {
    header('Location: ../painel-user.php');
    $_SESSION['sucesso'] = true;
}

$conexao->close();

?>