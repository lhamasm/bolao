<?php
	
	require_once 'php/sistema.php';
	require_once 'php/bolao.php';
	require_once 'php/usuario.php';
	require_once 'php/administrador-sistema.php';
	require_once 'php/apostador.php';
	require_once 'php/jogo.php';
	//require_once 'php/index.php';


	session_start();

	$sistema = $_SESSION['sistema'];
	$boloes = $sistema->getBoloes();
	$usuarios = $sistema->getUsuarios();
	$jogos = $sistema->getJogos();

	$boloesEncerrados = array();
	$data2 = date('Y-m-d');

	/*for($i = 0; $i < count($this->tipoJogo); $i++){
				for($j = 0; $j < count($jogos); $j++){
					if($this->tipoJogo[$i] == $jogos[$j]->getId()){
						if($jogos[$j]->getResultado() == ''){
							echo "O(s) resultado(s) do bolão ainda não estão disponíveis";
						}
					}
				}
			}*/


	for($i=0; $i<count($boloes)-1; $i++){
		$date = DateTime::createFromFormat('d/m/Y', $boloes[0]->getTempoLimite());
		$data1 = $date->format('Y-m-d');

		if($boloes[$i]->getCampeonato() == $_SESSION['modalidade'] && $data1 < $data2){
			array_push($boloesEncerrados, $boloes[$i]);
			array_splice($boloes, $i);
		}
	}

	//$data1 = date('Y-m-d');*/
	//$date = DateTime::createFromFormat('d/m/Y', $data1);
	//$data1 = $date->format('Y-m-d');
	//$data1 = date('Y-m-d', $data1);

	/*for($i=0; $i < count($boloes); $i++){
		$data2 = strtotime($boloes[$i]->getTempoLimite());
		//$data2 = $data2->format('Y-m-d');
		$data2 = date('Y-m-d',$data2);

		if($data1 < $data2){
			array_push($boloesEncerrados, $boloes[$i]);
		}
	}*/

	if(isset($_GET['a'])){
		$_SESSION['modalidade'] = $_GET['a'];
	}

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
						<li class="nav-item"><strong>MASTERCHEF BRASIL 2018 - <?php echo $_SESSION['modalidade'] == 'amadores' ? 'AMADORES' : 'PROFISSIONAIS';?></strong> | </li>
						<li class="nav-item ml-2">POSIÇÃO: <?php echo $_SESSION["ranking"]; ?> | </li>
						<li class="nav-item ml-2">PONTUAÇÃO: <?php echo $_SESSION["pontuacao"]; ?></li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong> <?php echo $_SESSION["nome"]; ?></strong></li>
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

		<section id="boloes-disponiveis">
			<div class="container">	
				<h2 class="my-3">Bolões Disponíveis</h2>
				<hr>
				<?php
				if(count($boloes) > 0){
					echo'<div class="container">
							<div class="row">';
								if($_SESSION['status'] == 1){
									echo '<div class="col-4 offset-1 alert alert-danger">
										  Senha incorreta.
										</div>
										<div class="col-4 offset-3">
									<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
								</div>';
								} elseif($_SESSION['status'] == 2){
									echo '<div class="col-4 offset-1 alert alert-danger">
										  Limite de participantes atingido.
										</div>
										<div class="col-4 offset-3">
									<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
								</div>';
								} elseif($_SESSION['status'] == 3){
									echo '<div class="col-4 offset-1 alert alert-success">
										  Aposta realizada com sucesso!
										</div>
										<div class="col-4 offset-3">
									<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
								</div>';
								} else {
									echo '<div class="col-4"></div>
									<div class="col-4 offset-4">
									<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterBolao" name="filterBolao">
								</div>';
								}
								$_SESSION['status'] = -1;
								echo '<div class="col-1"></div>
							</div>
						</div>
						<div id="carousel-noticias" class="carousel slide" data-ride="carousel">
						    <div class="row">		
						    	<div class="col-1">		    		
									<a class="carousel-control-prev" href="#carousel-noticias" data-slide="prev"><i class="fas fa-chevron-left" style="color: #A9A9A9; font-size: 2.5em;"></i></a>
								</div>
								<div class="col-10">
									<div class="carousel-inner">';
									$contador = 0;
									for($i=0; $i<count($boloes); $i+=3){
										if($boloes[$i]->getCampeonato() == $_SESSION['modalidade']){

											$contador += 1;
											if($contador == 1){
												echo'<div class="carousel-item active">
									    			<div class="row">';
									    	} else {
									    		echo'<div class="carousel-item">
									    			<div class="row">';
									    	}

									    		for($j=$i; $j<$i+3; $j++){
									    			if($j < count($boloes) && $boloes[$i]->getCampeonato() == $_SESSION['modalidade']){
									    				$contador++;

										    			echo '<div class="col-4">
											    				<div class="card">
											    					<div class="card-header" style="background-color: #FA8072">
											    						<div class="row">';

											    						if(intval($boloes[$j]->getTipo()) == 0){
											    							echo'<div class="col-2">
											    								<i class="fas fa-users py-2" data-toggle="tooltip" title="Público" data-placement="bottom"></i>
											    							</div>';
											    						}
											    					echo'	<div class="col-10">
												    							<h3 class="titulo">' . $boloes[$j]->getTitulo() . '</h3>
												    						</div>
											    						</div>	
											    					</div>
											    					<div class="card-body" style="background-color: #FFDAB9">
											    						<h6><strong>Descrição</strong></h6>
											    						<p>' . $boloes[$j]->getDescricao() . '</p>

											    						<h6><strong>Participantes</strong></h6>
											    						<p>' . count($boloes[$j]->getParticipantes()) . '/' . $boloes[$j]->getLimiteDeParticipantes() . '</p>

											    						<h6><strong>Data de Término</strong></h6>
											    						<p>' . $boloes[$j]->getTempoLimite() . ' | 20h00</p>
											    						<span data-target="#apostarB' . $boloes[$j]->getId() . '" data-toggle="modal">
											    							<button class="btn btn-danger" data-placement="bottom" data-toggle="tooltip" title="Apostar"><i class="fas fa-user-plus"></i></button>
											    						</span>
											    						<button data-target="#B'. $boloes[$j]->getId() . '" data-toggle="modal" class="btn btn-info"><i class="far fa-eye"></i></button>';

											    						if(in_array($_SESSION['login'], $boloes[$j]->getParticipantes())){
											    							echo '<span data-target="#convidarB' . $boloes[$j]->getId() . '" data-toggle="modal">
											    							<button class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Convidar Amigos"><i class="fas fa-envelope"></i></button>
											    						</span>';
											    						}
											    						echo '
											    					</div>
											    				</div>			    				
										    				</div>';
										    			}			
									    			}	    			
									    	echo'</div>
									    	</div>';
								    	}
								    }
									echo'</div>
								</div>
								<div class="col-1">
									<a class="carousel-control-next" href="#carousel-noticias" data-slide="next"><i class="fas fa-chevron-right" style="color: #A9A9A9; font-size: 2.5em;"></i></a>	
								</div>
							</div>
						</div>';		
				} else {
					echo '<h3 class="text-center">Não há bolões disponíveis</h3>';
				}

				?>
			</div>
		</section>

		<section id="ultimos-resultados" class="my-5 pt-3">
			
			<div class="container">
				<h2 class="my-3">Últimas Provas</h2>
				<hr>
				<div class="row">
					<div class="col-4">
						<a href="#" data-toggle="modal" data-target="#caixa">
							<img class="img-fluid rounded-circle" src="images/caixa-misteriosa.jpg">
							<h4 class="text-center my-2">Prova da Caixa Misteriosa</h4>
						</a>

						<div id="caixa" class="modal fade">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title"><strong>Últimos Resultados</strong></h4>
										<button type="button" class="close" data-dismiss="modal">&times</button>
									</div>
									<div class="modal-body">
										<?php
											$cont = 0;
											echo '<ul class="list-group list-group-flush">';
											for($i = 0; $i < count($jogos); $i++){
												if($jogos[$i]->getId() == '1'){
													$cont += 1;
													if($i == 0){
														echo '<li class="list-group-item list-group-item-info">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													} else {
														echo '<li class="list-group-item">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													}
												}
											}
											echo '</ul>';
											if($cont == 0){
												echo '<p>Não há resultados disponíveis para esse jogo</p>';
											}
										?>
									</div>
									<div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
						<a href="#" data-toggle="modal" data-target="#equipe">
							<img class="img-fluid rounded-circle" src="images/prova-equipes.jpg">
							<h4 class="text-center my-2">Prova em Equipes</h4>
						</a>

						<div id="equipe" class="modal fade">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title"><strong>Últimos Resultados</strong></h4>
										<button type="button" class="close" data-dismiss="modal">&times</button>
									</div>
									<div class="modal-body">
										<?php
											$count = 0;
											echo '<ul class="list-group list-group-flush">';
											for($i = 0; $i < count($jogos); $i++){
												if($jogos[$i]->getId() == '2'){
													$count += 1;
													$resultado = explode('-', $jogos[$i]->getResultado());
													if($count == 1){
														echo '<li class="list-group-item list-group-item-info">' . $jogos[$i]->getData() . ' - ' . $resultado[0] . ' <a href="#" onclick="participantes(\'equipe-' . $count . '\')"><i class="fas fa-plus-circle"></i></a></li>';
														echo '<div id="equipe-' . $count . '" style="display: none;">
																<ol class="list-group" style="font-family: robotok;">';

														for($j=1; $j<count($resultado); $j++){
															echo '<li class="list-group-item">' . $resultado[$j] . '</li>';
														}

														echo '</ol>
																</div>';
																
													} else {
														echo '<li class="list-group-item">' . $jogos[$i]->getData() . ' - ' . $resultado[0] . ' <a href="#" onclick="participantes("equipe-' . $count . '")"><i class="fas fa-plus-circle"></i></a></li>';
														echo '<div id="equipe-' . $count . '" style="display: none;">
																<ol class="list-group" style="font-family: robotok;">';

														for($j=1; $j<count($resultado); $j++){
															echo '<li class="list-group-item">' . $resultado[$j] . '</li>';
														}

														echo '</ol>
																</div>';
													}
												}
											}
											echo '</ul>';
											if($count == 0){
												echo '<p>Não há resultados disponíveis para esse jogo</p>';
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-4">
						<a href="#" data-toggle="modal" data-target="#eliminacao">
							<img class="img-fluid rounded-circle" src="images/prova-eliminacao.jpg">
							<h4 class="text-center my-2">Prova de Eliminação</h4>
						</a>

						<div id="eliminacao" class="modal fade">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title"><strong>Últimos Resultados</strong></h4>
										<button type="button" class="close" data-dismiss="modal">&times</button>
									</div>
									<div class="modal-body">
										<?php
											echo '<ul class="list-group list-group-flush">';
											$count = 0;
											for($i = 0; $i < count($jogos); $i++){
												if($jogos[$i]->getId() == '3'){
													$count += 1;
													if($count == 1){
														echo '<li class="list-group-item list-group-item-info">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													} else {
														echo '<li class="list-group-item">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													}
												}
											}
											echo '</ul>';
											if($count == 0){
												echo '<p>Não há resultados disponíveis para esse jogo</p>';
											}
										?>
									</div>
									<div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12 pt-3">
						<a class="text-dark" href="#" data-target="#outras" data-toggle="modal"><i class="far fa-plus-square text-danger"></i> Outras provas</a>
					</div>

					<div id="outras" class="modal fade">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><strong>Últimos Resultados</strong></h4>
									<button type="button" class="close" data-dismiss="modal">&times</button>
								</div>
								<div class="modal-body">
									
									<div class="btn-group mb-2">
										<button class="btn btn-danger" type="button" onclick="outros_resultados('r')">Repescagem</button>
										<button class="btn btn-danger" type="button" onclick="outros_resultados('s')">Semifinal </button>
										<button class="btn btn-danger" type="button" onclick="outros_resultados('f')">Final</button>
									</div>

									<div id="r" style="display: block;">
										<?php
											echo '<ul class="list-group list-group-flush">';
											$count = 0;
											for($i = 0; $i < count($jogos); $i++){
												if($jogos[$i]->getId() == '4'){
													$count += 1;
													if($count == 1){
														echo '<li class="list-group-item list-group-item-info">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													} else {
														echo '<li class="list-group-item">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													}
												}
											}
											echo '</ul>';
											if($count == 0){
												echo '<p>Não há resultados disponíveis para esse jogo</p>';
											}
										?>
									</div>

									<div id="s" style="display: none;">
										<?php
											echo '<ul class="list-group list-group-flush">';
											$count = 0;
											for($i = 0; $i < count($jogos); $i++){
												if($jogos[$i]->getId() == '5'){
													$count += 1;
													if($count == 1){
														echo '<li class="list-group-item list-group-item-info">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													} else {
														echo '<li class="list-group-item">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													}
												}
											}
											echo '</ul>';
											if($count == 0){
												echo '<p>Não há resultados disponíveis para esse jogo</p>';
											}
										?>
									</div>

									<div id="f" style="display: none;">
										<?php
											echo '<ul class="list-group list-group-flush">';
											$count = 0;
											for($i = 0; $i < count($jogos); $i++){
												if($jogos[$i]->getId() == '6'){
													$count += 1;
													if($count == 1){
														echo '<li class="list-group-item list-group-item-info">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													} else {
														echo '<li class="list-group-item">' . $jogos[$i]->getData() . ' - ' . $jogos[$i]->getResultado() . '</li>';
													}
												}
											}
											echo '</ul>';
											if($count == 0){
												echo '<p>Não há resultados disponíveis para esse jogo</p>';
											}
										?>
									</div>
								</div>
								<div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	

		</section>

		<section id="resultados-boloes" class="my-5 py-3">
			
			<div class="container">
				<h2 class="my-3">Resultados dos Bolões</h2>
				<hr>

				<?php 
				if(count($boloesEncerrados) > 0){
					echo'<div class="container">
						<div class="row">
							<div class="col-7"></div>
							<div class="col-4 ml-2">
								<input class="filterBolao" type="text" placeholder="Buscar Bolão por Nome..." id="filterR" name="filterR">
							</div>
							<div class="col-1"></div>
						</div>
					</div>
					<div id="carousel-boloes-resultado" class="carousel slide" data-ride="carousel">
					    <div class="row">		
					    	<div class="col-1">		    		
								<a class="carousel-control-prev" href="#carousel-boloes-resultado" data-slide="prev"><i class="fas fa-chevron-left" style="color: #A9A9A9; font-size: 2.5em;"></i></a>
							</div>
							<div class="col-10">
								<div class="carousel-inner">';
								$contador = 0;
								for($i=0; $i<count($boloesEncerrados); $i+=3){
									if($boloesEncerrados[$i]->getCampeonato() == $_SESSION['modalidade']){
										$contador += 1;
										if($contador == 1){
											echo '<div class="carousel-item active">';
										} else {
											echo '<div class="carousel-item">';
										}
								    	echo'<div class="row">';
								    	for($j=$i; $j<$i+3; $j++){
								    		if($j < count($boloesEncerrados) && $boloesEncerrados[$j]->getCampeonato() == $_SESSION['modalidade']){
									    		echo'<div class="col-4">
									    				<div class="card">
									    					<div class="card-header bg-dark">
									    						<div class="row">';
									    						if($boloesEncerrados[$j]->getTipo() == '0'){
									    							echo'
									    							<div class="col-2">
									    								<i class="fas fa-users py-2 text-white"></i>
									    							</div>';
									    						}
									    						echo'
									    							<div class="col-10">
										    							<h3 class="titulo text-white">' . $boloesEncerrados[$j]->getTitulo() . '</h3>
										    						</div>
									    						</div>	
									    					</div>
									    					<div class="card-body text-center" style="background-color: #F5F5F5">
									    						<i class="fas fa-trophy" style="color:#FFD700"></i>
									    						<h6><strong>Ganhadores</strong></h6>
									    						<p>';

									    						$ganhadores = $boloesEncerrados[$j]->determinarVencedor($jogos, $usuarios);
									    						 
									    						 for($k=0; $k<count($ganhadores)-1; $k++){
									    						 	echo $ganhadores[$k] . ' |';
									    						 }
									    						 if(count($ganhadores) > 0){
									    						 	echo $ganhadores[count($ganhadores)-1];
									    						 } else {
									    						 	echo 'Não há ganhadores';
									    						 }

									    						echo'
									    						</p>

									    						<h6><strong>Prêmio</strong></h6>
									    						<p>';

									    						echo $boloesEncerrados[$j]->calcularValorVencedor($jogos, $usuarios) == -1 ? '-' : 'R$ ' . $boloesEncerrados[$j]->calcularValorVencedor($jogos, $usuarios);
									    						echo 
									    						'</p>

									    						<h6><strong>Descrição</strong></h6>
									    						<p>';

									    						echo  $boloesEncerrados[$j]->getDescricao() != '' ?  $boloesEncerrados[$j]->getDescricao() : '-';

									    						echo 
									    						'</p>
									    					</div>
									    				</div>				    				
									    			</div>';		
								    		}	
								    	}	    			
								    	echo'
								    		</div>
								    	</div>';	  
							    	}
							    }  		
								echo'
								</div>
							</div>
							<div class="col-1">
								<a class="carousel-control-next" href="#carousel-boloes-resultado" data-slide="next"><i class="fas fa-chevron-right" style="color: #A9A9A9; font-size: 2.5em;"></i></a>	
							</div>
						</div>
					</div>';
				} else {
					echo '<h3 class="text-center">Não há bolões disponíveis</h3>';
				}
				?>
			</div>	
		</section>

		<?php
			for($i=0; $i<count($boloes); $i++){
			echo '<div id="apostarB' . $boloes[$i]->getId() .'" class="modal">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header text-center justify-content-center">
							<div class="col-2"></div>
							<h5 class=" col-8 modal-title">' . $boloes[$i]->getTitulo() . '</h5>
							<button type="button" class="col-2 close" data-dismiss="modal">&times</button>
						</div>
						<div class="modal-body" style="background-color: #F8F8FF">';

							echo '<form method="post" action="php/apostar.php">
								<div id="formApostarApostaB' . $boloes[$i]->getId() .'">';
									
									if($boloes[$i]->getTipo() == '1'){
									echo
									'<div class="row">
										<div class="form-group">
											<label for="senha-bolao">Senha do Bolão:</label>
											<input class="form-control" type="password" id="senha-bolao" name="senha-bolao" required>
										</div>
									</div>';
									}

									echo '
									<div class="row">
										<div class="col-6 form-group">
											<label for="valoraposta">Valor:</label>
											<input class="valoraposta form-control" type="texts" id="valoraposta" name="valoraposta" required>
										</div>

										<div class="col-6 form-group">
											<label for="opcaoaposta">Aposta:</label><br>
											<select class="form-control custom-select" name="opcaoaposta" id="opcaoaposta" onclick="opcao_aposta()" required>';
											
											if($boloes[$i]->getTipoAposta() == 'ganhador' || $boloes[$i]->getTipoAposta() == 'perdedor'){
												echo'
													<option value="adriana">Adriana</option>
													<option value="alex">Alex</option>
													<option value="andre">André</option>
													<option value"andrer">André R.</option>
													<option value="daniel">Daniel</option>
													<option value="heaven">Heaven</option>
													<option value="manuela">Manuela</option>
													<option value="marcela">Marcela</option>
													<option value="paulo">Paulo</option>
													<option value="rafael">Rafael</option>
													<option value="roberta">Roberta</option>
													<option value="simone">Simone</option>
													<option value="thalles">Thalles</option>
													<option value="william">William</option>
												';
											} elseif($boloes[$i]->getTipoAposta() == 'tema'){
												echo '
													<option value="arabe">Árabe</option>
													<option value="confeitaria">Confeitaria</option>
													<option value="judaica">Judaica</option>
													<option value="nordestina">Nordestina</option>
													<option value="tailandesa">Tailandesa</option>
													<option value="outro">Outra</option>
												';
											} else {
												echo'
													<option value="cebola">Cebola</option>
													<option value="chocolate">Chocolate</option>
													<option value="fermentados">Fermentados</option>
													<option value="ovo">Ovo</option>
													<option value="sal">Sal</option>
													<option value="outro">Outro</option>
												';
											}

											echo
											'</select>
										</div>
										<div id="outraopcao" class="offset-6 col-6 form-group" style="display: none;">
											<input type="text" id="outro" name="outro" class="form-control">
										</div>
									</div>';

									echo '
									<div class="text-center justify-content-center">
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
												
											</div>
										</div>
										<button type="button" onclick="participantes(\'formApostarBancoB' . $boloes[$i]->getId() . '\'), participantes(\'formApostarApostaB' . $boloes[$i]->getId() . '\')" class="mt-2 btn btn-danger">Prosseguir</button>
									</div>
								</div>

								<div id="formApostarBancoB' . $boloes[$i]->getId() .'" style="display: none;">
									<div class="form-group">
										<label for="banco">Banco:</label><br>
										<input type="text" id="banco" name="banco" readonly value="' . $_SESSION["banco"] . '">
									</div>
									<div class="form-group">
										<label for="agencia">Agência:</label><br>
										<input type="text" id="agencia" name="agencia" readonly value="' . $_SESSION["agencia"] . '">
									</div>
									<div class="form-group">
										<label for="conta">Conta:</label><br>
										<input type="text" id="conta" name="conta" readonly value="' . $_SESSION["conta"] . '">
									</div>
									<div class="text-center justify-content-center">
										<div class="progress">
											<div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
											</div>
										</div>
										<input type="hidden" id="bolao-id" name="bolao-id" value="' . $i .'">
										<button type="submit" class="mt-2 btn btn-danger">Confirmar</button>
										<a class="mt-2 btn-outline-danger btn" href="minha-conta.php#banco">Editar informações</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>';
			}
		?>

		<?php 
			for($i = 0; $i < count($boloes); $i++){
				echo '<div id="B' . $boloes[$i]->getId() . '" class="modal">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header text-center justify-content-center">
								<div class="col-2"></div>
								<h4 class="modal-title col-8 titulo"><stronger>' . $boloes[$i]->getTitulo() . '</stronger></h4>
								<button class="close col-2" data-dismiss="modal">&times</button>
							</div>
							<div class="modal-body p-4" style="background-color: #F8F8FF; height: 30em; overflow-y: auto;">
								<div>
									<h5 class="titulo"><stronger>Criador</stronger></h5>
									<p><a href="#">@';
									
								for($j=0; $j<count($usuarios); $j++){
									if($usuarios[$j]->getCpf() == $boloes[$i]->getCriador()){
										echo $usuarios[$j]->getUsername();
										break;
									}
								}

								echo '</a></p>
								</div>
								<div>
									<h5 class="titulo"><stronger>Descrição</stronger></h5>
									<p align="justify">' . $boloes[$i]->getDescricao() . '</p>
								</div>
								<div>
									<h5 class="titulo"><stronger>Tipos de Jogo</stronger></h5>
									<ul>';

									$tipoJogo = $boloes[$i]->getTipoJogo();
									$cont = 0;
									if(isset($tipoJogo[0]) && $tipoJogo[0] == '1'){
										echo '<li><p>Prova da Caixa Misteriosa</p></li>';
									} else {
										$cont++;
									}
									if(isset($tipoJogo[1]) && $tipoJogo[1] == '1'){
										echo '<li><p>Prova em Equipes</p></li>';
									} else {
										$cont++;
									}
									if(isset($tipoJogo[2]) && $tipoJogo[2] == '1'){
										echo '<li><p>Prova de Eliminação</p></li>';
									} else {
										$cont++;
									}
									if(isset($tipoJogo[3]) && $tipoJogo[3] == '1'){
										echo '<li><p>Prova de Repescagem</p></li>';
									} else {
										$cont++;
									}
									if(isset($tipoJogo[4]) && $tipoJogo[4] == '1'){
										echo '<li><p>Semifinal</p></li>';
									} else {
										$cont++;
									}
									if(isset($tipoJogo[5]) && $tipoJogo[5] == '1'){
										echo '<li><p>Final</p></li>';
									} else {
										$cont++;
									}

									if($cont == 6){
										echo 'Não há jogos cadastrados para esse bolão';
									}
										
									echo '</ul>
								</div>
								<div>
									<h5 class="titulo"><stronger>Tipo de Apostas</stronger></h5>
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

								echo '</p></div>
								<div>
									<h5 class="titulo"><stronger>Número de Participantes</stronger></h5>
									<p>' . count($boloes[$i]->getParticipantes()) . '/' . $boloes[$i]->getLimiteDeParticipantes() . '</p>
								</div>
								<div>
									<h5 class="titulo"><stronger>Data de Término</stronger></h5>
									<p>' . $boloes[$i]->getTempoLimite() . ' | 20h00' . '</p>
								</div>
							</div>
							<div class="modal-footer">
								
							</div>
						</div>
					</div>
				</div>';
			}
		?>

		<?php 
			for($i = 0; $i < count($boloes); $i++){
				echo '<div id="convidarB' . $boloes[$i]->getId() . '" class="modal">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header text-center justify-content-center">
								<div class="col-2"></div>
								<h4 class="modal-title col-8 titulo"><stronger>Convidar Amigos</stronger></h4>
								<button class="close col-2" data-dismiss="modal">&times</button>
							</div>
							<div class="modal-body p-4" style="background-color: #F8F8FF; overflow-y: auto;">
								<form class="p-4" method="post" action="php/convidar-amigos.php">
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
										<input type="hidden" id="bolao-identificador" name="bolao-identificador" value="' . $i . '">
									</div>

									<div class="modal-footer">
										<div class="form-group">
											<button class="btn btn-info my-3 btn-block" type="submit">Convidar</button>
										</div>
									</div>	
								</form>
							</div>
						</div>
					</div>
				</div>';
			}
		?>

		<div class="modal" id="termos">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">

    				<div class="modal-header text-center">
    					<div class="col-2"></div>
    					<h4 class="col-8 modal-title w-100">Termos e Condições</h4>
    					<button type="button" class="col-2 close" data-dismiss="modal">&times;</button>
    				</div>
    				
    				<div class="altura modal-body">
    						<p align="justify">Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus. lectus vestibulum volutpat metus curae laoreet sollicitudin fames bibendum commodo, ultricies facilisis scelerisque cubilia bibendum per nisl lorem, vestibulum convallis aliquam turpis sapien rutrum non tortor. elit non id tempor duis ornare justo dui curabitur senectus, scelerisque feugiat commodo molestie vestibulum egestas rhoncus mi, maecenas senectus rhoncus quis suscipit nullam eros viverra. </p>

							<p align="justify">Habitant aptent fames conubia bibendum in praesent bibendum dictum est, risus venenatis mi eget lacus sem rutrum ligula curabitur feugiat, congue risus massa a lorem ornare tellus potenti. dapibus pharetra potenti egestas vivamus sollicitudin euismod tincidunt sed volutpat est nostra viverra imperdiet, lobortis nam mauris porta metus donec venenatis varius etiam aliquam elementum. amet neque proin lacinia phasellus neque proin class cursus augue, aliquam aptent hendrerit pharetra imperdiet ac aliquam magna at, torquent molestie viverra rutrum donec turpis fringilla eget. taciti amet vitae lobortis nibh primis rutrum maecenas donec, massa enim feugiat hendrerit porta vehicula at cras, quisque nam ligula ad leo felis purus. </p>

							<p align="justify">Senectus primis nostra turpis lorem fames ante class, ornare ante purus curabitur condimentum aenean eu lorem, sem morbi erat dapibus dictum imperdiet. nullam ad donec magna accumsan elit varius condimentum, pellentesque lectus nec feugiat conubia rutrum sociosqu non, est blandit eget tellus habitant condimentum. leo sit consequat aliquam phasellus facilisis mollis est nostra aenean tempor porta interdum, hendrerit faucibus morbi venenatis augue congue dolor feugiat malesuada sed. in pharetra cubilia cras ante nec tortor, ullamcorper fringilla fusce at eu laoreet quam, eu suspendisse tortor bibendum himenaeos. eu accumsan tristique ipsum lectus lobortis volutpat tellus habitasse lobortis egestas tempor a vitae justo augue velit, non accumsan porta ad felis pulvinar leo pretium cursus et proin eu vestibulum bibendum. </p> 

							<p align="justify">Fermentum est nisl elit conubia platea amet mattis vitae curabitur facilisis quam, metus tempus a suscipit accumsan curabitur aptent ut orci. conubia vivamus interdum sodales ac erat quis, malesuada convallis posuere dictum urna quisque, cras aenean euismod lacinia etiam. amet rutrum inceptos pretium eu nullam blandit nisi condimentum, tempus quam justo metus cras fringilla nec feugiat, semper lectus eleifend varius cursus a etiam potenti, hendrerit rutrum urna habitant risus luctus sollicitudin. fusce id fringilla lobortis neque eget sem elementum, quis lacus euismod eros tempus dolor curabitur tempor, feugiat libero mauris leo sociosqu turpis. </p>

							<p align="justify">Aliquet imperdiet luctus at arcu porta sodales lacinia, nullam hendrerit justo luctus iaculis egestas fermentum, venenatis vestibulum primis cursus sed et. pulvinar dolor fames nulla suscipit cras lacus bibendum, suscipit proin tortor aptent vel malesuada, consectetur netus nisl nec tellus volutpat. malesuada sociosqu aptent neque sagittis semper risus cubilia eros praesent taciti diam nostra in donec volutpat ac torquent auctor augue habitant, etiam elit molestie semper nunc nostra nulla phasellus aliquam habitasse mi vitae conubia cras mollis pellentesque ac libero feugiat .</p>
    				</div>

    				<div class="modal-footer">
    					
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- modal reportar bugs -->
    	<div class="modal" id="repbugs">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<div class="modal-header text-center">
    					<div class="col-2"></div>
    					<h5 class="col-8 modal-title">Reportar Bugs</h5>
    					<button class="col-2 close" onclick="resetarform('formAddCamp')" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">
    					<div>
    						<form>
    							<div class="form-group">
    								<label for="localbug">Onde ocorreu o bug?</label>
    								<input class="form-control" type="text" name="localbug" id="localbug" required>
    							</div>
    							<div class="form-group">
    								<label for="descricaobug">Descreva o bug:</label>
    								<textarea class="form-control" rows="3" id="descricaobug" name="descricaobug" required></textarea>
    							</div>
    							<div class="form-group">
    								<label for="acrescinfobug">Algo a acrescentar?</label>
    								<input class="form-control" type="text" name="acrescinfobug" id="acrescinfobug" required>
    							</div>
    							<div class="text-center justify-content-center">
    								<input class="btn btn-danger" type="submit" title="Enviar" name="Enviar">
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

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
							<a class="nav-link" data-target="#termos" data-toggle="modal">TERMOS E CONDIÇÕES</a>
						</li>
						<li class="nav-item ml-md-2">
							<a class="nav-link" data-toggle="modal" data-target="#repbugs">REPORTAR BUGS</a>
						</li>
					</ul>
				</div>
			</nav>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
		<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  

		<script type="text/javascript">
			function participantes(equipe) {
				if(document.getElementById(equipe).style.display == "none"){
					document.getElementById(equipe).style.display = "block";
				} else {
					document.getElementById(equipe).style.display = "none";
				}
			}

			jQuery.expr[':'].contains = function(a, i, m) { // case insensitive function 'contains'
  				return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
			};

			$('#filterBolao').on('keyup',function () { //filter using 'contains'
  				var filter = $(this).val();
  				console.log(filter);
    			$('#boloes-disponiveis').find(".titulo:not(:contains(" + filter + "))").parents("div.card").css('display','none');
    			$('#boloes-disponiveis').find(".titulo:contains(" + filter + ")").parents("div.card").css('display','');
			});

			$('#filterR').on('keyup',function () { // filter using 'contains'
  				var filter = $(this).val().toUpperCase();
  				console.log(filter);
    			$('#resultados-boloes').find(".titulo:not(:contains(" + filter + "))").parents("div.card").css('display','none');
    			$('#resultados-boloes').find(".titulo:contains(" + filter + ")").parents("div.card").css('display','');
			});

			$(document).ready(function(){
    			$('[data-toggle="tooltip"]').tooltip();
			});

			function hide(ash){
				document.getElementById(ash).style.display = "none";
			}

			function show(ash){
				document.getElementById(ash).style.display = "";
			}

			$('.valoraposta').mask('#.#00,00', {reverse : true});

			/*document.getElementById("ajuda").onclick = function(){
	        	var div = this.parentElement;
	        	div.style.opacity = "0";
	        	setTimeout(function(){ div.style.display = "none"; }, 600);
	    	}*/

	    	function outros_resultados(modalidade){
	    		document.getElementById(modalidade).style.display = 'block';
	    		if(modalidade == 'r'){
	    			document.getElementById('s').style.display = 'none';
	    			document.getElementById('f').style.display = 'none';
	    		} else if(modalidade == 's'){
	    			document.getElementById('r').style.display = 'none';
	    			document.getElementById('f').style.display = 'none';
	    		} else {
	    			document.getElementById('s').style.display = 'none';
	    			document.getElementById('r').style.display = 'none';
	    		}
	    	}

	    	function opcao_aposta(){
	    		if(document.getElementById('opcaoaposta').value == 'outro') {
	    			document.getElementById('outraopcao').style.display = 'block';
	    		} else {
	    			document.getElementById('outraopcao').style.display = 'none';

	    		}	
	    	}
	    
		</script>

	</body>

</html>