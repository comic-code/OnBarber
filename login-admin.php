<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<header> <!-- início Barra de navegação -->
		<div id="logo">
			<h2><a href="../index.php" class="borda">OnBarber</a></h2>
		</div>

		<nav id="navegacao">
			<ul>
				<li class="divisor"><a href="login-user.php" class="selecionado">Login</a></li>
				<li><a href="cadastro-user.php">Cadastre-se</a></li>
			</ul>
		</nav>
	</header> <!-- fim Barra de navegação -->
	
	<?php
	if(isset($_SESSION['nao_autenticado'])):
	?>
	<div class="msg erro">
		<p>ERRO: Email ou senha inválidos.</p>
	</div>		
	<?php
    endif;
	unset($_SESSION['nao_autenticado']);
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
	
	<div id="caixa-login"> <!-- início caixa -->
		<form id="form-login" action="controller/logar-admin.php" method="POST"> <!-- início form login -->
				<div class="titulo"> <!-- div icone -->
					<img src="img/entrar.png" alt=""><br>
					Acesso Funcionário
				</div> <!-- fim icone -->

				<div> <!-- div usuário -->
					<input type="email" name="email" id="email" placeholder="Email" class="icon-user">
				</div> <!-- fim usuário -->

				<div> <!-- div senha -->
					<input type="password" name="senha" id="senha" placeholder="Senha" class="icon-senha">
				</div> <!-- fim senha -->
				
				<div> <!-- div botao -->
					<input type="submit" value="Login" class="btn-login">
				</div> <!-- fim botao -->

		</form> <!-- fim form login -->
	</div> <!-- fim caixa -->

</body>
</html>