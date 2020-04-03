<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro de Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	
	<header> <!-- início Barra de navegação -->
		<div id="logo">
			<h2><a href="index.php" class="borda">OnBarber</a></h2>
		</div>

		<nav id="navegacao">
			<ul>
				<li class="divisor"><a href="login-user.php">Login</a></li>
				<li><a href="cadastro-user.php" class="selecionado">Cadastre-se</a></li>
			</ul>
		</nav>
	</header> <!-- fim Barra de navegação -->

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
	
	<?php
	if(isset($_SESSION['status_cadastro'])):
	?>

	<div class="msg sucesso">
		<p>Cadastro efetuado!<br>
		Faça login informando o seu usuário e senha <a href="login-user.php">aqui</a></p>
	</div>

	<?php
	endif;
	unset($_SESSION['status_cadastro']);
	?>
    <?php
    if(isset($_SESSION['usuario_existe'])):
    ?>

	<div class="msg repetido">
		<p>O email escolhido já existe. Informe outro e tente novamente.</p>
	</div>
	
	<?php
	endif;
    unset($_SESSION['usuario_existe']);
	?>

	<div id="caixa"> <!-- início caixa -->

		<form id="form-user" action="controller/cadastrar-usuario.php" method="POST">
			<fieldset>
				<div class="titulo">
					<span>Cadastre-se</span>
				</div>

				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" placeholder="Nome completo" autofocus>

				<label for="telefone">Telefone</label>
				<input type="tel" name="telefone" id="telefone" placeholder="Digite o número de telefone" autofocus>

				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="User@gmail.com" autofocus>

				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" placeholder="Digite sua senha" autofocus>

				<input type="submit" value="Cadastrar" class="btn-enviar">
						
			</fieldset>
		</form>

		<a href="index.php" class="btn-voltar">Voltar</a>

	</div> <!-- fim caixa -->
	
</body>
</html>