<?php

	require_once 'php/sistema.php';
	require_once 'php/bolao.php';

	session_start();

	$mensagens = $_SESSION['msg'];
	$sistema = $_SESSION['sistema'];
	$boloes = $sistema->getBoloes();

?>

<!doctype hmtl>

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
						<li class="nav-item"><strong>MASTERCHEF BRASIL 2018 - PROFISSIONAIS</strong> | </li>
						<li class="nav-item ml-2">POSIÇÃO: <?php echo $_SESSION["ranking"]; ?> | </li>
						<li class="nav-item ml-2">PONTUAÇÃO: <?php echo $_SESSION["pontuacao"]; ?></li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong>SABRINA COSME</strong></li>
						<!-- trocar de modalidade -->
						<li class="nav-item ml-4"><a href="pos-login.php"><i class="fas fa-exchange-alt text-white"></i></a></li>
						<!-- convites -->
						<li class="nav-item ml-3"><a href="convites.php"><i class="far fa-envelope text-white"></i></a></li>
						<!-- minha conta -->
						<li class="nav-item ml-3"><a href="minha-conta.php" title="Minha Conta"><i class="far fa-user text-white"></i></a></li>
						<!-- sair -->
						<li class="nav-item ml-3"><a href="index.php?a=sair"><i class="fas fa-sign-out-alt text-white"></i></a></li>
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
				<h2 class="titulo my-3 text-info"><i class="fas fa-envelope text-dark"></i> Convites</h2>
				<hr>
				<div class="row text-dark">
					
					<div class="col-6" >
						<h4 class="titulo">Convites Recebidos</h4>
						<?php 

							$contador = 0;
							//var_dump($mensagens);
							if(count($mensagens) > 0){
							echo '<div style="height: 18em; overflow-y: auto; overflow-x: hidden;">
								<div class="bg-info" style="margin: 1em 0; padding: 1em;">';
								for($i=0; $i<count($mensagens); $i++){

									if($mensagens[$i]->getRecebedor() == $_SESSION['login']){
									//$m = explode(';', $mensagens[$i]);
										$contador += 1;

									echo '<div class="row text-white" style="font-size: 0.9em;">
										<div class="col-md-3">
											<h5 class="titulo"><i class="fas fa-user"></i><p><a> @' . $mensagens[$i]->getEnviador() . '</a></p></h5>
										</div>
										<div class="col-md-4">
											<i></i>
											<h5 class="titulo">' . $mensagens[$i]->getMensagem() . '</h5>
										</div>
										<div class="col-md-4">
											<i></i>
											<h5 class="titulo"><i class="far fa-calendar-alt"></i>' . $mensagens[$i]->getData() . '</h5>
										</div>';
										if(get_class($mensagens[$i]) == 'Convites'){
											echo '<div class="col-md-1">
												<a href="#" onclick="dados_convite(\' dados-convite \')">
													<i id="change" style="font-size: 1.5em; color: white;" class="fas fa-angle-down"></i>
												</a>
											</div>';
										}

										echo '</div>';

									if(get_class($mensagens[$i]) == 'Convites'){
										echo '<div class="row" style="background-color:white;">
										<div id="dados-convite" style="display: none;">
											<div class="row p-3">
												<div class="col-md-6">
													<h5 class="titulo">Descrição</h5>
													<p>' . $boloes[intval($mensagens[$i]->getBolao())]->getDescricao() . '</p>

													<h5 class="titulo">Tipo de Aposta</h5>
													<p>'; 

													if($boloes[intval($mensagens[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
														echo 'Quem será que vai ganhar?';
													} elseif ($boloes[intval($mensagens[$i]->getBolao())]->getTipoAposta() == 'perder') {
														echo 'Quem será que vai perder/eliminado?';
													} elseif ($boloes[intval($mensagens[$i]->getBolao())]->getTipoAposta() == 'tema') {
														echo 'Qual será o tema da prova?';
													} else {
														echo 'Quais serão os ingredientes utilizados na prova?';
													}

													echo '</p>

												</div>
												<div class="col-md-6">
													<h5 class="titulo">Tipo de Jogo</h5>
													<ol style="font-family: robotok;">';
														$tipoJogo = $boloes[intval($mensagens[$i]->getBolao())]->getTipoJogo();
														//$tipoJogo = explode('-', $tipoJogo);
														if($tipoJogo[0] == '1'){
															echo '<li>Prova da Caixa Misteriosa</li>';
														} 
														if($tipoJogo[1] == '1'){
															echo '<li>Prova em Equipes</li>';
														} 
														if($tipoJogo[2] == '1'){
															echo '<li>Prova de Eliminação</li>';
														} 
														if($tipoJogo[3] == '1'){
															echo '<li>Prova de Repescagem</li>';
														} 
														if($tipoJogo[4] == '1'){
															echo '<li>Semifinal</li>';
														} 
														if($tipoJogo[5] == '1'){
															echo '<li>Final</li>';
														} 
													echo '</ol>

													<h5 class="titulo">Escolhas de Aposta</h5>
													<div class="px-3">
														<div class="row">
															<ul>';
																$escolha = $boloes[intval($mensagens[$i]->getBolao())]->getTipoJogo();
																for($j=0; $j<count($escolha)-1; $j++){
																	echo '<li>' . $escolha[$j] .'</li>';
																}
															echo '</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-auto ml-3 mb-3">
													<button class="btn btn-success" type="button" onclick = "participar()">Aceitar Convite</button>
													<button class="btn btn-danger" type="button">Recusar Convite</button>
												</div>
											</div>
										</div>
									</div>';
									}
								}
								}
								echo '</div></div>';
							} 

							if(count($mensagens) == 0 || $contador == 0){
								echo '<h3>Não há mensagens disponíveis</h3>';
							}
						?>
					</div>

					<div class="offset-1 col-4" style="border-left: 1px solid #c0c0c0; padding-left: 2.5em;">
						<h4 class="titulo">Convidar Amigos</h4>
						<form method="post" action="php/convidar-amigos.php">
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
									<button class="btn btn-info my-3 btn-block" type="submit">Convidar</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</section>

		

		<footer class="fixed-bottom" style="background-color: #B22222">
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

		<script type="text/javascript">
			function dados_convite(convite){
				if(document.getElementById(convite).style.display == "none"){
					document.getElementById(convite).style.display = "block";
				} else {
					document.getElementById(convite).style.display = "none";
				}
			}
		</script>


		 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
    	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

		<script type="text/javascript">
			
			$('#rg').mask('00.000.000-00');
			$('#cpf').mask('000.000.000-00');
			$('#ddn').mask('00/00/0000');
			$('#telefone').mask('+00 00 0000-0000');
			$('#celular').mask('+00 00 0 0000-0000');
			$('#agencia').mask('0000-0');
			$('#conta').mask('00000-0');

		</script>

	</body>

</html>