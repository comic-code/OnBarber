<?php
// Para capturar sessão da página passada
include('controller/verifica_login.php');
include('controller/conexao.php');

$nome = explode("@", $_SESSION['email']);
$nome = $nome[0];

$sql = "SELECT data_, hora FROM tb_horarios_$nome;";

$result = mysqli_query($conexao, $sql);
while($exibe = mysqli_fetch_assoc($result)){
	$array1[] = $exibe;
}

$email = $_SESSION['email'];

$sql2 = "SELECT id_funcionario FROM tb_funcionarios where email = '$email';";
$result2 = mysqli_query($conexao, $sql2);
while($exibe2 = mysqli_fetch_assoc($result2)){ 
	$id = $exibe2['id_funcionario'];
}

$sql3 = "SELECT servico, valor FROM tb_servicos WHERE id_funcionario = '$id'";
$result3 = mysqli_query($conexao, $sql3);
while($exibe3 = mysqli_fetch_assoc($result3)) {
	$array2[] = $exibe3;
}

print_r($array3 = array_map(NULL,$array1 , $array2));



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem vindo!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <header> <!-- início Barra de navegação -->
		<div id="logo">
			<h2><a href="index.php" class="borda">OnBarber</a></h2>
		</div>

		<nav id="navegacao">
			<ul>
				<li><a href="painel-user.php" class="selecionado">Agendar</a></li>
				<li><a href="controller/logout.php">Sair</a></li>
			</ul>
		</nav>
    </header> <!-- fim Barra de navegação -->

    <section id="caixa-agendamento"> <!-- início sessão agendamento -->
        
        <div class="box">
            <h2>Seja Bem vindo, <?php echo ucfirst($nome) ?>!</h2>
            <p>
                Estes são os ultimos agendamentos:
            </p>
		</div>  
		
		<table border="1">
			<tr>
        		<th>Serviço</th>
        		<th>Valor</th>
				<th>Data</th>
       			<th>Hora</th>
			</tr>
			<?php 
				foreach($array3 as $idx => $valor) {

			?>
			<tr>
			<?php 
				foreach($valor as $idx2 => $servico) {
			?>	
				<td><?php echo $array3[$idx][$idx2] ?></td>
			
			<?php } ?>
			<tr>
			<?php }?>
		</table>
            
        
    </section>
</body>
</html>