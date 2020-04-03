<?php
// Para capturar sessão da página passada
include('controller/verifica_login.php');
include('controller/conexao.php');

$funcionarios = [];
$selectColunas = mysqli_query(
    $conexao,
    "SELECT nome FROM tb_funcionarios;"
); 
while($coluna = mysqli_fetch_assoc($selectColunas)){
    array_push($funcionarios, $coluna['nome']) ;
}

$email = $_SESSION['email'];

$query = mysqli_query(
    $conexao,
    "SELECT nome FROM tb_clientes WHERE $email;"
);
$result = mysqli_fetch_assoc($query); 
$nome = $result['nome'];