<?php
	session_start();
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
			<nav class="navbar navbar-expand-lg text-white navbar-light" style="font-size: 0.9em;">
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
						<li class="nav-item ml-3"><a href="convites.php"><i class="far fa-envelope text-white"></i></a></li>
						<!-- minha conta -->
						<li class="nav-item ml-3"><a href="minha-conta.php" title="Minha Conta"><i class="far fa-user text-white"></i></a></li>
						<!-- sair -->
						<li class="nav-item ml-3"><a href="index-principal.php"><i class="fas fa-sign-out-alt text-white"></i></a></li>
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
			                	<a class="nav-link atual" href="index-pagina-pessoal.php">PÁGINA INICIAL</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="cadastrar-bolao.php">CRIAR BOLÃO</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="meus-boloes.php">MEUS BOLÕES</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="minhas-apostas.php">MINHAS APOSTAS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="historico-apostas.php">MEU HISTÓRICO DE APOSTAS</a>
			              	</li>
			            </ul>
					</div>
				</div>
			</nav>
		</section>

		<section>
			<div class="container">
				<h2 class="titulo my-3 text-info">Minha Conta <i class="fas fa-user text-dark"></i></h2>
				<hr>
				<div class="row text-dark">
					<div class="col-8 offset-2">
						
						<form method="post" action="php/alterar-dados.php">
							<div class="row">
								<div class="col-4 form-group">
									<label class="titulo" for="username">Nome de Usuário <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="username" id="username" value="<?php echo $_SESSION["username"]; ?>" readonly>
								</div>

								<div id="senha" class="col-4 offset-4 form-group" style="display: none;">
									<label class="titulo" for="nova-senha">Criar Nova Senha <span class="text-danger">*</span>:</label>
									<input class="form-control" type="password" name="nova-senha" id="nova-senha">
								</div>
							</div>

							<div class="row">
								<div class="col-6 form-group">
									<label class="titulo" for="email">Email <span class="text-danger">*</span>:</label>
									<input class="form-control" type="email" name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" readonly>
								</div>

								<div id="confirmar" class="col-4 offset-2 form-group" style="display: none;">
									<label class="titulo" for="confirmar-nova-senha">Confirmar Nova Senha <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="confirmar-nova-senha" id="confirmar-nova-senha">
								</div>
							</div>

							<h4 class="titulo my-3 text-info">Dados Pessoais</h4>
							<hr>

							<div class="row">
								<div class="col-7 form-group">
									<label class="titulo" for="nome">Nome Completo <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $_SESSION["nome"]; ?>" readonly>
								</div>

								<div class="col-4 offset-1 form-group">
									<label class="titulo" for="genero">Gênero <span class="text-danger">*</span></label><br>
									<select id="genero" readonly>
										<?php 
											if($_SESSION["genero"] == 'feminino'){
												echo '<option value="nonselected" style="color:lightgray;">[selecione]</option>
												<option value="feminino" selected>Feminino</option>
												<option value="masculino">Masculino</option>
												<option value="nodeclared">Prefiro não declarar</option>';
											} elseif($_SESSION["genero"] == 'masculino'){
												echo '<option value="nonselected" style="color:lightgray;">[selecione]</option>
												<option value="feminino">Feminino</option>
												<option value="masculino" selected>Masculino</option>
												<option value="nodeclared">Prefiro não declarar</option>';
											} elseif($_SESSION["genero"] == 'nodeclared'){
												echo '<option value="nonselected" style="color:lightgray;">[selecione]</option>
												<option value="feminino">Feminino</option>
												<option value="masculino">Masculino</option>
												<option value="nodeclared" selected>Prefiro não declarar</option>';
											}
										?>	
									</select>
								</div>
							</div>	

							<div class="row">
								<div class="col-4 form-group">
									<label class="titulo" for="rg">RG <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="rg" id="rg" value="<?php echo $_SESSION["rg"]; ?>" readonly>
								</div>

								<div class="col-4 offset-4 form-group">
									<label class="titulo" for="ddn">Data de Nascimento <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="ddn" id="ddn" value="<?php echo $_SESSION["ddn"]; ?>" readonly>
								</div>
							</div>	
							
							<div class="row">
								<div class="col-4 form-group">
									<label class="titulo" for="telefone">Telefone <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo $_SESSION["telefone"]; ?>" readonly>
								</div>

								<div class="col-4 offset-4 form-group">
									<label class="titulo" for="celular">Celular <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="celular" id="celular" value="<?php echo $_SESSION["celular"]; ?>" readonly>
								</div>
							</div>	

							<h4 class="titulo my-3 text-info">Dados Bancários</h4>
							<hr>

							<div class="row">
								<div class="col-4 form-group">
									<label class="titulo" for="banco">Banco <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="banco" id="banco" value="<?php echo $_SESSION["banco"]; ?>" readonly>
								</div>
								<div class="col-4 form-group">
									<label class="titulo" for="agencia">Agência <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="agencia" id="agencia" value="<?php echo $_SESSION["agencia"]; ?>" readonly>
								</div>
								<div class="col-4 offset-4form-group">
									<label class="titulo" for="conta">Conta <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="conta" id="conta" value="<?php echo $_SESSION["conta"]; ?>" readonly>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="col-12 form-group">
									<button id="alterar-dados" class="btn btn-info btn-block py-2" type="button" onclick="alterar_dados()">Alterar Dados</button>
									<button id="salvar-alteracao" class="btn btn-success btn-block py-2" type="submit" style="display: none;" onclick="salvar_alteracoes()">Salvar Alterações</button>
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
							<a class="nav-link" href="cadastro.php#termos" data-toggle="modal">TERMOS E CONDIÇÕES</a>
						</li>
						<li class="nav-item ml-md-2">
							<a class="nav-link" href="#">REPORTAR BUGS</a>
						</li>
					</ul>
				</div>
			</nav>
		</footer>


		 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
    	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

		<script type="text/javascript">
			
			$('#rg').mask('00.000.000-00');
			$('#cpf').mask('000.000.000-00');
			$('#telefone').mask('00 0000-0000');
			$('#celular').mask('00 0 0000-0000');
			$('#agencia').mask('0000-0');
			$('#conta').mask('00000-0');

			function alterar_dados() {
				document.getElementById('senha').style.display = 'block';
				document.getElementById('confirmar').style.display = 'block';
				document.getElementById('alterar-dados').style.display = 'none';
				document.getElementById('salvar-alteracao').style.display = 'block';

				document.getElementById('username').readOnly = false;
				document.getElementById('email').readOnly = false;
				document.getElementById('nome').readOnly = false;
				document.getElementById('genero').readOnly = false;
				document.getElementById('rg').readOnly = false;
				document.getElementById('ddn').type = 'date';
				document.getElementById('ddn').readOnly = false;
				document.getElementById('telefone').readOnly = false;
				document.getElementById('celular').readOnly = false;
				document.getElementById('banco').readOnly = false;
				document.getElementById('agencia').readOnly = false;
				document.getElementById('conta').readOnly = false;
			}

			function salvar_alteracoes() {
				document.getElementById('senha').style.display = 'none';
				document.getElementById('confirmar').style.display = 'none';
				document.getElementById('alterar-dados').style.display = 'block';
				document.getElementById('salvar-alteracao').style.display = 'none';

				document.getElementById('username').readOnly = true;
				document.getElementById('email').readOnly = true;
				document.getElementById('nome').readOnly = true;
				document.getElementById('genero').readOnly = true;
				document.getElementById('rg').readOnly = true;
				document.getElementById('ddn').type = 'text';
				document.getElementById('ddn').readOnly = true;
				document.getElementById('telefone').readOnly = true;
				document.getElementById('celular').readOnly = true;
				document.getElementById('banco').readOnly = true;
				document.getElementById('agencia').readOnly = true;
				document.getElementById('conta').readOnly = true;
			}

		</script>

	</body>

</html>