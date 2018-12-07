<?php
	session_start();

	$opcao = array();
	$_SESSION['opcao'] = $opcao;
?>

<!doctype html>

<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Bolão MasterChef Brasil</title>

		 <!-- Icone da aba -->
	    <link rel="icon" href="images/logo-vermelho.png">

	    <link rel="stylesheet" type="text/css" href="css/style-pagina-pessoal.css">

	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>


	<body>	

		<header>			
			<nav class="navbar navbar-expand-lg text-white" style="font-size: 0.9em;">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item"><strong>MASTERCHEF BRASIL 2018 - <?php echo $_GET['a'] == 'amadores' ? 'AMADORES' : 'PROFISSIONAIS';?></strong> | </li>
						<li class="nav-item ml-2">POSIÇÃO: posição | </li>
						<li class="nav-item ml-2">PONTUAÇÃO: pontuação</li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong> <?php echo $_SESSION["nome"]; ?></strong></li>
						<!-- trocar de modalidade -->
						<li class="nav-item ml-4"><a href="#"><i class="fas fa-exchange-alt text-white"></i></a></li>
						<!-- convites -->
						<li class="nav-item ml-3"><a href="convites.html"><i class="far fa-envelope text-white"></i></a></li>
						<!-- minha conta -->
						<li class="nav-item ml-3"><a href="minha-conta.html" title="Minha Conta"><i class="far fa-user text-white"></i></a></li>
						<!-- sair -->
						<li class="nav-item ml-3"><a href="index-principal.html"><i class="fas fa-sign-out-alt text-white"></i></a></li>
					</ul>
				</div>
			</nav>
		</header>

		<section id="navbar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<img class="navbar-brand" src="images/logo-vermelho.png" style="width: 100px;">

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse">
			        	<span class="navbar-toggler-icon"></span>
			        </button>

			        <div class="collapse navbar-collapse" id="nav-collapse">
			        	<ul class="navbar-nav">
			            	<li class="nav-item">
			                	<a class="nav-link" href="index-pagina-pessoal.html">PÁGINA INICIAL</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link atual" href="cadastrar-bolao.php">CRIAR BOLÃO</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="meus-boloes.html">MEUS BOLÕES</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="minhas-apostas.html">MINHAS APOSTAS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="historico-apostas.html">MEU HISTÓRICO DE APOSTAS</a>
			              	</li>
			            </ul>
					</div>
				</div>
			</nav>
		</section>

		<section id="formulario">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1 class="titulo text-center py-3 text-info">Cadastrar Bolão</h1>
						<form class="p-4 shadow" method="post" action="php/cadastrar_bolao.php">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="titulo" for="campeonato">Campeonato <span class="text-danger">*</span></label>
										<select class="form-control custom-select" name="campeonato" id="campeonato">
											<option value="profissionais" selected>MasterChef Profissionais</option>
											<option value="amadores">MasterChef Amadores</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="titulo" for="tipo-bolao">Tipo do Bolão <span class="text-danger">*</span></label>
										<select class="form-control custom-select" name="tipo-bolao" id="tipo-bolao" onchange="liberar_senha()" required>
											<option value="publico" selected>Público</option>
											<option value="privado">Privado</option>
										</select>
									</div>

									<div style="display: none;" id="senha" class="form-group">
										<label class="titulo" for="pwd">Senha <span class="text-danger">*</span></label>
										<input class="form-control" type="password" name="pwd" id="pwd">
									</div>
								</div>

							</div>

							<div class="form-group">
								<label class="titulo" for="nome">Nome <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome para o bolão" required>
							</div>

							<div class="form-group">
								<label class="titulo" for="descricao">Descrição</label>
								<textarea class="form-control" style="resize: none;" id="descricao" name="descricao"></textarea>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label class="titulo" for="participantes">Número de Participantes</label>
									</div>
									<div class="offset-1 col-md-5">
										<label class="titulo" for="data">Data de Término</label>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<input class="form-control" type="number" name="participantes" id="participantes">
										<input class="mt-1" type="checkbox" name="unlimited" id="unlimited">
										<label for="unlimited">Sem limite</label>
									</div>
									<div class="offset-2 col-md-5">
										<input class="form-control" type="date" name="data" id="data">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="titulo" for="escolhas">Escolhas de Aposta <span class="text-danger">*</span></label>
								<textarea class="form-control mb-2" style="resize: none; display: none;" id="escolhas2" name="escolhas2"></textarea>
								<div class="mb-2" id="escolhas" style="background-color: #DCDCDC; padding: 0.2em;"></div>
								<div class="row">
									<div class="col-md-6 input-group">
										<input class="form-control" id="opcao" name="opcao" type="text">
										<div class="input-group-append">
											<button class="btn btn-info" type="button" onclick="carrega_escolha();"><i class="fas fa-plus"></i></button>
										</div>
									</div>

								</div>
							</div>

							<div class="form-group">
								<label class="titulo" for="tipo-jogo">Tipo de Jogo <span class="text-danger">*</span></label>
								<div class="row checkbox-group required">
									<div class="col-md-6">
										<input type="checkbox" name="caixa-misteriosa" id="caixa-misteriosa">
										<label for="caixa-misteriosa">Prova da Caixa Misteriosa</label><br>
										<input type="checkbox" name="equipes" id="equipes">
										<label for="equipes">Prova em Equipes</label><br>
										<input type="checkbox" name="eliminacao" id="eliminacao">
										<label for="eliminacao">Prova de Eliminação</label>
									</div>

									<div class="col-md-6">
										<input type="checkbox" name="repescagem" id="repescagem">
										<label for="repescagem">Prova de Repescagem</label><br>
										<input type="checkbox" name="semifinal" id="semifinal">
										<label for="semifinal">Semifinal</label><br>
										<input type="checkbox" name="final" id="final">
										<label for="final">Final</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="titulo">Tipo de Aposta <span class="text-danger">*</span></label><br>
								<input type="radio" name="tipo-aposta" id="tema" value="tema" required>
								<label for="tema">Qual será o tema da prova?</label><br>
								<input type="radio" name="tipo-aposta" id="ingredientes" value="ingredientes">
								<label for="ingredientes">Quais serão os ingredientes utilizados na prova?</label><br>
								<input type="radio" name="tipo-aposta" id="ganhador" value="ganhador">
								<label for="ganhador">Quem será que vai ganhar?</label><br>
								<input type="radio" name="tipo-aposta" id="perdedor" value="perdedor">
								<label for="perdedor">Quem será que vai perder/eliminado?</label><br>
								<input type="radio" name="tipo-aposta" id="outro" value="outro">
								<input type="text" id="outra-opcao" name="outra-opcao" placeholder="Outro">
							</div>				

							<button class="btn btn-info btn-block my-2 py-2" type="submit">Criar Bolão</button>		
						</form>
					</div>	
					<div class="col-md-3">
						<img class="sticky" src="images/chef-pao.jpg">
					</div>				
				</div>
			</div>
		</section>

		<section id="convidar-amigos" style="display: none;">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img class="sticky" src="images/chef-ouvindo.jpg">
					</div>	

					<div class="col-md-6 align-self-center">
						<h1 class="titulo text-center py-3 text-info">Convidar Amigos</h1> 
						<form class="p-4 shadow" method="post" action="php/convidar-amigos.php">
							<div class="form-group">
								<label class="titulo" for="username">Nome de Usuário</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="far fa-user"></i></span>
									</div>
									<input class="form-control" type="text" name="username" id="username">
								</div>
							</div>

							<hr class="mt-4">

							<div class="form-group">
								<label class="titulo" for="email">Email <span style="font-family: robotok;">(caso não esteja cadastrado no sistema)</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="titulo input-group-text">@</span>
									</div>
									<input class="form-control" type="text" name="email" id="email">
								</div>

								<div class="form-group">
									<button class="btn btn-info my-3 btn-block" type="submit" onclick="convidar_amigos()">Convidar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<footer style="background-color: #B22222">
			<nav class="navbar navbar-expand-lg text-white navbar-dark">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item">&copy Bolão MasterChef Brasil</li>
					</ul>

					<ul class="navbar-nav" style="font-size: 0.9em;">
						<li class="nav-item">
							<a class="nav-link" href="#">FAQ</a>
						</li>
						<li class="nav-item ml-md-2">
							<a class="nav-link" href="cadastro.html#termos" data-toggle="modal">TERMOS E CONDIÇÕES</a>
						</li>
						<li class="nav-item ml-md-2">
							<a class="nav-link" href="#">REPORTAR BUGS</a>
						</li>
					</ul>
				</div>
			</nav>
		</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	

		<script type="text/javascript">

			function create_alert(message){
				document.getElementById('escolhas').innerHTML += '<div class="alert alert-info alert-dismissible w-100"><a class="close" data-dismiss="alert">&times;</a><span>'+ message +'</span></div>';
				document.getElementById('escolhas2').value += message + '-';
			}

	    	function carrega_escolha() {
	    		create_alert(document.getElementById('opcao').value); 
	    	}

	    	function liberar_senha() {
	    		if(document.getElementById('tipo-bolao').value == "privado"){
	    			document.getElementById('senha').style.display = "block";
	    		} else {
	    			document.getElementById('senha').style.display = "none";
	    		}
	    	}

	    	function convidar_amigos(){
	    		document.getElementById('formulario').style.display = "none";
	    		document.getElementById('convidar-amigos').style.display = "block";
	    	}
	    </script>
	</body>

</html>