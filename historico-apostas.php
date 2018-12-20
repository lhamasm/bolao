<?php
	
	require_once 'php/sistema.php';
	require_once 'php/bolao.php';
	require_once 'php/usuario.php';
	require_once 'php/jogo.php';

	require_once 'php/administrador-sistema.php';
	require_once 'php/administrador-bolao.php';
	//require_once 'php/index.php';


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
						<li class="nav-item"><strong>MASTERCHEF BRASIL 2018 - <?php echo $_SESSION['modalidade'] == 'amadores' ? 'AMADORES' : 'PROFISSIONAIS';?></strong> | </li>
						<li class="nav-item ml-2">POSIÇÃO: <?php echo $_SESSION["ranking"]; ?> | </li>
						<li class="nav-item ml-2">PONTUAÇÃO: <?php echo $_SESSION["pontuacao"]; ?></li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong> <?php echo $_SESSION["nome"]; ?></strong></strong></li>
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
			                	<a class="nav-link" href="index-pagina-pessoal.php">PÁGINA INICIAL</a>
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
			                	<a class="nav-link atual" href="historico-apostas.php">MEU HISTÓRICO DE APOSTAS</a>
			              	</li>
			            </ul>
					</div>
				</div>
			</nav>
		</section>

		<section class="my-3">
			<div class="container">
				<div class="row">
					<div class="col-2 offset-4">
						<form id="formulario">
							<div class="form-group">
								<label for="filtro">Filtrar por:</label>
								<select class="form-control custom-select" name="filtro" id="filtro">
									<option value="ano" selected>Ano</option>
									<option value="mes">Mês</option>
								</select>
							</div>
						</form>	
					</div>
				</div>

				<div id="year">
					<div class="row justify-content-center">
						<?php 

							if(file_exists('bd/apostas-' . $_SESSION['login'] . '.txt')){
								$sistema = $_SESSION['sistema'];
								//var_dump($sistema);
								$usuarios = $sistema->getUsuarios();

								for($i=0; $i<count($usuarios); $i++){
									if($usuarios[$i]->getCpf() == $_SESSION['login']){
										$apostas = $usuarios[$i]->getApostas();
										$_SESSION['ap'] = $apostas;
										break;
									}
								}

								if(count($apostas) > 0){
									$anos = array();
									for($i=0; $i<count($apostas); $i++){
										$data = $apostas[$i]->getData();
										$dados = explode('/', $data);
										if(!in_array($dados[2], $anos)){
											array_push($anos, $dados[2]);
										}
									}

									sort($anos);

									for($i=0; $i<count($anos); $i++){
										echo '<div class="col-1">
												<button class="btn btn-outline-info" type="button" onclick="ano()">' . $anos[$i] . '</button>
											</div>';
									}
								} else {
									echo '<h3 class="text-center"> Não há apostas disponíveis </h3>';
								}
							} else {
								echo '<h1>que merda mds</h1>';
							}
						?>
					</div>
				</div>

				<div id="month" style="display: none;">
					<div class="row justify-content-center mb-2">
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('janeiro')">JAN</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('fevereiro')">FEV</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('marco')">MAR</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('abril')">ABR</button>
						</div>
					</div>
					<div class="row justify-content-center mb-2">
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('maio')">MAI</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('junho')">JUN</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('julho')">JUL</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('agosto')">AGO</button>
						</div>
					</div>
					<div class="row justify-content-center mb-2">
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('setembro')">SET</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('outubro')">OUT</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('novembro')">NOV</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes('dezembro')">DEZ</button>
						</div>
					</div>
				</div>

				<div id="historico" style="display: none;">
					<div class="row">
						<div id="meses" class="carousel slide" data-ride="carousel" style="width:100vw;">
						  <div class="carousel-inner">
						  	<?php
						  		if(isset($_SESSION['ap'])){
						  			$apostas = $_SESSION['ap'];
						  		} else {
						  			$apostas = array();
						  		}
						  		$janeiro = array();
					  			$fevereiro = array();
					  			$marco = array();
					  			$abril = array();
					  			$maio = array();
					  			$junho = array();
					  			$julho = array();
					  			$agosto = array();
					  			$setembro = array();
					  			$outubro = array();
					  			$novembro = array();
					  			$dezembro = array();
						  		for($i=0; $i<count($apostas); $i++){
						  			$data = $apostas[$i]->getData();
						  			$dados = explode('/', $data);

						  			if($dados[1] == '01'){
						  				array_push($janeiro, $apostas[$i]);
						  			} elseif($dados[1] == '02') {
						  				array_push($fevereiro, $apostas[$i]);
						  			} elseif($dados[1] == '03') {
						  				array_push($marco, $apostas[$i]);
						  			}elseif($dados[1] == '04') {
						  				array_push($abril, $apostas[$i]);
						  			}elseif($dados[1] == '05') {
						  				array_push($maio, $apostas[$i]);
						  			}elseif($dados[1] == '06') {
						  				array_push($junho, $apostas[$i]);
						  			}elseif($dados[1] == '07') {
						  				array_push($julho, $apostas[$i]);
						  			}elseif($dados[1] == '08') {
						  				array_push($agosto, $apostas[$i]);
						  			}elseif($dados[1] == '09') {
						  				array_push($setembro, $apostas[$i]);
						  			}elseif($dados[1] == '10') {
						  				array_push($outubro, $apostas[$i]);
						  			}elseif($dados[1] == '11') {
						  				array_push($novembro, $apostas[$i]);
						  			}elseif($dados[1] == '12') {
						  				array_push($dezembro, $apostas[$i]);
						  			}
						  		}

					  			echo'
					  				<div id="janeiro" class="carousel-item active">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Janeiro
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($janeiro) > 0){
								    	echo '
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($janeiro); $i++){
								    					echo'
								    					<tr>';
								    						echo $janeiro[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($apostas[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $janeiro[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($janeiro[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($janeiro[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($janeiro[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($janeiro[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $janeiro[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo '</div>';

					  				echo'
					  				<div id="fevereiro" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Fevereiro
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($fevereiro) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($fevereiro); $i++){
								    					echo'
								    					<tr>';
								    						echo $fevereiro[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($fevereiro[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $fevereiro[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($fevereiro[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($fevereiro[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($fevereiro[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($fevereiro[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $fevereiro[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}
					  			echo '
								    </div>';

					  				echo'
					  				<div id="marco" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Março
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    	if(count($marco) > 0){
								    		echo '
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($marco); $i++){
								    					echo'
								    					<tr>';
								    						echo $marco[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($marco[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $marco[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($marco[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($marco[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($marco[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($marco[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $marco[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}
					  			echo '
								    </div>';

					  			
					  				echo'
					  				<div id="abril" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Abril
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($abril) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($abril); $i++){
								    					echo'
								    					<tr>';
								    						echo $abril[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($abril[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $abril[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($abril[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($abril[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($abril[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($abril[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $abril[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}
					  			echo '
								    </div>';

					  				echo'
					  				<div id="maio" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Maio
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($maio) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($maio); $i++){
								    					echo'
								    					<tr>';
								    						echo $maio[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($maio[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $maio[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($maio[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($maio[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($maio[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($maio[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $maio[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';

					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo '
					  				</div>';
					  			
					  				echo'
					  				<div id="junho" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Junho
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($junho) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($junho); $i++){
								    					echo'
								    					<tr>';
								    						echo $junho[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($junho[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $junho[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($junho[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($junho[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($junho[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($junho[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $junho[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
								    
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo '
					  			</div>';

					  				echo'
					  				<div id="julho" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Julho
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($julho) > 0){
								    	echo '
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($julho); $i++){
								    					echo'
								    					<tr>';
								    						echo $julho[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($julho[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $julho[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($julho[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($julho[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($julho[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($julho[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $julho[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo '
								    </div>';

					  				echo'
					  				<div id="agosto" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Agosto
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';

								    if(count($agosto) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($agosto); $i++){
								    					echo'
								    					<tr>';
								    						echo $agosto[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($agosto[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $agosto[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($agosto[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($agosto[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($agosto[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($agosto[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $agosto[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
								    
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo '</div>';

					  				echo'
					  				<div id="setembro" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Setembro
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($setembro) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($setembro); $i++){
								    					echo'
								    					<tr>';
								    						echo $setembro[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($setembro[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $setembro[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($setembro[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($setembro[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($setembro[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($setembro[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $setembro[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo '</div>';

					  				echo'
					  				<div id="outubro" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Outubro
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';

								    if(count($outubro) > 0){
								    	echo '
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($outubro); $i++){
								    					echo'
								    					<tr>';
								    						echo $outubro[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($outubro[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $outubro[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($outubro[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($outubro[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($outubro[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($outubro[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $outubro[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}
					  			echo '</div>';

					  				echo'
					  				<div id="novembro" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Novembro
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($novembro) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($novembro); $i++){
								    					echo'
								    					<tr>';
								    						echo $novembro[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($novembro[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $novembro[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($novembro[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($novembro[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($novembro[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($novembro[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $novembro[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}
					  			echo '</div>';

					  				echo'
					  				<div id="dezembro" class="carousel-item">
								    	<h1 class="text-center titulo text-dark">
								    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
												<i class="fas fa-angle-left"></i>
											</a>
											Dezembro
											<a class="ml-3 text-danger" href="#meses" data-slide="next">
								    			<i class="fas fa-angle-right"></i>
								  			</a>
								  		</h1>
								    	<hr>';
								    if(count($dezembro) > 0){
								    	echo'
								    	<div class="row">
								    		<div class="col-1 align-self-center" style="font-family: robotoBold;">
								    			<h6 class="text-center">DIA</h6>
								    			<h3 class="text-center">1</h3>
								    		</div>
								    		<div class="col-11">
								    			<table class="table text-center" style="font-family: robotok;">
								    				<thead class="thead-dark">
								    					<th>STATUS</th>
								    					<th>BOLÃO</th>
								    					<th>ESCOLHA DE APOSTA</th>
								    					<th>TIPO DE JOGO</th>
								    					<th>TIPO DE APOSTA</th>
								    					<th>VALOR</th>
								    				</thead>
								    				<tbody>';
								    				for($i=0; $i<count($dezembro); $i++){
								    					echo'
								    					<tr>
								    						<td>';

								    						echo $dezembro[$i]->getStatus() == 1 ? 'ATIVA' : 'CANCELADA';
								    						echo '</td>
								    						<td>' . $_SESSION['sistema']->getBoloes()[intval($dezembro[$i]->getBolao())]->getTitulo() . '</td>
									    					<td>' . $dezembro[$i]->getOpcaoDeAposta() . '</td>';

									    					$tipoJogo =  $_SESSION['sistema']->getBoloes()[intval($dezembro[$i]->getBolao())]->getTipoJogo();

									    					echo '<td>'; 

									    					$tipo = '';

									    					if($tipoJogo[0] == '1'){
									    						$tipo .= 'Caixa Misteriosa';
									    					}

									    					if($tipoJogo[1] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Equipes';
									    						} else {
									    							$tipo .= 'Equipes';
									    						}
									    					}

									    					if($tipoJogo[2] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Eliminação';
									    						} else {
									    							$tipo .= 'Eliminação';
									    						}
									    					}

									    					if($tipoJogo[3] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Repescagem';
									    						} else {
									    							$tipo .= 'Repescagem';
									    						}
									    					}

									    					if($tipoJogo[4] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Semifinal';
									    						} else {
									    							$tipo .= 'Semifinal';
									    						}
									    					}

									    					if($tipoJogo[5] == '1'){
									    						if($tipo != ''){
									    							$tipo .= '| Final';
									    						} else {
									    							$tipo .= 'Final';
									    						}
									    					}

									    			
									    					echo $tipo;

									    					echo '</td>
									    					<td>';

									    					if($_SESSION['sistema']->getBoloes()[intval($dezembro[$i]->getBolao())]->getTipoAposta() == 'ganhar'){
																echo 'Quem será que vai ganhar?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($dezembro[$i]->getBolao())]->getTipoAposta() == 'perder') {
																echo 'Quem será que vai perder/eliminado?';
															} elseif ($_SESSION['sistema']->getBoloes()[intval($dezembro[$i]->getBolao())]->getTipoAposta() == 'tema') {
																echo 'Qual será o tema da prova?';
															} else {
																echo 'Quais serão os ingredientes utilizados na prova?';
															}

															echo '</td>

									    					<td>' . $dezembro[$i]->getValor() . '</td>
								    					</tr>';
								    				}						
								    				echo '
								    				</tbody>
								    			</table>
								    		</div>
								    	</div>
								    	<hr>';
					  			} else {
					  				echo '<h3 class="text-center">Não há apostas registradas nesse mês</h3>';
					  			}

					  			echo'
								    </div>';
						  	?>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</section>

		 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
    	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    	 <script type="text/javascript">
			
			$('select').on('change', function() {
				if(this.value == 'ano'){
					document.getElementById('year').style.display = "block";
					document.getElementById('month').style.display = "none";
				} else if(this.value == 'mes') {
					document.getElementById('month').style.display = "block";
					document.getElementById('year').style.display = "none";
				} else {
					document.getElementById('month').style.display = "none";
					document.getElementById('year').style.display = "none";
				}
			});

			function ano() {
				document.getElementById('month').style.display = "block";
				document.getElementById('year').style.display = "none";
			}

			function mes(mes) {
				document.getElementById('month').style.display = "none";
				document.getElementById('formulario').style.display = "none";
				document.getElementById('historico').style.display = "block";
				
				if(mes == 'janeiro'){
					$('#'+mes).addClass('active');
					$('#feveiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'fevereiro'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'marco'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'abril'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'maio'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'junho'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'julho'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'agosto'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'setembro'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'outubro'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'novembro'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#fevereiro').removeClass('active');
					$('#dezembro').removeClass('active');
				} else if(mes == 'dezembro'){
					$('#'+mes).addClass('active');
					$('#janeiro').removeClass('active');
					$('#marco').removeClass('active');
					$('#abril').removeClass('active');
					$('#maio').removeClass('active');
					$('#junho').removeClass('active');
					$('#julho').removeClass('active');
					$('#agosto').removeClass('active');
					$('#setembro').removeClass('active');
					$('#outubro').removeClass('active');
					$('#novembro').removeClass('active');
					$('#fevereiro').removeClass('active');
				} 
			}
		</script>
	</body>

</html>