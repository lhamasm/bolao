<?php

	require_once 'php/sistema.php';
	require_once 'php/administrador.php';
	require_once 'php/administrador-sistema.php';
	require_once 'php/apostador.php';
	require_once 'php/administrador-bolao.php';

	session_start();

	$sistema = $_SESSION['sistema'];
?>

<!doctype html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta author="Larissa Machado && Sabrina Sales">
		<title>Bolão MasterChef Brasil - Administração</title>

		<!-- Icone da aba -->
		<link rel="icon" href="images/logo-vermelho.png">
	    <link rel="stylesheet" type="text/css" href="css/style-pagina-pessoal.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!-- Google Font -->
	    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
	</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-lg text-white navbar-light" style="font-size: 0.9em;">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item"><strong>MASTERCHEF BRASIL 2018
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong>ADM</strong></li>
						<!-- bugs && convites -->
						<li class="nav-item ml-3"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Caixa de mensagens"><i class="far fa-envelope text-white"></i></a></li>
						<!-- minha conta -->
						<li class="nav-item ml-3"><a href="#"><i class="far fa-user text-white"></i></a></li>
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
			        		<li class="nav-item ml-3">
			        			<a class="nav-link" onclick="show_plz('paginaInicial')" href="#">PÁGINA PRINCIPAL</a>
			        		</li>

			              	<li class="nav-item ml-3">
			              		<a class="nav-link" onclick="show_plz('cadastrarResultados')" href="#">CADASTRAR RESULTADOS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" onclick="show_plz('criarBolao')" href="#">CRIAR BOLÃO</a>
			              	</li>

			              	<li class="nav- ml-3">
			              		<a class="nav-link" onclick="show_plz('usuarios')" href="#">USUÁRIOS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			              		<a class="nav-link" onclick="show_plz('boloes')" href="#">BOLÕES</a>
			              	</li>
			            </ul>
					</div>
				</div>
			</nav>
		</section>

		<section id="paginaInicial">
			<div class="container">
				<div class="row">

					<!-- menu -->
					<div class="col-3 menu">
						<button class="botao" onclick="show_plz('divCampeonato')">Campeonato</button><br>
						<button class="botao" onclick="show_plz('divParticipantes')">Participantes</button><br>
						<button class="botao" onclick="show_plz('divRanking')">Rankings</button><br>
						<button class="botao" onclick="show_plz('divNoticias')">Notícias</button><br>
					</div>

					<?php

						if(isset($_SESSION['status']) && $_SESSION['status'] == 4){
		                  echo '
		                  <div class="col-8 division">
			                  <div class="alert alert-success text-center" style="width: 20em;">
			                    Bolão cadastrado com sucesso
			                  </div>
			              <div>'; 
		                }

					?>

					<!-- seção noticias -->
					<div id="divNoticias" class="col-8 division" style="display: none;">
						<h4 style="display: inline">Campeonato: </h4> <h5 style="color: #484848; display: inline">Profissionais </h5>
						<button class="btn btn-info" data-toggle="modal" data-target="#addnoticia" style="margin: 1em; display: block;"><i class="fas fa-plus mr-2"></i>Adicionar Notícia</button><br>

						<!-- noticias visiveis -->
						<div id="notEscondidos">
							<h5 class="ml-3">Visíveis</h5>
							<button data-toggle="modal" data-target="#dynamicmodal" class="linksmenu openmodal">Internet vai à loucura e comemora eliminação de Thales</button>
							<button class="umbotao ml-2" onclick="mudar_vizualizacao_noticia('notEscondidos', 'Internet vai à loucura e comemora eliminação de Thales')" data-toggle="tooltip" data-placement="bottom" title="Esconder Notícia"><i class="fas fa-eye-slash"></i></button>
							<span data-toggle="modal" data-target="#sure">
								<button class="umbotao ml-2" onclick="mensagemsure('essa notícia')" data-toggle="tooltip" data-placement="bottom" title="Excluir Notícia"><i class="fas fa-times"></i></button>
							</span>
							<button data-toggle="modal" data-target="#dynamicmodal" class="linksmenu openmodal">Cozinheiros preparam pratos monocromáticos para eliminação</button>
							<button class="umbotao ml-2" onclick="mudar_vizualizacao_noticia('notEscondidos', 'Cozinheiros preparam pratos monocromáticos para eliminação')" data-toggle="tooltip" data-placement="bottom" title="Esconder Notícia"><i class="fas fa-eye-slash"></i></button>
							<span data-toggle="modal" data-target="#sure">
								<button class="umbotao ml-2" onclick="mensagemsure('essa notícia')" data-toggle="tooltip" data-placement="bottom" title="Excluir Notícia"><i class="fas fa-times"></i></button>
							</span>
							<button data-toggle="modal" data-target="#dynamicmodal" class="linksmenu openmodal">Participantes cozinham em meio à natureza e precisam fazer o próprio fogo</button>
							<button class="umbotao ml-2" onclick="mudar_vizualizacao_noticia('notEscondidos', 'Participantes cozinham em meio à natureza e precisam fazer o próprio fogo')" data-toggle="tooltip" data-placement="bottom" title="Esconder Notícia"><i class="fas fa-eye-slash"></i></button>
							<span data-toggle="modal" data-target="#sure">
								<button class="umbotao ml-2" onclick="mensagemsure('essa notícia')" data-toggle="tooltip" data-placement="bottom" title="Excluir Notícia"><i class="fas fa-times"></i></button>
							</span>
						</div>

						<!-- noticias não  visiveis -->
						<div id="notVisiveis">
							<h5 class="ml-3 mt-3">Escondidos</h5>
						</div>
					</div>

					<!-- seção rankings -->
					<div id="divRanking" class="col-8 division" style="display: none;">
						<h4 style="display: inline">Campeonato: </h4> <h5 style="color: #484848; display: inline">Profissionais </h5>
						<table id="myt" class="mt-2">
							<tbody>
								<tr>
									<td>Fulano</td>
									<td><strong>R$</strong><span contenteditable="true" class="changeable">86585</span></td>
								</tr>
								<tr>
									<td>Beltrano</td>
									<td><strong>R$</strong><span contenteditable="true" class="changeable">56786</span></td>
								</tr>
								<tr>
									<td>Sicrano</td>
									<td><strong>R$</strong><span contenteditable="true" class="changeable">564648</span></td>
								</tr>
								<tr>
									<td>Fulano</td>
									<td><strong>R$</strong><span contenteditable="true" class="changeable">53446</span></td>
								</tr>
								<tr>
									<td>Beltrano</td>
									<td><strong>R$</strong><span contenteditable="true" class="changeable">18894</span></td>
								</tr>
								<tr>
									<td>Sicrano</td>
									<td><strong>R$</strong><span contenteditable="true" class="changeable">876886</span></td>
								</tr>
							</tbody>
						</table>
					</div>

					<!-- seção participantes -->
					<div id="divParticipantes" class="col-8 division" style="display: none;">
						<h4 style="display: inline">Campeonato: </h4> <h5 style="color: #484848; display: inline">Profissionais </h5>
						<div class="card-columns mt-4">
							<div class="card">
								<div contentEditable="true" class="p-1 card-header text-center justify-content-center">
									Fulano
								</div>
								<div class="card-body p-1 text-center justify-content-center">
									<img class="card-img-top" src="images/adriana.jpg" style="width: 8em; heigth: 8em;">
									<p contentEditable="true" align="justify" style="font-size: 0.7em;" class="card-text"> Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus.</p>
								</div>
								<div class="card-footer p-1 text-center justify-content-center">
									<a href="#" class="card-link">Link do Perfil</a>
								</div>
							</div>
							<div class="card">
								<div contentEditable="true" class="p-1 card-header text-center justify-content-center">
									Beltrano
								</div>
								<div class="card-body p-1 text-center justify-content-center">
									<img class="card-img-top" src="images/adriana.jpg" style="width: 8em; heigth: 8em;">
									<p contentEditable="true" align="justify" style="font-size: 0.7em;" class="card-text"> Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus.</p>
								</div>
								<div class="card-footer p-1 text-center justify-content-center">
									<a href="#" class="card-link">Link do Perfil</a>
								</div>
							</div>
							<div class="card">
								<div contentEditable="true" class="p-1 card-header text-center justify-content-center">
									Sicrano
								</div>
								<div class="card-body p-1 text-center justify-content-center">
									<img class="card-img-top" src="images/adriana.jpg" style="width: 8em; heigth: 8em;">
									<p contentEditable="true" align="justify" style="font-size: 0.7em;" class="card-text"> Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus.</p>
								</div>
								<div class="card-footer p-1 text-center justify-content-center">
									<a href="#" class="card-link">Link do Perfil</a>
								</div>
							</div>
							<div class="card">
								<div contentEditable="true" class="p-1 card-header text-center justify-content-center">
									Fulano
								</div>
								<div class="card-body p-1 text-center justify-content-center">
									<img class="card-img-top" src="images/adriana.jpg" style="width: 8em; heigth: 8em;">
									<p contentEditable="true" align="justify" style="font-size: 0.7em;" class="card-text"> Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus.</p>
								</div>
								<div class="card-footer p-1 text-center justify-content-center">
									<a href="#" class="card-link">Link do Perfil</a>
								</div>
							</div>
							<div class="card">
								<div contentEditable="true" class="p-1 card-header text-center justify-content-center">
									Beltrano
								</div>
								<div class="card-body p-1 text-center justify-content-center">
									<img class="card-img-top" src="images/adriana.jpg" style="width: 8em; heigth: 8em;">
									<p contentEditable="true" align="justify" style="font-size: 0.7em;" class="card-text"> Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus.</p>
								</div>
								<div class="card-footer p-1 text-center justify-content-center">
									<a href="#" class="card-link">Link do Perfil</a>
								</div>
							</div>
							<div class="card">
								<div contentEditable="true" class="p-1 card-header text-center justify-content-center">
									Sicrano
								</div>
								<div class="card-body p-1 text-center justify-content-center">
									<img class="card-img-top" src="images/adriana.jpg" style="width: 8em; heigth: 8em;">
									<p contentEditable="true" align="justify" style="font-size: 0.7em;" class="card-text"> Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus.</p>
								</div>
								<div class="card-footer p-1 text-center justify-content-center">
									<a href="#" class="card-link">Link do Perfil</a>
								</div>
							</div>
						</div>
					</div>

					<!-- seção campeonato -->
					<div id="divCampeonato" class="col-8 division" style="display: none;">
						<button class="btn btn-info" data-toggle="modal" data-target="#addcampeonato" style="margin: 1em;"><i class="fas fa-plus mr-2"></i>Adicionar Campeonato</button><br>
						<button style="font-size: 2em;" data-toggle="modal" data-target="#verCampeonato" class="linksmenu">Profissionais</button><br>
						<button style="font-size: 2em;" data-toggle="modal" data-target="#verCampeonato" class="linksmenu">Amadores</button><br>

					</div>
				</div>
			</div>
		</section>

		<section id="cadastrarResultados" class="my-2" style="display: none;">
			
			<div class="container">
				<div class="row">
					<div class="offset-3 col-6">
						<form method="post" action="php/cadastrar-jogo.php">
							<div class="row justify-content-center">
								<div class="col-auto btn-group my-3">
									<button type="button" class="btn btn-info" onclick="show_plz('caixaMisteriosa');">Caixa Misteriosa</button>
									<button type="button" class="btn btn-info" onclick="show_plz('equipes');">Equipes</button>
									<button type="button" class="btn btn-info" onclick="show_plz('eliminacao');">Eliminação</button>
									<button type="button" class="btn btn-info" onclick="show_plz('repescagem');">Repescagem</button>
									<button type="button" class="btn btn-info" onclick="show_plz('semifinal');">Semifinal</button>
									<button type="button" class="btn btn-info"onclick="show_plz('final');">Final</button>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-6">
									<label for="camp">Campeonato</label>
									<select id="camp" name="camp" class="custom-select">
										<option value="profissionais">Profissionais</option>
										<option value="amadores">Amadores</option>
									</select>
								</div>

								<div class="col-6">
									<label for="ano">Ano do Campeonato</label>
									<select id="ano" name="ano" class="custom-select">
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2018">2023</option>
										<option value="2018">2024</option>
										<option value="2018">2025</option>
										<option value="2018">2026</option>
										<option value="2018">2027</option>
										<option value="2018">2028</option>
										<option value="2018">2029</option>
									</select>
								</div>
							</div>

							<input id="tipoJogo" name="tipoJogo" type="hidden" value="1">

							<div id="caixaMisteriosa">
								<div class="row">
									<div class="col-6 form-group">
										<label>Data da Prova</label>
										<input class="form-control" type="date" id="dataProvaCaixaMisteriosa" name="dataProvaCaixaMisteriosa">
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label>Tema</label>
										<select class="form-control custom-select" type="text" id="temaCaixaMisteriosa" name="temaCaixaMisteriosa" onchange="outro('temaCaixaMisteriosa','outroTemaCaixaMisteriosa')">
											<option value="arabe">Árabe</option>
											<option value="confeitaria">Confeitaria</option>
											<option value="judaica">Judaica</option>
											<option value="nordestina">Nordestina</option>
											<option value="tailandesa">Tailandesa</option>
											<option value="outro">Outra</option>
										</select>

										<input class="form-control mt-2" type="text" id="outroTemaCaixaMisteriosa" name="outroTemaCaixaMisteriosa" style="display: none">
									</div>

									<div class="col-6 form-group">
										<label>Ganhador</label>
										<select id="ganhadorCaixaMisteriosa" name="ganhadorCaixaMisteriosa" class="form-control custom-select">
											<option value="adriana">Adriana</option>
											<option value="alex">Alex</option>
											<option value="andre">André</option>
											<option value="andrer">André R.</option>
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
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></label>
										
										<div class="row">
											<div class="col-8">
												<ul id="ingredientesCaixaMisteriosa"></ul>
												<input type="hidden" id="iCaixaMisteriosa" name="iCaixaMisteriosa">
											</div>
										</div>

										<div class="row">
											<div class="col-auto form-group">
												<div class="input-group">
													<input id="entradaIngredienteCaixaMisteriosa" class="form-control" type="text" name="entradaIngredienteCaixaMisteriosa">
													<div class="input-group-append">
														<button class="btn btn-danger" type="button" onclick="addIngrediente('ingredientesCaixaMisteriosa', 'entradaIngredienteCaixaMisteriosa', 'iCaixaMisteriosa');">+</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row text-center justify-content-center">
									<div class="col-12">
										<button class="btn btn-outline-info btn-block" type="submit">Cadastrar</button>
									</div>
								</div>
							</div>

							<div id="equipes" style="display: none;">
								<div class="row">
									<div class="col-6 form-group">
										<label>Data da Prova</label>
										<input class="form-control" type="date" id="dataProvaEquipes">
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label>Tema</label>
										<select class="form-control custom-select" type="text" id="temaEquipes" name="temaEquipes" onchange="outro('temaEquipes','outroTemaEquipes')">
											<option value="arabe">Árabe</option>
											<option value="confeitaria">Confeitaria</option>
											<option value="judaica">Judaica</option>
											<option value="nordestina">Nordestina</option>
											<option value="tailandesa">Tailandesa</option>
											<option value="outro">Outra</option>
										</select>

										<input class="form-control mt-2" type="text" id="outroTemaEquipes" name="outroTemaEquipes" style="display: none">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-6">
										<label>Selecione a cor do time e os membros:</label>
										<div>
											<button type="button" class="btn bg-danger ml-1 mb-1" onclick="changeColorSelect('#d9534f');"></button>
											<button type="button" class="btn bg-warning ml-1 mb-1" onclick="changeColorSelect('#f0ad4e');"></button>
											<button type="button" class="btn bg-success ml-1 mb-1" onclick="changeColorSelect('#5cb85c');"></button>
											<button type="button" class="btn bg-info ml-1 mb-1" onclick="changeColorSelect('#17a2b8');"></button>
										</div>
										<select name="membrosequipes[]" id="membrosequipes" multiple="multiple" class="form-control custom-select">
											<option value="adriana">Adriana</option>
											<option value="alex">Alex</option>
											<option value="andre">André</option>
											<option value="andrer">André R.</option>
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
										</select>
									</div>

									<div class="col-6 form-group">
										<label><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></label>
										<div class="row">
											<div class="col-8">
												<ul id="ingredientesEquipes"></ul>
												<input type="hidden" id="iEquipes" name="iEquipes">
											</div>
										</div>
										<div class="input-group">
											<input id="entradaIngredienteEquipes" class="form-control" type="text" name="entradaIngredienteEquipes">
											<div class="input-group-append">
												<button class="btn btn-danger" type="button" onclick="addIngrediente('ingredientesEquipes', 'entradaIngredienteEquipes', 'iEquipes');">+</button>
											</div>
										</div>

									</div>
								</div>

								<div class="row text-center justify-content-center">
									<div class="col-12">
										<button class="btn btn-outline-info btn-block" type="submit">Cadastrar</button>
									</div>
								</div>
							</div>

							<div id="eliminacao" style="display: none;">
								<div class="row">
									<div class="col-6 form-group">
										<label>Data da Prova</label>
										<input class="form-control" type="date" id="dataProvaEliminacao" name="dataProvaEliminacao">
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label>Tema</label>
										<select class="form-control custom-select" type="text" id="temaEliminacao" name="temaEliminacao" onchange="outro('temaEliminacao','outroTemaEliminacao')">
											<option value="arabe">Árabe</option>
											<option value="confeitaria">Confeitaria</option>
											<option value="judaica">Judaica</option>
											<option value="nordestina">Nordestina</option>
											<option value="tailandesa">Tailandesa</option>
											<option value="outro">Outra</option>
										</select>

										<input class="form-control mt-2" type="text" id="outroTemaEliminacao" name="outroTemaEliminacao" style="display: none">
									</div>

									<div class="col-6 form-group">
										<label>Ganhador</label>
										<select id="ganhadorEliminacao" name="ganhadorEliminacao" class="form-control custom-select">
											<option value="adriana">Adriana</option>
											<option value="alex">Alex</option>
											<option value="andre">André</option>
											<option value="andrer">André R.</option>
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
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></label>
										
										<div class="row">
											<div class="col-8">
												<ul id="ingredientesEliminacao"></ul>
												<input type="hidden" id="iEliminacao" name="iEliminacao">
											</div>
										</div>

										<div class="row">
											<div class="col-auto form-group">
												<div class="input-group">
													<input id="entradaIngredienteEliminacao" class="form-control" type="text" name="entradaIngredienteEliminacao">
													<div class="input-group-append">
														<button class="btn btn-danger" type="button" onclick="addIngrediente('ingredientesEliminacao', 'entradaIngredienteEliminacao', 'iEliminacao');">+</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row text-center justify-content-center">
									<div class="col-12">
										<button class="btn btn-outline-info btn-block" type="submit">Cadastrar</button>
									</div>
								</div>
							</div>

							<div id="repescagem" style="display: none;">
								<div class="row">
									<div class="col-6 form-group">
										<label>Data da Prova</label>
										<input class="form-control" type="date" id="dataProvaRespescagem" name="dataProvaRespescagem">
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label>Tema</label>
										<select class="form-control custom-select" type="text" id="temaRespescagem" name="temaRespescagem" onchange="outro('temaRespescagem','outroTemaRepescagem')">
											<option value="arabe">Árabe</option>
											<option value="confeitaria">Confeitaria</option>
											<option value="judaica">Judaica</option>
											<option value="nordestina">Nordestina</option>
											<option value="tailandesa">Tailandesa</option>
											<option value="outro">Outra</option>
										</select>

										<input class="form-control mt-2" type="text" id="outroTemaRepescagem" name="outroTemaRepescagem" style="display: none">
									</div>

									<div class="col-6 form-group">
										<label>Ganhador</label>
										<select id="ganhadorRespescagem" name="ganhadorRespescagem" class="form-control custom-select">
											<option value="adriana">Adriana</option>
											<option value="alex">Alex</option>
											<option value="andre">André</option>
											<option value="andrer">André R.</option>
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
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></label>
										
										<div class="row">
											<div class="col-8">
												<ul id="ingredientesRespescagem"></ul>
												<input type="hidden" id="iRespescagem" name="iRespescagem">
											</div>
										</div>

										<div class="row">
											<div class="col-auto form-group">
												<div class="input-group">
													<input id="entradaIngredienteRespescagem" class="form-control" type="text" name="entradaIngredienteRespescagem">
													<div class="input-group-append">
														<button class="btn btn-danger" type="button" onclick="addIngrediente('ingredientesRespescagem', 'entradaIngredienteRespescagem', 'iRespescagem');">+</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row text-center justify-content-center">
									<div class="col-12">
										<button class="btn btn-outline-info btn-block" type="submit">Cadastrar</button>
									</div>
								</div>
							</div>

							<div id="semifinal" style="display: none;">
								<div class="row">
									<div class="col-6 form-group">
										<label>Data da Prova</label>
										<input class="form-control" type="date" id="dataProvaSemifinal" name="dataProvaSemifinal">
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label>Tema</label>
										<select class="form-control custom-select" type="text" id="temaSemifinal" name="temaSemifinal" onchange="outro('temaSemifinal','outroTemaSemifinal')">
											<option value="arabe">Árabe</option>
											<option value="confeitaria">Confeitaria</option>
											<option value="judaica">Judaica</option>
											<option value="nordestina">Nordestina</option>
											<option value="tailandesa">Tailandesa</option>
											<option value="outro">Outra</option>
										</select>

										<input class="form-control mt-2" type="text" id="outroTemaSemifinal" name="outroTemaSemifinal" style="display: none">
									</div>

									<div class="col-6 form-group">
										<label>Ganhador</label>
										<select id="ganhadorSemifinal" name="ganhadorSemifinal" class="form-control custom-select">
											<option value="adriana">Adriana</option>
											<option value="alex">Alex</option>
											<option value="andre">André</option>
											<option value="andrer">André R.</option>
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
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></label>
										
										<div class="row">
											<div class="col-8">
												<ul id="ingredientesSemifinal"></ul>
												<input type="hidden" id="iSemifinal" name="iSemifinal">
											</div>
										</div>

										<div class="row">
											<div class="col-auto form-group">
												<div class="input-group">
													<input id="entradaIngredienteSemifinal" class="form-control" type="text" name="entradaIngredienteSemifinal">
													<div class="input-group-append">
														<button class="btn btn-danger" type="button" onclick="addIngrediente('ingredientesSemifinal', 'entradaIngredienteSemifinal', 'iSemifinal');">+</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row text-center justify-content-center">
									<div class="col-12">
										<button class="btn btn-outline-info btn-block" type="submit">Cadastrar</button>
									</div>
								</div>
							</div>

							<div id="final" style="display: none;">
								<div class="row">
									<div class="col-6 form-group">
										<label>Data da Prova</label>
										<input class="form-control" type="date" id="dataProvaFinal" name="dataProvaFinal">
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label>Tema</label>
										<select class="form-control custom-select" type="text" id="temaFinal" name="temaFinal" onchange="outro('temaFinal','outroTemaFinal')">
											<option value="arabe">Árabe</option>
											<option value="confeitaria">Confeitaria</option>
											<option value="judaica">Judaica</option>
											<option value="nordestina">Nordestina</option>
											<option value="tailandesa">Tailandesa</option>
											<option value="outro">Outra</option>
										</select>

										<input class="form-control mt-2" type="text" id="outroTemaFinal" name="outroTemaFinal" style="display: none">
									</div>

									<div class="col-6 form-group">
										<label>Ganhador</label>
										<select id="ganhadorFinal" name="ganhadorFinal" class="form-control custom-select">
											<option value="adriana">Adriana</option>
											<option value="alex">Alex</option>
											<option value="andre">André</option>
											<option value="andrer">André R.</option>
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
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-6 form-group">
										<label><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></label>
										
										<div class="row">
											<div class="col-8">
												<ul id="ingredientesFinal"></ul>
												<input type="hidden" id="iFinal" name="iFinal">
											</div>
										</div>

										<div class="row">
											<div class="col-auto form-group">
												<div class="input-group">
													<input id="entradaIngredienteFinal" class="form-control" type="text" name="entradaIngredienteFinal">
													<div class="input-group-append">
														<button class="btn btn-danger" type="button" onclick="addIngrediente('ingredientesFinal', 'entradaIngredienteFinal', 'iFinal');">+</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row text-center justify-content-center">
									<div class="col-12">
										<button class="btn btn-outline-info btn-block" type="submit">Cadastrar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</section>

		<section id="criarBolao" style="display: none;">
			<div class="container">
				<div class="row mt-4">
					<div class="col-3"></div>
					<div class="col-6">
						<form class="p-4 shadow" method="post" action="php/cadastrar_bolao.php">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="campeonato">Campeonato <span class="text-danger">*</span></label>
										<select class="form-control custom-select" name="campeonato" id="campeonato">
												<option value="profissionais" selected>MasterChef Profissionais</option>
												<option value="amadores">MasterChef Amadores</option>												
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="tipo-bolao">Tipo do Bolão <span class="text-danger">*</span></label>
										<select class="form-control custom-select" name="tipo-bolao" id="tipo-bolao" onchange="liberar_senha()" required>
											<option value="publico" selected>Público</option>
											<option value="privado">Privado</option>
										</select>
									</div>

									<div style="display: none;" id="senha" class="form-group">
										<label for="pwd">Senha <span class="text-danger">*</span></label>
										<input class="form-control" type="password" name="pwd" id="pwd">
									</div>
								</div>

							</div>

							<div class="form-group">
								<label for="nome">Nome <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome para o bolão" required>
							</div>

							<div class="form-group">
								<label for="descricao">Descrição</label>
								<textarea class="form-control" style="resize: none;" id="descricao" name="descricao"></textarea>
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="participantes">Número de Participantes</label>
									</div>
									<div class="offset-1 col-md-5">
										<label for="data">Data de Término<span class="text-danger">*</span></label>
									</div>
								</div>

								<div class="row">
									<div class="col-md-5">
										<input class="form-control" type="number" min="2" name="participantes" id="participantes">
										<input class="mt-1" type="checkbox" name="unlimited" id="unlimited">
										<label for="unlimited">Sem limite</label>
									</div>
									<div class="offset-2 col-md-5">
										<input class="form-control" type="date" name="data" id="data" min="<?php echo date('Y-m-d')?>" required>
										<span class="validity"></span>
									</div>
								</div>
							</div>

							<!--
							<div class="form-group">
								<label for="escolhas">Escolhas de Aposta <span class="text-danger">*</span></label>
								<textarea class="form-control mb-2" style="resize: none; display: none;" id="escolhas2" name="escolhas2"required></textarea>
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
							-->

							<div class="form-group">
								<label for="tipo-jogo">Tipo de Jogo <span class="text-danger">*</span></label>
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
								<label>Tipo de Aposta <span class="text-danger">*</span></label><br>
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
					<div class="col-3"></div>
				</div>
			</div>
		</section>

		<section class="container" id="usuarios" style="display: none;">
		<?php
			$usuarios = $sistema->getUsuarios();
			if(count($usuarios) > 0){
				echo '
				<div class="row mt-2">
					<div class="col-7"></div>
						<div class="col-4 ml-2">
							<input class="filterBolao" type="text" placeholder="Digite CPF, username ou nome do usuário" id="filtro" name="filtro">
						</div>
					<div class="col-1"></div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="card-columns col-10">';
					for($i=0; $i<count($usuarios); $i++){
						echo '
						<div class="card">
							<div class="card-header" style="background-color: #B0E0E6;">
								<div class="row">';

								echo '<form method="post" action="php/alterarPermissao.php">';

									if($usuarios[$i]->getTipo() == '1'){
										echo '
										<input type="hidden" id="permissao" name="permissao" value="0">
										<input type="hidden" id="quem" name="quem" value="'. $usuarios[$i]->getUsername() . '">
										<div class="col-2">
											<button class="alterar" type="submit" style="border: none; background: none;"><i class="fas fa-user-cog py-2 botaotipouser"></i></button>
										</div>';
									} else {
										echo '
										<input type="hidden" id="permissao" name="permissao" value="1">
										<input type="hidden" id="quem" name="quem" value="'. $usuarios[$i]->getUsername() . '">
										<div class="col-2">
											<button class="alterar" type="submit" style="border: none; background: none;"><i class="fas fa-user py-2 botaotipouser"></i></button>
										</div>';
									}

								echo '</form>';
									echo '
									<div class="col-8">
										<h4 class="card-title text-info">@' . $usuarios[$i]->getUsername() . '</h4>
									</div>
									<div class="col-2">
										<i style="color: #696969;" class="fas fa-times" onclick="mensagemsure(\'este usuário\')" data-toggle="modal" data-target="#sure"></i>
									</div>
								</div>
							</div>
							<div style="font-size: 0.8em; background-color: #F0FFFF; padding: 0;" class="card-body">
								<div class="px-3 pt-3">
									<div>
										<label for="nomeusuario">Nome: </label><p name="nomeusuario">' . $usuarios[$i]->getNome() . '</p>
										<label for="emailusuario">Email: </label><p name="emailusuario">' . $usuarios[$i]->getEmail() . '</p>
										<label for="ddnusuario">Data de Nascimento: </label><p name="ddnusuario">' . $usuarios[$i]->getDataNascimento() . '</p>
										<label for="generosuario">Gênero: </label><p name="generousuario">' . $usuarios[$i]->getGenero() .'</p>
									</div>
									<div class="divescondida"  style="display: none;">
										<label for="rgusuario">RG: </label><p name="rgusuario">' . $usuarios[$i]->getRg() . '</p>
										<label for="cpfusuario">CPF: </label><p name="cpfusuario" id="cpfusuario">' . $usuarios[$i]->getCpf() . '</p>
										<label for="telefoneusuario">Telefone: </label><p name="telefoneusuario">';
										echo $usuarios[$i]->getTelefone() == '' ? '-' : $usuarios[$i]->getTelefone();
										echo '</p>
										<label for="celularusuario">Celular: </label><p name="celularusuario">';
										echo $usuarios[$i]->getCelular() == '' ? '-' : $usuarios[$i]->getCelular();
										echo '</p>
										<label for="bancousuario">Banco: </label><p name="bancousuario">' . $usuarios[$i]->getBanco() . '</p>
										<label for="agenciausuario">Agência: </label><p name="agenciausuario">' . $usuarios[$i]->getAgencia() . '</p>
										<label for="contausuario">Conta: </label><p name="contausuario">' . $usuarios[$i]->getConta() . '</p>';

										if(get_class($usuarios[$i]) == 'AdministradorBolao'){

											$boloes = $usuarios[$i]->getBolao();
											echo '
										<label for="boloesusuario">Bolões administrados: </label><p name="boloesusuario">';
											for($j=0; $j<count($boloes)-1; $j++){
												echo $boloes[$j]->getTitulo() . ',';
											}
											if(count($boloes) > 0){
												echo $boloes[count($boloes)-1]->getTitulo();
											}
											echo ';</p>';
										}
										echo '
									</div>
								</div>
								<div class="text-center justify-content-center" style="padding: 0;">
									<button type="button" class="VerMais btn">Ver mais</button>	
								</div>
							</div>
						</div>';
					}
					echo '
					</div>
					<div class="col-1"></div>
				</div>';
			} else {
				echo '<h3> Não há usuários cadastrados no sistema</h3>';
			}
		?>
		</section>

		<section id="boloes" style="display: none;">
		<?php
			$boloes = $sistema->getBoloes();
			if(count($boloes) > 0){
				echo '
				<div class="row mt-2">
					<div class="col-7"></div>
						<div class="col-4 ml-2">
							<input class="filterBolao" type="text" placeholder="Digite Campeonato, Criador ou nome do usuário" id="filtrob" name="filtrob">
						</div>
					<div class="col-1"></div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="card-columns col-10">
						<!-- padrão bolão de administrador -->';
						for($i=0; $i<count($boloes); $i++){
							echo '
						<div class="card">
							<div class="card-header" style="background-color: #DB7093;">
								<div class="row">
									<div class="col-2">
										<i class="fas fa-user-cog py-2"></i>
									</div>
									<div class="col-8">
										<h4 class="card-title text-white">' . $boloes[$i]->getTitulo() . '</h4>
									</div>
									<input type="hidden" id="item-b" name="item-b" value="' . $i . '">
									<div class="col-2">
										<i style="color: #696969;" class="fas fa-times" onclick="mensagemsure(\'este bolão\')" data-toggle="modal" data-target="#sure"></i>
									</div>
								</div>
							</div>
							<div style="font-size: 0.8em; background-color: #FFF0F5; padding: 0;" class="card-body">
								<div class="px-3 pt-3">
									<div>
										<label for="campeonatobolao">Campeonato: </label><p name="campeonatobolao">' . $boloes[$i]->getCampeonato() . '</p>
										<label for="tipobolao">Tipo: </label><p name="tipobolao">';
										echo $boloes[$i]->getTipo() == 0 ? 'Público' : 'Privado';
										echo '</p>
										<label for="criadorbolao">Criador: </label><p name="criadorbolao">' . $boloes[$i]->getCriador() . '</p>
										<label for="descricaobolao">Descrição: </label><p name="descricaobolao">' . $boloes[$i]->getDescricao() . '</p>';

										$tipo = $boloes[$i]->getTipoJogo();
										$t = '';
										if($tipo[0] == '1'){
											$t .= 'Caixa Misteriosa<br>';
										} 

										if($tipo[1] == '1'){
											$t .= 'Equipes<br>';
										} 

										if($tipo[2] == '1'){
											$t .= 'Eliminação<br>';
										} 

										if($tipo[3] == '1'){
											$t .= 'Repescagem<br>';
										} 

										if($tipo[4] == '1'){
											$t .= 'Semifinal<br>';
										} 

										if($tipo[5] == '1'){
											$t .= 'Final<br>';
										} 


										echo'
										<label for="tipojogo">Tipos de Jogo: </label><p name="tipojogo">'. $t . '</p>
									</div>
									<div class="divescondida"  style="display: none;">';

									$tipoAposta = $boloes[$i]->getTipoAposta();
									$t = '';

									if($tipoAposta == 'ganhador'){
										$t = "Quem será que vai ganhar?";
									} elseif($tipoAposta == 'perdedor'){
										$t = "Quem será que vai perder/eliminado?";
									} elseif($tipoAposta == 'tema'){
										$t = "Qual vai ser o tema?";
									} elseif($tipoAposta == 'ingredientes'){
										$t = "Quais serão os ingredientes utilizados?";
									}

									echo'
										<label for="tipoaposta">Tipos de Aposta: </label><p name="tipoaposta">' . $t . '</p>
										<label for="numeroparticipantes">Número de participantes: </label><p name="numeroparticipantes">' . count($boloes[$i]->getParticipantes()) . '/' . $boloes[$i]->getLimiteDeParticipantes() . '</p>
										<label for="datatermino">Data de Término: </label><p name="datatermino">' . $boloes[$i]->getTempoLimite() . '</p>
									</div>
								</div>
								<div class="text-center justify-content-center" style="padding: 0;">
									<button type="button" class="VerMais btn">Ver mais</button>	
								</div>
							</div>
						</div>';
						}
						echo'
					</div>
					<div class="col-1"></div>
				</div>';
			} else {
				echo '<div class="row"><div class="offset-3 col-6"><h3>Não há bolões cadastrados no sistema</h3></div></div>';
			}
		?>
		</section>

		<!-- modal excluir alguma coisa -->
		<div class="modal" id="sure">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header text-center justify-content-center">
						<i class="fas fa-exclamation-triangle" style="font-size: 2em; color: #FF002F"></i>
					</div>
					<div id="textosure" class="modal-body">
						<p class="text-center" style="margin: 2em;"><strong>Tem certeza que quer remover sua aposta neste bolão?</strong></p>
						<div>
							<form id="excluir" name="excluir" method="post" action="php/excluirUsuario.php">
								<input type="hidden" id="item" name="item" value="">
								<button type="button" class="col-6 close" style="padding: 0.5em; background-color: #C0C0C0;" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="col-6" style="padding: 0.5em; background-color: #FF0000;">Sim</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- modal termos e condições editável -->
		<div class="modal" id="termos">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">

    				<div class="modal-header text-center">
    					<div class="col-2"></div>
    					<h4 class="col-8 modal-title w-100">Termos e Condições</h4>
    					<button type="button" class="col-2 close" data-dismiss="modal">&times;</button>
    				</div>
    				
    				<div class="modal-body" style="height: 30em;">
    					<textarea id="conteudotec" class="w-100 h-100" disabled>
    						Lorem ipsum semper libero justo porta aenean hendrerit dui, massa eleifend quisque cubilia auctor sagittis mauris placerat venenatis, augue lorem pellentesque porttitor mollis tempus pretium. mollis mi netus in torquent suspendisse mattis urna porttitor nostra, non vel venenatis elit eleifend adipiscing vulputate curabitur malesuada neque, molestie est habitasse ad fringilla sapien vehicula luctus. lectus vestibulum volutpat metus curae laoreet sollicitudin fames bibendum commodo, ultricies facilisis scelerisque cubilia bibendum per nisl lorem, vestibulum convallis aliquam turpis sapien rutrum non tortor. elit non id tempor duis ornare justo dui curabitur senectus, scelerisque feugiat commodo molestie vestibulum egestas rhoncus mi, maecenas senectus rhoncus quis suscipit nullam eros viverra.
    						Habitant aptent fames conubia bibendum in praesent bibendum dictum est, risus venenatis mi eget lacus sem rutrum ligula curabitur feugiat, congue risus massa a lorem ornare tellus potenti. dapibus pharetra potenti egestas vivamus sollicitudin euismod tincidunt sed volutpat est nostra viverra imperdiet, lobortis nam mauris porta metus donec venenatis varius etiam aliquam elementum. amet neque proin lacinia phasellus neque proin class cursus augue, aliquam aptent hendrerit pharetra imperdiet ac aliquam magna at, torquent molestie viverra rutrum donec turpis fringilla eget. taciti amet vitae lobortis nibh primis rutrum maecenas donec, massa enim feugiat hendrerit porta vehicula at cras, quisque nam ligula ad leo felis purus. 
    						Senectus primis nostra turpis lorem fames ante class, ornare ante purus curabitur condimentum aenean eu lorem, sem morbi erat dapibus dictum imperdiet. nullam ad donec magna accumsan elit varius condimentum, pellentesque lectus nec feugiat conubia rutrum sociosqu non, est blandit eget tellus habitant condimentum. leo sit consequat aliquam phasellus facilisis mollis est nostra aenean tempor porta interdum, hendrerit faucibus morbi venenatis augue congue dolor feugiat malesuada sed. in pharetra cubilia cras ante nec tortor, ullamcorper fringilla fusce at eu laoreet quam, eu suspendisse tortor bibendum himenaeos. eu accumsan tristique ipsum lectus lobortis volutpat tellus habitasse lobortis egestas tempor a vitae justo augue velit, non accumsan porta ad felis pulvinar leo pretium cursus et proin eu vestibulum bibendum.
							Fermentum est nisl elit conubia platea amet mattis vitae curabitur facilisis quam, metus tempus a suscipit accumsan curabitur aptent ut orci. conubia vivamus interdum sodales ac erat quis, malesuada convallis posuere dictum urna quisque, cras aenean euismod lacinia etiam. amet rutrum inceptos pretium eu nullam blandit nisi condimentum, tempus quam justo metus cras fringilla nec feugiat, semper lectus eleifend varius cursus a etiam potenti, hendrerit rutrum urna habitant risus luctus sollicitudin. fusce id fringilla lobortis neque eget sem elementum, quis lacus euismod eros tempus dolor curabitur tempor, feugiat libero mauris leo sociosqu turpis. 
							Aliquet imperdiet luctus at arcu porta sodales lacinia, nullam hendrerit justo luctus iaculis egestas fermentum, venenatis vestibulum primis cursus sed et. pulvinar dolor fames nulla suscipit cras lacus bibendum, suscipit proin tortor aptent vel malesuada, consectetur netus nisl nec tellus volutpat. malesuada sociosqu aptent neque sagittis semper risus cubilia eros praesent taciti diam nostra in donec volutpat ac torquent auctor augue habitant, etiam elit molestie semper nunc nostra nulla phasellus aliquam habitasse mi vitae conubia cras mollis pellentesque ac libero feugiat.
						</textarea>
    				</div>

    				<div class="modal-footer text-center justify-content-center">
    					<button class="btn" id="tecsalvar" onclick="tecs()" style="background-color: #d9534f">Salvar</button>
    					<button class="btn" id="teceditar" onclick="enable('conteudotec')" style="background-color: #009999">Editar</button>
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- modal ver & editar noticia -->
		<div class="modal hide" id="dynamicmodal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-5"></div>
						<h5 class="modal-title">Ver Notícia</h5>
						<button class="close col-2" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<div id="formdyn" class="container">
							<form>
								<div class="row mb-2">
									<div class="form-group ml-3"> 
										<label for="titnoticia">Título<span class="text-danger">*</span></label>
										<input class="form-control w-100" type="text" id="tit" name="titnoticia" value="Título" disabled>
									</div>
									<button type="button" onclick="enable('tit')" class="otobotao"><i class="fas fa-edit mr-3 col-1"></i></button> 
								</div>
								<div class="row mb-2">
									<div class="form-group ml-3"> 
										<label for="descnoticia">Descrição<span class="text-danger">*</span></label>
										<input class="form-control w-100" type="text" id="desc" name="descnoticia" value="Descrição" disabled>
									</div>
									<button type="button" onclick="enable('desc')" class="otobotao"><i class="fas fa-edit mr-3 col-1"></i></button> 
								</div>
								<div class="row mb-2">
									<div class="form-group ml-3"> 
										<label for="linoticia">Link</label>
										<input class="form-control w-100" type="url" id="li" name="linoticia" value="https://www.github.com/lhamasm/bolao" disabled> 
									</div>
									<button type="button" onclick="enable('li')" class="otobotao"><i class="fas fa-edit mr-3 col-1"></i></button>
								</div>
								<div class="row mb-2">
									<div class="form-group ml-3"> 
										<label for="datenoticia">Data</label>
										<input class="form-control" type="date" id="daten" name="datenoticia" value="2018-11-11" disabled> 
									</div>
									<button type="button" onclick="enable('daten')" class="otobotao"><i class="fas fa-edit mr-3 col-1"></i></button>
								</div>
								<div class="row mb-2">
									<div class="form-group ml-3"> 
										<label for="picnoticia">Imagem<span class="text-danger">*</span></label><br>
										<input type="file" id="pic" name="picnoticia" accept="image/*" disabled>
									</div>
									<button type="button" onclick="enable('pic')" class="otobotao"><i class="fas fa-edit mr-3 col-1"></i></button>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer text-center justify-content-center">
						<button type="submit" class="btn btn-danger">Salvar</button>
						<button data-dismiss="modal" class="btn">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- modal adicionar noticia -->
		<div class="modal" id="addnoticia">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header text-center justify-content-center">
						Adicionar Notícia
					</div>
					<div class="modal-body">
						<form id="formAddNot">
							<div class="form-group">
								<input type="radio" name="visivel" value="vis"> <label for="visivel">Vísivel</label>
								<input class="ml-1" type="radio" name="visivel" value="esc"> <label for="escondido">Escondido</label>
							</div>

							<div class="form-group">
								<label for="titulonoticia">Título da Notícia<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="titulonoticia" id="titulonoticia" required>
							</div>
							<div class="form-group">
								<label for="descricaonoticia">Descrição<span class="text-danger">*</span></label>
								<input class="form-control" type="text-danger" name="descricaonoticia" required>
							</div>
							<div class="form-group">
								<label for="datanoticia">Data</label>
								<input class="form-control w-50" type="date" min="2018-11-11" name="datanoticia" id="datanoticia">
							</div>
							<div class="form-group">
								<label for="linknoticia">Link de Origem</label>
								<input class="form-control" type="url" name="linknoticia" placeholder="Se a notícia tem fonte, preencha este campo">
							</div>
							<div class="form-group">
								<label class="mr-1 col-2" for="imagemnoticia">Imagem<span class="text-danger">*</span></label><br>
								<input class="ml-1" type="file" name="imagemnoticia" accept="image/*" required>
							</div>
						</form>
					</div>
					<div class="modal-footer text-center justify-content-center">
						<button type="submit" onclick="savenoticia()" class="btn btn-danger">Salvar</button>
						<button class="btn" onclick="resetarform('formAddNot')" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- modal adicionar campeonato-->
    	<div class="modal" id="addcampeonato">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<div class="modal-header text-center">
    					<div class="col-2"></div>
    					<h5 class="col-8 modal-title">Adicionar Campeonato</h5>
    					<button class="col-2 close" onclick="resetarform('formAddCamp')" data-dismiss="modal">&times;</button>
    				</div>
    				<div class="modal-body">
    					<form id="formAddCamp">
    						<div class="form-group">
    							<input type="checkbox" name="ativoCampeonato"> Ativo
    						</div>
    						<div class="form-group">
    							<label for="Nomecamp">Nome<span class="text-danger">*</span></label>
    							<input class="form-control" type="text" name="Nomecamp" required>
    						</div>
    						<div class="form-group">
    							<label for="Descricaocamp">Descrição</label>
    							<input class="form-control" type="text" name="Descricaocamp">
    						</div>
    						<label>Participantes</label>
    						<button class="ml-1 mt-1 umbotao" type="button" onclick="show_plz('addPartCamp'), show_plz('PartCampG')"><i class="fas fa-plus"></i></button>
							<div id="addPartCamp" style="display: none;">
								<div class="form-group">
									<label for="nomePC">Nome<span class="text-danger">*</span></label>
									<input id="nomePC" type="text" pattern="[A-Za-z ]*" name="nomePC" required>
								</div>
								<div class="form-group">
									<label for="textoPC">Texto Introdutório<span class="text-danger">*</span></label>
									<textarea class="form-control" name="textoPC" maxlength="336" required></textarea>
								</div>
								<div class="form-group">
									<label for="urlPC">Link do Perfil</label>
									<input class="form-control" type="url" name="urlPC">
								</div>
								<div class="form-group">
									<label for="fotoPC">Foto<span class="text-danger">*</span></label>
									<input type="file" id="fotoPC" name="fotoPC" accept="image/*" required>
								</div>
								<div class="text-center justify-content-center">
									<button onclick="addparticipante(), show_plz('addPartCamp'), show_plz('PartCampG')" class="btn btn-outline-danger">Adicionar</button>
								</div>
							</div>
							<div id="PartCampG" class="form-group" style="background-color: #fadbd8; padding: 1em; margin: 1em;">
								<ul id="PartCamp">
									<li>
										<div>
											<img src="images/adriana.jpg" style="height: 2.5em; width: 2.5em; margin-right: 0.6em;">
											Pessoa P
										</div>
									</li>
								</ul>
							</div>
    						<div class="mt-2 form-group text-center justify-content-center">
								<button type="submit" onclick="savenoticia()" class="btn btn-danger">Salvar</button>
								<button class="btn" onclick="resetarform('formAddCamp')" data-dismiss="modal">Cancelar</button>
							</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- modal ver campeonato-->
    	<div id="verCampeonato" class="modal">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<div class="modal-header text-center">
    					<div class="col-2"></div>
    					<h5 class="modal-title col-8">Campeonato X</h5>
    					<button class="close col-2" data-dismiss="modal">x</button>
    				</div>
    				<div class="modal-body altura">
    					<div class="mb-2">
    						<input type="checkbox" name="Ativo"> <p style="display:inline; color: #B22222;">Ativo</p>
    					</div>
    					<div>
    						<h6>Número de Bolões do sistema:</h6>
    						<p>4596426</p>
    					</div>
    					<div>
    						<h6>Número de Bolões de usuário:</h6>
    						<p>5654685</p>
    					</div>
    					<div>
    						<h6>Descrição:</h6>
    						<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fringilla faucibus tellus vel tincidunt. Aenean sodales faucibus nunc. In quam quam, convallis in ipsum eget, porttitor fringilla velit. Donec ante mauris, lobortis et dignissim in, eleifend vel quam. Morbi congue tristique magna, eget interdum libero consequat sit amet. Morbi sodales tortor in erat tristique, eget finibus libero molestie.  </p>
    					</div>
    					<div>
    						<h6>Participantes:</h6>
    						<ul>
    							<li>
    								<img src="images/adriana.jpg" style="height: 2.5em; width: 2.5em;">
    								Fulano
    							</li>
    							<li>
    								<img src="images/adriana.jpg" style="height: 2.5em; width: 2.5em;">
    								Beltrano
    							</li>
    							<li>
    								<img src="images/adriana.jpg" style="height: 2.5em; width: 2.5em;">
    								Sicrano
    							</li>
    							<button style="padding-left: 0; background: none; border: none;">Ver todos</button>
    						</ul>
    					</div>
    				</div>
    				<div class="modal-footer">
    					
    				</div>
    			</div>
    		</div>
    	</div>

    	<!-- foooooooooter -->
		<footer class="mt-2" style="background-color: #B22222;">
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
					</ul>
				</div>
			</nav>
		</footer>

		<!-- scriiiiiiiiiiiipt-->

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			var cor = "#d9534f";
			var contents = $('.changeable').html();

			$(document).ready(function(){
    			$('[data-toggle="tooltip"]').tooltip();
			});

			// função que faz as divs campeonato, noticias, ranking e participantes sumirem e aparecerem ao click do menu
			function show_plz(ash){
				if(document.getElementById(ash).style.display == "none"){
					document.getElementById(ash).style.display = "block";
				} /*else {
					document.getElementById(ash).style.display = "none";
				}*/
				auxfuncao(ash);
			}

			function auxfuncao(ash) {
				if (ash == 'divCampeonato') {
					document.getElementById('divParticipantes').style.display = "none";
					document.getElementById('divRanking').style.display = "none";
					document.getElementById('divNoticias').style.display = "none";
				} else if (ash == 'divRanking') {
					document.getElementById('divParticipantes').style.display = "none";
					document.getElementById('divCampeonato').style.display = "none";
					document.getElementById('divNoticias').style.display = "none";	
				} else if (ash == 'divNoticias') {
					document.getElementById('divParticipantes').style.display = "none";
					document.getElementById('divRanking').style.display = "none";
					document.getElementById('divCampeonato').style.display = "none";
				} else if(ash == 'divParticipantes') {
					document.getElementById('divNoticias').style.display = "none";
					document.getElementById('divRanking').style.display = "none";
					document.getElementById('divCampeonato').style.display = "none";
				} else if(ash == 'paginaInicial'){
					document.getElementById('cadastrarResultados').style.display = "none";
					document.getElementById('criarBolao').style.display = "none";
					document.getElementById('usuarios').style.display = "none";
					document.getElementById('boloes').style.display = "none";
				} else if(ash == 'cadastrarResultados'){
					document.getElementById('paginaInicial').style.display = "none";
					document.getElementById('criarBolao').style.display = "none";
					document.getElementById('usuarios').style.display = "none";
					document.getElementById('boloes').style.display = "none";
				} else if(ash == 'criarBolao'){
					document.getElementById('cadastrarResultados').style.display = "none";
					document.getElementById('paginaInicial').style.display = "none";
					document.getElementById('usuarios').style.display = "none";
					document.getElementById('boloes').style.display = "none";
				} else if(ash == 'usuarios'){
					document.getElementById('cadastrarResultados').style.display = "none";
					document.getElementById('criarBolao').style.display = "none";
					document.getElementById('paginaInicial').style.display = "none";
					document.getElementById('boloes').style.display = "none";
				} else if(ash == 'boloes'){
					document.getElementById('cadastrarResultados').style.display = "none";
					document.getElementById('criarBolao').style.display = "none";
					document.getElementById('usuarios').style.display = "none";
					document.getElementById('paginaInicial').style.display = "none";
				} else if (ash == 'caixaMisteriosa') {
					document.getElementById('equipes').style.display = "none";
					document.getElementById('tipoJogo').value = '1';
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";

				} else if (ash == 'equipes') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";
					document.getElementById('tipoJogo').value = '2';
				} else if (ash == 'eliminacao') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";
					document.getElementById('tipoJogo').value = '3';
				} else if (ash == 'repescagem') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";
					document.getElementById('tipoJogo').value = '4';
				} else if (ash == 'semifinal') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('final').style.display = "none";
					document.getElementById('tipoJogo').value = '5';

				} else if (ash == 'final') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('tipoJogo').value = '6';
				}
			}

			// função faz aparecer um modal dizendo "tem certeza que deseja excluir 'message'?"
			function mensagemsure(message){
				document.getElementById('textosure').innerHTML = '<div id="textosure" class="modal-body"> <p class="text-center" style="margin: 2em;"><strong>Tem certeza que quer excluir ' + message + '?</strong></p> <form id="excluir" name="excluir" method="post" action="php/excluirUsuario.php"><input type="hidden" id="item" name="item" value=""><button type="button" class="col-6 close" style="padding: 0.5em; background-color: #C0C0C0;" data-dismiss="modal">Cancelar</button><button type="submit" class="col-6" style="padding: 0.5em; background-color: #FF0000;">Sim</button></form></div></div>';
				if(message == 'este usuário'){
					document.getElementById('item').value = document.getElementById('cpfusuario').innerHTML;
					document.excluir.action = 'php/excluirUsuario.php';
					//document.excluir.submit();
					console.log(document.getElementById('item').value);
				} else if(message == 'este bolão'){
					document.getElementById('item').value = document.getElementById('item-b').value;
					document.excluir.action = 'php/excluirBolao.php';
					//document.excluir.submit();
					//console.log(document.getElementById('item').value);
				}
			}

			function savenoticia(){
				if($('input[name=visivel]:checked').val() == 'vis'){
					saveaux('notEscondidos', 'Esconder Notícia"><i class="fas fa-eye-slash"></i>', document.getElementById('titulonoticia').value);
				} else {
					saveaux('notVisiveis', 'Tornar Visível"><i class="fas fa-eye"></i>', document.getElementById('titulonoticia').value);
				}
				resetarform('formAddNot');	
			}

			function saveaux(id, icon, title){
				document.getElementById(id).innerHTML += '<br><button data-toggle="modal" data-target="#dynamicmodal" class="linksmenu openmodal">' + title + '</button> <button class="umbotao ml-2" data-toggle="tooltip" data-placement="bottom" title="' + icon + '</button> <span data-toggle="modal" data-target="#sure"> <button class="umbotao ml-2" onclick="mensagemsure("essa notícia")" data-toggle="tooltip" data-placement="bottom" title="Excluir Notícia"><i class="fas fa-times"></i></button></span>';
			}

			function enable(message){
				document.getElementById(message).disabled = false;
			}

			function resetarform(id){
				document.getElementById(id).reset();
			}

			function addparticipante() {
				document.getElementById('PartCamp').innerHTML += '<li class="mt-1"><div><img src="' + document.getElementById('fotoPC') + '" style="height: 2.5em; width: 2.5em; margin-right: 0.6em;">'+ document.getElementById('nomePC').value + '</div></li>';
			}

			function sortByMoney() { // ricos privilegiados :(
  				var table, rows, switching, i, x, y, shouldSwitch;
			  	table = document.getElementById("myt");
			  	switching = true;
				/*Make a loop that will continue until
				no switching has been done:*/
			 	 while (switching) {
			    	//start by saying: no switching is done:
			    	switching = false;
			    	rows = table.rows;
			    	/*Loop through all table rows:*/
			    	for (i = 0; i < (rows.length-1); i++) {
			      		//start by saying there should be no switching:
			      		shouldSwitch = false;
			      		/*Get the two elements you want to compare,
			      		one from current row and one from the next:*/
			      		x = rows[i].getElementsByTagName("SPAN")[0];
			      		y = rows[i + 1].getElementsByTagName("SPAN")[0];
			      		//check if the two rows should switch place:
			      		if (Number(x.innerHTML) < Number(y.innerHTML)) {
			        		//if so, mark as a switch and break the loop:
			        		shouldSwitch = true;
			       			break;
			      		}
			    	}
			    	if (shouldSwitch) {
					    /*If a switch has been marked, make the switch
					      and mark that a switch has been done:*/
					    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
					    switching = true;
			    	}
			  	}
			}

			$('.changeable').blur(function() {
    			if (contents!=$(this).html()){
        			sortByMoney();
        			contents = $(this).html();
    			}
			});
    			

    		function addIngrediente(lista, input, text){
    			document.getElementById(lista).innerHTML += '<li contenteditable="true" style="font-size: 0.8em;">' + document.getElementById(input).value + '</li>';
    			document.getElementById(text).value += document.getElementById(input).value + '-';
    			document.getElementById(input).value = '';
    		}

    		function infoequipes(){
    			// fazer um botão pra cada equipe aparecer
    			// deselecionar os options do select de membros da equipe
    		}

    		function changeColorSelect(color){
    			cor = color;
    		} 

    		$('#membrosequipes option').click(function(event) {
   				$(this).css("background-color", cor);
   				$(this).val($(this).val() + '-');
   				if(cor == '#d9534f'){
   					$(this).val($(this).val() + 'Vermelha');
   				} else if(cor == '#f0ad4e'){
   					$(this).val($(this).val() + 'Amarela');
   				} else if(cor == '#5cb85c'){
   					$(this).val($(this).val() + 'Verde');
   				} else if(cor == '#17a2b8'){
   					$(this).val($(this).val() + 'Azul');
   				}
			});

			$('#usuarios .alterar i').click(function(event) {
				if ($(this).hasClass('fa-user')) {
					$(this).addClass('fa-user-cog').removeClass('fa-user');
				}
				else if ($(this).hasClass('fa-user-cog')) {
   					$(this).addClass('fa-user').removeClass('fa-user-cog');
				}
			});

			$('#usuarios .VerMais, #boloes button').click(function(event) {
				if ($(this).html() == "Ver mais") {
					$(this).parent().parent().find('.divescondida').css("display", "block");
					$(this).html("Esconder");
				}
				else {	
					$(this).parent().parent().find('.divescondida').css("display", "none");
					$(this).html("Ver mais");
				}
			});

			function liberar_senha() {
	    		if(document.getElementById('tipo-bolao').value == "privado"){
	    			document.getElementById('senha').style.display = "block";
	    		} else {
	    			document.getElementById('senha').style.display = "none";
	    		}
	    	}

	    	function create_alert(message){
				document.getElementById('escolhas').innerHTML += '<div class="alert alert-info alert-dismissible w-100"><a class="close" data-dismiss="alert">&times;</a><span>'+ message +'</span></div>';
			}

	    	function carrega_escolha() {
	    		create_alert(document.getElementById('opcao').value); 
	    	}

	    	$(document).ready(function(){
  				$("#filtro").on("keyup", function() {
    				var value = $(this).val().toLowerCase();
    				$("#usuarios .card").filter(function() {
      					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    				});
  				});

  				$("#filtrob").on("keyup", function() {
    				var value = $(this).val().toLowerCase();
    				$("#boloes .card").filter(function() {
      					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    				});
  				});
			});

			function outro(select, input){
				if(document.getElementById(select).value == 'outro'){
					document.getElementById(input).style.display = "block";
				} else {
					document.getElementById(input).style.display = "none";
				}
			}

		</script>
	</body>
</html>
