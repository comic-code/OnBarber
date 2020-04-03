<?php
session_start();
include('conexao.php');

if(empty($_POST['nome']) || empty($_POST['telefone']) || empty($_POST['email']) || empty($_POST['senha'])) {
    $_SESSION['dados_vazios'] = true;
    header('Location: ../cadastro-admin.php');
    exit();
}

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

// Verificando se usuário existe no BD
$sql = "select count(*) as total from tb_funcionarios where email = '$email';";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: ../cadastro-admin.php');
    exit;
}

$sql = "INSERT INTO tb_funcionarios (nome, telefone, email, senha, data_criacao) VALUES ('$nome', '$telefone', '$email', '$senha', NOW())";

// Tirando Capslock
strtolower($email);

// Apenas o primeiro email
$partes = explode("@", $email);

$email = $partes[0];

$sql2 = "CREATE TABLE tb_horarios_$email(
	id_horario int NOT null PRIMARY KEY AUTO_INCREMENT,
    data_ date NOT null,
    hora time NOT null
);";

mysqli_query($conexao, $sql2);

if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: ../cadastro-admin.php');
exit;

?>