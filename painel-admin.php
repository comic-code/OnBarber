<?php
// Para capturar sessão da página passada
include('controller/verifica_login.php');
include('controller/conexao.php');

$nome = explode("@", $_SESSION['email']);
$nome = $nome[0];

$sql = "SELECT data_, hora FROM tb_horarios_$nome;";

$result = mysqli_query($conexao, $sql);

$email = $_SESSION['email'];

$sql2 = "SELECT id_funcionario FROM tb_funcionarios where email = '$email';";
$result2 = mysqli_query($conexao, $sql2);
while($exibe2 = mysqli_fetch_assoc($result2)){ 
	$id = $exibe2['id_funcionario'];
}

$sql3 = "SELECT servico, valor FROM tb_servicos WHERE id_funcionario = '$id'";
$result3 = mysqli_query($conexao, $sql3);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Dashboard</title>
</head>
<body>

    <header> <!-- início Barra de navegação -->
		<div id="logo">
            <h2><a href="index.php" class="borda">OnBarber</a></h2>
		</div>

		<nav id="navegacao">
			<ul>
                <li><a href="adm.html" class="selecionado">Dashboard</a></li>
				<li><a href="index.php">Sair</a></li>
			</ul>
		</nav>
    </header> <!-- fim Barra de navegação -->

    <section> <!-- inicio sessão-->
        <div class="caixa"> <!-- inicio caixa-->
            <h2>Lista de clientes agendados</h2>
            <table> <!--inicio tabela-->
                <tr>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Valor</th>
                </tr>
                <?php while(($dado = $result->fetch_array()) && ($dado2 = $result3->fetch_array())) { ?>
                <tr>
                    <td><?php echo $dado2['servico'] ?></td>
                    <td><?php echo $dado['data_'] ?></td>
                    <td><?php echo $dado['hora'] ?></td>
                    <td><?php echo  $dado2['valor'] ?></td>
                </tr>
                <?php } ?>

            </table> <!-- fim tabela-->

<!-- <div> 
                <button class="btn-deletar" name="deletar" id="deletar" type="submit">Deletar</button>
            </div> 
-->         
        </div> <!--fim caixa-->
    </section> <!--fim sessão-->
</body>
</html>