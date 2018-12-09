<?php
	
	require_once 'php/sistema.php';
	require_once 'php/bolao.php';
	require_once 'php/usuario.php';
	require_once 'php/jogo.php';


	session_start();

	$sistema = $_SESSION['sistema'];
	$boloes = $sistema->getBoloes();
	$usuarios = $sistema->getUsuarios();
	$jogos = $sistema->getJogos();

	$boloesEncerrados = array();

	$data1 = date('d/m/Y');
	$date = DateTime::createFromFormat('d/m/Y', $data1);
	$data1 = $date->format('Y-m-d');

	for($i=0; $i < count($boloes); $i++){
		$data2 = date('d/m/Y');
		$date = DateTime::createFromFormat('d/m/Y', $data2);
		$data2 = $date->format('Y-m-d');

		if(strtotime($data1) < strtotime($data2)){
			array_push($boloesEncerrados, $boloes[$i]);
		}
	}

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
						<li class="nav-item ml-2">POSIÇÃO: posição | </li>
						<li class="nav-item ml-2">PONTUAÇÃO: pontuação</li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong><?php echo $_SESSION['nome']; ?></strong></li>
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
			                	<a class="nav-link" href="index-pagina-pessoal.php">PÁGINA INICIAL</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="cadastrar-bolao.php">CRIAR BOLÃO</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link atual" href="meus-boloes.php">MEUS BOLÕES</a>
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

		<section id="boloes-disponiveis" class="scroll my-3">
			<div class="container">
				<h3 style="margin-left: 6.3em; font-family: robotok;">Em Aberto</h3>
				<?php
					if(count($boloes) > 0){
						for($i=0; $i < count($boloes); $i++){
							if($boloes[$i]->getCriador() == $_SESSION['login']){
								echo '<div class="row">
									<div class="col-md-2"></div>					
								<div class="col-md-8 bg-info" style="margin: 1em 0; padding: 1em;">
									<div class="row text-white">
										<div class="col-md-3">
											<h5 class="titulo"><i class="fas fa-user"></i> ' . count($boloes[$i]->getParticipantes()) . '/' . $boloes[$i]->getLimiteDeParticipantes() .'</h5>
										</div>
										<div class="col-md-3">
											<i></i>
											<h5 class="titulo">' . $boloes[$i]->getTitulo() . '</h5>
										</div>
										<div class="col-md-5">
											<i></i>
											<h5 class="titulo"><i class="far fa-calendar-alt"></i> ' . $boloes[$i]->getTempoLimite() . ' | <i class="far fa-clock"></i> 20h00</h5>
										</div>
										<div class="col-md-1">
											<a href="#;" onclick="dados_boloes(\'dados-boloes\')">
												<i id="change" style="font-size: 1.5em; color: white;" class="fas fa-angle-down"></i>
											</a>
										</div>
									</div>
									<div class="row" style="background-color:white;">
										<div class="container" id="dados-boloes" style="display: none;">
											<div class="row p-3">
												<div class="col-md-6">
													<h5 class="titulo">Descrição</h5>
													<p>' . $boloes[$i]->getDescricao() . '</p>
													<h5 class="titulo">Escolhas de Aposta</h5>
													<div class="px-3">
														<div class="row">';

														$escolha = $boloes[$i]->getOpcoesAposta();
														for($j=0; $j<count($escolha)-1; $j++){
															echo '<div class="col-4 alert alert-info text-center">
																<button type="button" class="close" data-dismiss="alert">&times;</button>' . $escolha[$j] .'</div>';
														}

														echo '</div>
													</div>
												</div>
												<div class="col-md-6">
													<h5 class="titulo">Tipo de Jogo</h5>
													<ol style="font-family: robotok;">';

													$tipoJogo = $boloes[$i]->getTipoJogo();
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

													<h5 class="titulo">Tipo de Aposta</h5>
													<p>';
													
													if($boloes[$i]->getTipoAposta() == 'ganhar'){
														echo 'Quem será que vai ganhar?';
													} elseif ($boloes[$i]->getTipoAposta() == 'perder') {
														echo 'Quem será que vai perder/eliminado?';
													} elseif ($boloes[$i]->getTipoAposta() == 'tema') {
														echo 'Qual será o tema da prova?';
													} else {
														echo 'Quais serão os ingredientes utilizados na prova?';
													}

													echo '</p>
												</div>
											</div>

											<div class="row px-3">
												<div class="col-12">
													<h5 class="titulo">Participantes</h5>
													<div class="px-3">
														<div class="row">';

														$participantes = $boloes[$i]->getParticipantes();
														if(count($participantes) == 0){
															echo '<p>Não há participantes</p>';
														}
														for($j=0; $j < count($participantes); $j++){

															echo '<div class="col-3 alert alert-info text-center">
																<button type="button" class="close" data-toggle="modal" data-target="#confirmar"><i class="fas fa-user-times text-danger"></i></button><p><a href="#">@';
									
																for($k=0; $k<count($usuarios); $k++){
																	if($usuarios[$k]->getCpf() == $boloes[$i]->getCriador()){
																		echo $usuarios[$k]->getUsername();
																		break;
																	}
																}

																echo '</a></p>
																<div id="confirmar" class="modal fade">
																	<div class="modal-dialog modal-dialog-centered">
																		<div class="modal-content text-center">
																			<div class="modal-header">
																				<h4 class="modal-title titulo">Deseja remover o usuário o bolão?</h4>
																				<button type="button" class="close" data-dismiss="modal">&times</button>
																			</div>
																			<div class="modal-body">
																				<button class="btn btn-success" type="button" class="close" data-dismiss="modal" onclick="$(".alert").hide()"><i class="fas fa-check"></i> Confirmar</button>
																				<button class="btn btn-danger" type="button" class="close" data-dismiss="modal"><i class="far fa-times"></i> Cancelar</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
														}
														echo '
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>';
							}
						}
					} else {
						echo '<h3 class="text-center">Não há bolões disponíveis</h3>';
					}
				?>
		</section>
		<div class="container">
			<hr>
		</div>

		<section id="boloes-passados" class="scroll">
			<div class="container">
				<h3 style="margin-left: 6.3em; font-family: robotok;">Encerrados</h3>
					<?php
						if(count($boloesEncerrados) > 0){
							for($i=0; $i < count($boloesEncerrados); $i++){
								if($boloesEncerrados[$i]->getCriador() == $_SESSION['login']){
									echo '<div class="row">
										<div class="col-md-2"></div>					
									<div class="col-md-8 justify-content-center" style="background-color: #D3D3D3; margin: 1em 0; padding: 1em;">
										<div class="row text-dark">
											<div class="col-md-3">
												<h5 class="titulo"><i class="fas fa-user"></i>' . count($boloesEncerrados[$i]->getParticipantes()) . '/' . $boloesEncerrados[$i]->getLimiteDeParticipantes() .'</h5>
											</div>
											<div class="col-md-3">
												<i></i>
												<h5 class="titulo">' . $boloesEncerrados[$i]->getTitulo() . '</h5>
											</div>
											<div class="col-md-5">
												<i></i>
												<h5 class="titulo"><i class="far fa-calendar-alt"></i> ' . $boloesEncerrados[$i]->getTempoLimite() . ' | <i class="far fa-clock"></i> 20h00</h5>
											</div>
											<div class="col-md-1">
												<a href="#" onclick="dados_boloes(\'dados-boloes\')">
													<i id="change" style="font-size: 1.5em; color: black;" class="fas fa-angle-down"></i>
												</a>
											</div>
										</div>
										<div class="row" style="background-color:black;">
											<div class="container" id="dados-boloes" style="display: none;">
												<div class="row p-3">
													<div class="col-md-6">
														<h5 class="titulo">Descrição</h5>
														<p>' . $boloesEncerrados[$i]->getDescricao() . '</p>
														<h5 class="titulo">Escolhas de Aposta</h5>
														<div class="px-3">
															<div class="row">';

															$escolha = $boloesEncerrados[$i]->getOpcoesAposta();
															for($j=0; $j<count($escolha); $j++){
																echo '<div class="col-4 alert alert-info text-center">
																	<button type="button" class="close" data-dismiss="alert">&times;</button>' . $escolha[$j] .'</div>';
															}

															echo '</div>
														</div>
													</div>
													<div class="col-md-6">
														<h5 class="titulo">Tipo de Jogo</h5>
														<ol style="font-family: robotok;">';

														$tipoJogo = $boloesEncerrados[$i]->getTipoJogo();
														$tipoJogo = explode('-', $tipoJogo);
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

														<h5 class="titulo">Tipo de Aposta</h5>
														<p>';
														
														if($boloesEncerrados[$i]->getTipoAposta() == 'ganhar'){
															echo 'Quem será que vai ganhar?';
														} elseif ($boloesEncerrados[$i]->getTipoAposta() == 'perder') {
															echo 'Quem será que vai perder/eliminado?';
														} elseif ($boloesEncerrados[$i]->getTipoAposta() == 'tema') {
															echo 'Qual será o tema da prova?';
														} else {
															echo 'Quais serão os ingredientes utilizados na prova?';
														}

														echo '</p>
													</div>
												</div>

												<div class="row px-3">
													<div class="col-12">
														<h5 class="titulo">Participantes</h5>
														<div class="px-3">
															<div class="row">';

															$participantes = $boloesEncerrados[$i]->getParticipantes();
															if(count($participantes) == 0){
																echo '<p>Não há participantes</p>';
															}
															for($j=0; $j < count($participantes); $j++){

																echo '<div class="col-3 alert alert-info text-center">
																	<button type="button" class="close" data-toggle="modal" data-target="#confirmar"><i class="fas fa-user-times text-danger"></i></button><p><a href="#">@';
										
																	for($k=0; $k<count($usuarios); $k++){
																		if($usuarios[$k]->getCpf() == $boloesEncerrados[$i]->getCriador()){
																			echo $usuarios[$jk]->getUsername();
																			break;
																		}
																	}

																	echo '</a></p>
																	<div id="confirmar" class="modal fade">
																		<div class="modal-dialog modal-dialog-centered">
																			<div class="modal-content text-center">
																				<div class="modal-header">
																					<h4 class="modal-title titulo">Deseja remover o usuário o bolão?</h4>
																					<button type="button" class="close" data-dismiss="modal">&times</button>
																				</div>
																				<div class="modal-body">
																					<button class="btn btn-success" type="button" class="close" data-dismiss="modal" onclick="$(".alert").hide()"><i class="fas fa-check"></i> Confirmar</button>
																					<button class="btn btn-danger" type="button" class="close" data-dismiss="modal"><i class="far fa-times"></i> Cancelar</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>';
															}


															echo '
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>';
								}
							}
						} else {
							echo '<h3 class="text-center">Não há bolões disponíveis</h3>';
						}
					?>
			</div>
		</section>

		<footer class="fixed-bottom" style="background-color: #B22222;">
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
							<a class="nav-link" data-toggle="modal" href="cadastro.php#termos">TERMOS E CONDIÇÕES</a>
						</li>
						<li class="nav-item ml-md-2">
							<a class="nav-link" href="#">REPORTAR BUGS</a>
						</li>
					</ul>
				</div>
			</nav>
		</footer>

		<script type="text/javascript">
			function dados_boloes(bolao){
				if(document.getElementById(bolao).style.display == "none"){
					document.getElementById(bolao).style.display = "block";
				} else {
					document.getElementById(bolao).style.display = "none";
				}
			}
		</script>




		 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>		
	</body>

</html>