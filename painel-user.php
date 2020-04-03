<?php
// Para capturar sessão da página passada
include('controller/verifica_login.php');
include('controller/conexao.php');

$nomes = [];
$data = date('Y-m-d');
$dataMax = date('Y-m-d', strtotime('+2 days'));

$resultNomes = mysqli_query(
    $conexao,
    "SELECT nome FROM tb_funcionarios;"
); 
while($coluna = mysqli_fetch_assoc($resultNomes)){
    array_push($nomes, $coluna['nome']) ;
}

$sql = "SELECT * FROM tb_clientes where email = " . "'" . $_SESSION['email'] ."';";

$result = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($result);

$_SESSION['id'] = $result[0];

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
		<p>Serviço agendado com sucesso,compareça a barbearia na data e hora selecionada.</p>
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
            <h2>Seja Bem vindo, <?php echo $_SESSION['email']?>!</h2>
            <p>
                Faça o agendamento de forma simples e rápida.
            </p>
        </div>    
            <form action="controller/agendar.php" id="form-agendamento" method="POST">
                <label for="servico">Serviços</label>
                <div style="display: flex; flex-direction: column">
                    <div style="display: flex; justify-content: space-between;">
                        <span>
                        <input type="checkbox" name="servico[]"id="servico" value="corte basico"> Corte básico 
                        </span>  
                        <span style="margin-right: 15px">R$: 10 Reais</span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between;">
                        <span>
                        <input type="checkbox" name="servico[]" id="servico" value="barba"> Barba
                        </span>  
                        <span style="margin-right: 15px">R$: 10 Reais</span>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <span>
                        <input type="checkbox" name="servico[]" id="servico" value="barboterapia"> Barboterapia
                        </span>  
                        <span style="margin-right: 15px">R$: 20 Reais</span>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <span>
                        <input type="checkbox" name="servico[]" id="servico" value="degrade"> Degradê
                        </span>  
                        <span style="margin-right: 15px">R$: 15 Reais</span>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <span>
                        <input type="checkbox" name="servico[]" id="servico" value="luzes"> Luzes 
                        </span>  
                        <span style="margin-right: 15px">R$: 20 Reais</span>
                    </div>
                </div>

                <div>    
                    <label for="profissional">Escolha seu o Profissional</label>
                        <!--SELECT DINAMICO -->
                    <select name="profissional" id="profissional">
                    <option value="">Profissional</option>
                    <?php foreach($nomes as $funcionario) { ?>

                    <option value="<?php echo $funcionario ?>"><?php echo $funcionario ?></option>
   
                    <?php } ?>
        
                    </select>
                </div>

                <div>
                    <label for="horario">Agendar horário</label>
                        <?php
                        echo "<input type='date' name='data' id='data' min='$data' max='$dataMax'>"
                        ?>
                        <input type="time" name="hora" id="horario" class="tamanho" min="09:00" max="18:00">
                </div>
                
                <input type="submit" class="btn-agendar" value="Agendar">
            </form>
        
    </section>
</body>
</html>