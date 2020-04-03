<?php
// Para capturar sessão da página passada
include('controller/verifica_login.php');
include('controller/conexao.php');

$nome = explode("@", $_SESSION['email']);
$nome = $nome[0];

$sql = "SELECT * FROM tb_horarios_$nome;";

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

$sql3 = "SELECT * FROM tb_servicos WHERE id_funcionario = '$id'";
$result3 = mysqli_query($conexao, $sql3);
while($exibe3 = mysqli_fetch_assoc($result3)) {
	$array2[] = $exibe3;
}

//Array 1 horários
print_r($array1);
//Array 2 serviços
print_r($array2);

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
    
    <?php
	if(isset($_SESSION['sucesso'])):
	?>
	<div class="msg sucesso">
		<p>Serviço agendado com sucesso,compareça a barbearia na data ehora selecionada.</p>
	</div>		
	<?php
    endif;
	unset($_SESSION['sucesso']);
	?>

    <?php
	if(isset($_SESSION['dados_vazios'])):
	?>
	<div class="msg erro">
	  <p>É necessário o preenchimento de todos os campos.</p>
	</div>
	<?php
	endif;
	unset($_SESSION['dados_vazios']);
	?>

    <section id="caixa-agendamento"> <!-- início sessão agendamento -->
        
        <div class="box">
            <h2>Seja Bem vindo, <?php echo ucfirst($nome) ?>!</h2>
            <p>
                Estes são os ultimos agendamentos:
            </p>
        </div>    
            
        
    </section>
</body>
</html>