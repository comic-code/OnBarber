<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>OnBarber</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header> <!-- início Barra de navegação -->
		<div id="logo">
				<h2><a href="index.php" class="borda">OnBarber</a>
				</h2>
		</div>

		<nav id="navegacao">
			<ul>
				<li class="divisor"><a href="login-user.php">Login</a></li>
				<li><a href="cadastro-user.php">Cadastre-se</a></li>
			</ul>
		</nav>
	</header> <!-- fim Barra de navegação -->

	<section id="container"> <!-- início sessão de conteúdos -->

		<div class="card">
			<img src="img/2.png" alt="">

			<div class="icon-circle">
				<img src="img/navalha.png" alt="" style="margin-top: 13px;">
			</div>
			
				<div>
					<h3>Cortes Profissionais</h3>
					<p style="text-align: center;">
						Os cortes mais pedidos de 2020 feitos pelas mãos de quem entende do assunto!
					</p>
				</div>
		</div>

		<div class="card">
			<img src="img/3.png" alt="">

			<div class="icon-circle">
				<img src="img/barbeiro.png" alt="" style="margin-top: 13px;">
			</div>
			
				<div>
					<h3>Degradês</h3>
					<p style="text-align: center;">
						O melhor degradê você encontra aqui! Diversos estilos com transições suaves ou como preferir!
					</p>
				</div>
			
		</div>

		<div class="card">
			
			<img src="img/1.png" alt="">

				<div class="icon-circle">
					<img src="img/tesoura.png" alt="" style="margin-top: 13px">
				</div>
			
				<div>
					<h3>Barboterapia</h3>
					<p style="text-align: center;">
					A barboterapia é um procedimento que tem como objetivo promover o relaxamento, além de prezar pela hidratação da pele e, claro, uma barba bem feita.
					</p>
				</div>
		</div>

	</section> <!-- fim sessão de conteúdos -->

	<footer> <!-- início rodapé -->

		<div style="padding-bottom:5px;">
			
		</div>

		&copy; Desenvolvido por <span class="borda">EasySolutions</span>
	</footer> <!-- rodapé -->			
	<?php
		session_start();
		if(isset($_SESSION['nao_autenticado'])):
	?>
	<script>
		
		alert('É necessário estar logado para acessar essa página');
		
	</script>
	<?php
    	endif;
		unset($_SESSION['nao_autenticado']);
	?>

</body>
</html>