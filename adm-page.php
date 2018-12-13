<!doctype html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta author="Larissa Machado && Sabrina Sales">
		<title>ADM</title>

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
						<!-- página de usuário -->
						<li class="nav-item ml-4"><a href="index-pagina-pessoal.html" data-toggle="tooltip" data-placement="bottom" title="Página de usuário"><i class="fas fa-exchange-alt text-white"></i></a></li>
						<!-- bugs && convites -->
						<li class="nav-item ml-3"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Caixa de mensagens"><i class="far fa-envelope text-white"></i></a></li>
						<!-- minha conta -->
						<li class="nav-item ml-3"><a href="#"><i class="far fa-user text-white"></i></a></li>
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

		<section id="cadastrarResultados" style="display: none;">
			<div class="text-center justify-content-center">
				<select class="mt-2">
					<option value="profissionais">Profissionais</option>
					<option value="amadores">Amadores</option>
				</select>

				<select class="mt-2">
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

				<ul class="pagination mt-2 text-center justify-content-center">
					<li>
						<button id="an" onclick="show_plz('caixaMisteriosa');" style="background-color: #4c9593">Caixa Misteriosa</button>
					</li>
					<li>
						<button id="b" onclick="show_plz('equipes');">Equipes</button>
					</li>
					<li>
						<button id="c" onclick="show_plz('eliminacao');">Eliminação</button>
					</li>
					<li>
						<button id="d" onclick="show_plz('repescagem');">Repescagem</button>	
					</li>
					<li>
						<button id="en" onclick="show_plz('semifinal');">Semifinal</button>
					</li>
					<li>
						<button id="f" onclick="show_plz('final');">Final</button>
					</li>
				</ul>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-2"></div>
					<div id="caixaMisteriosa"  class="col-8">
						<form>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2" >Data da Prova</h6>
										<input type="date" id="dataProva" value="2018-12-11">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Tema</h6>
										<input type="text" name="tema">
									</div>

									<div class="form-group">
										<h6 class="mt-4"><i style="color: #ffff00" class="fas fa-lemon"></i>  Ingredientes   <i style="color: #ff0000;" class="fas fa-apple-alt"></i></h6>
										<ul id="ingredientes">
											
										</ul>

										<input type="text" id="entradaIngrediente">
										<button onclick="addIngrediente();">+</button>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2">Prêmio</h6>
										<input type="text" name="premio" placeholder="R$">
									</div>
									<div class="form-group">
										<h6>Tempo de Prova</h6>
										<input type="text" name="tempoProva" placeholder="minutos">
									</div>
									<div class="form-group">
										<select class="mt-2" style="border-width: 0.15em; border-left-color: #234342; border-top-color: #234342;">
											<option value="nonselected"><b>Ganhador</b></option>
											<option value="Fulano">Fulano</option>
											<option value="Beltrano">Beltrano</option>
											<option value="Sicrano">Sicrano</option>
										</select>

										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;" placeholder="Descreva o prato do Ganhador"></textarea>
									</div>
								</div>
							</div>
							<div class="row text-center justify-content-center">
								<input class="btn bg-white mb-2" style="border-color: #ff3333; color: #ff3333;" type="submit" name="Salvar">
							</div>
						</form>
					</div>
					<div id="equipes" style="display: none;"  class="col-8">
						<form>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2" >Data da Prova</h6>
										<input type="date" id="dataProva" value="2018-12-11">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Tema</h6>
										<input type="text" name="tema">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Cenário</h6>
										<input type="text" name="cenario">
									</div>
									<div class="form-group">
										<h6>Descrição</h6>
										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2">Prêmio</h6>
										<input type="text" name="premio" placeholder="R$">
									</div>
									<div class="form-group">
										<h6>Tempo de Prova</h6>
										<input type="text" name="tempoProva" placeholder="minutos">
									</div>
									<div class="form-group">
										<h6 style="display: inline; margin-right: 0.5em;">Equipes</h6>
										<input type="number" min="2" max="4" onchange="infoequipes();" id="numeroequipes" value="2">
										<label style="display: block; margin-top: 1.5em; margin-bottom: 0em;">Selecione a cor do time e os membros:</label>
										<div>
											<button type="button" class="btn bg-danger ml-1 mb-1" onclick="changeColorSelect('#d9534f');"></button>
											<button type="button" class="btn bg-warning ml-1 mb-1" onclick="changeColorSelect('#f0ad4e');"></button>
											<button type="button" class="btn bg-success ml-1 mb-1" style="display:none;" onclick="changeColorSelect('#5cb85c');"></button>
											<button type="button" class="btn bg-info ml-1 mb-1" style="display:none;" onclick="changeColorSelect('#17a2b8');"></button>
										</div>
										<select  id="membrosequipes" multiple style="width: 12em;">
											<option>Fulano</option>
											<option>Sicrano</option>
											<option>Beltrano</option>
											<option>Jurema</option>
											<option>Robson</option>
											<option>Jéssica</option>
											<option>Creide</option>
											<option>Meh</option>
											<option>Mah</option>
											<option>Mula</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row text-center justify-content-center">
								<input class="btn bg-white mb-2" style="border-color: #ff3333; color: #ff3333;" type="submit" name="Salvar">
							</div>
						</form>
					</div>
					<div id="eliminacao" style="display: none;"  class="col-8">
						<form>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2" >Data da Prova</h6>
										<input type="date" id="dataProva" value="2018-12-11">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Tema</h6>
										<input type="text" name="tema">
									</div>

									<div class="form-group">
										<h6>Descrição</h6>
										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2">Prêmio</h6>
										<input type="text" name="premio" placeholder="R$">
									</div>
									<div class="form-group">
										<h6>Tempo de Prova</h6>
										<input type="text" name="tempoProva" placeholder="minutos">
									</div>
									<div class="form-group">
										<select class="mt-2" style="border-width: 0.15em; border-left-color: #234342; border-top-color: #234342;">
											<option value="nonselected"><b>Eliminado</b></option>
											<option value="Fulano">Fulano</option>
											<option value="Beltrano">Beltrano</option>
											<option value="Sicrano">Sicrano</option>
										</select>

										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;" placeholder="Descreva o prato do Eliminado"></textarea>
									</div>
								</div>
							</div>
							<div class="row text-center justify-content-center">
								<input class="btn bg-white mb-2" style="border-color: #ff3333; color: #ff3333;" type="submit" name="Salvar">
							</div>
						</form>
					</div>
					<div id="repescagem" style="display: none;"  class="col-8">
						<form>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2" >Data da Prova</h6>
										<input type="date" id="dataProva" value="2018-12-11">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Tema</h6>
										<input type="text" name="tema">
									</div>

									<div class="form-group">
										<h6>Descrição</h6>
										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2">Prêmio</h6>
										<input type="text" name="premio" placeholder="R$">
									</div>
									<div class="form-group">
										<h6>Tempo de Prova</h6>
										<input type="text" name="tempoProva" placeholder="minutos">
									</div>
									<div class="form-group">
										<select class="mt-2" style="border-width: 0.15em; border-left-color: #234342; border-top-color: #234342;">
											<option value="nonselected"><b>Ganhador</b></option>
											<option value="Fulano">Fulano</option>
											<option value="Beltrano">Beltrano</option>
											<option value="Sicrano">Sicrano</option>
										</select>

										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;" placeholder="Descreva o prato do Ganhador"></textarea>
									</div>
								</div>
							</div>
							<div class="row text-center justify-content-center">
								<input class="btn bg-white mb-2" style="border-color: #ff3333; color: #ff3333;" type="submit" name="Salvar">
							</div>
						</form>
					</div>
					<div id="semifinal" style="display: none;"  class="col-8">
						<form>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2" >Data da Prova</h6>
										<input type="date" id="dataProva" value="2018-12-11">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Tema</h6>
										<input type="text" name="tema">
									</div>

									<div class="form-group">
										<h6>Descrição</h6>
										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2">Prêmio</h6>
										<input type="text" name="premio" placeholder="R$">
									</div>
									<div class="form-group">
										<h6>Tempo de Prova</h6>
										<input type="text" name="tempoProva" placeholder="minutos">
									</div>
									<div class="form-group">
										<select class="mt-2" style="border-width: 0.15em; border-left-color: #234342; border-top-color: #234342;">
											<option value="nonselected"><b>Ganhador</b></option>
											<option value="Fulano">Fulano</option>
											<option value="Beltrano">Beltrano</option>
											<option value="Sicrano">Sicrano</option>
										</select>

										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;" placeholder="Descreva o prato do Ganhador"></textarea>
									</div>
								</div>
							</div>
							<div class="row text-center justify-content-center">
								<input class="btn bg-white mb-2" style="border-color: #ff3333; color: #ff3333;" type="submit" name="Salvar">
							</div>
						</form>
					</div>
					<div id="final" style="display: none;"  class="col-8">
						<form>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2" >Data da Prova</h6>
										<input type="date" id="dataProva" value="2018-12-11">
									</div>

									<div class="form-group">
										<h6 class="mt-2">Tema</h6>
										<input type="text" name="tema">
									</div>

									<div class="form-group">
										<h6>Descrição</h6>
										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;"></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<h6 class="mt-2">Prêmio</h6>
										<input type="text" name="premio" placeholder="R$">
									</div>
									<div class="form-group">
										<h6>Tempo de Prova</h6>
										<input type="text" name="tempoProva" placeholder="minutos">
									</div>
									<div class="form-group">
										<select class="mt-2" style="border-width: 0.15em; border-left-color: #234342; border-top-color: #234342;">
											<option value="nonselected"><b>Ganhador</b></option>
											<option value="Fulano">Fulano</option>
											<option value="Beltrano">Beltrano</option>
											<option value="Sicrano">Sicrano</option>
										</select>

										<textarea class="mt-2" style="display: block; width: 17em; min-height: 5em;" placeholder="Descreva o prato do Ganhador"></textarea>
									</div>
								</div>
							</div>
							<div class="row text-center justify-content-center">
								<input class="btn bg-white mb-2" style="border-color: #ff3333; color: #ff3333;" type="submit" name="Salvar">
							</div>
						</form>
					</div>
					<div class="col-2"></div>
				</div>
			</div>

		</section>

		<section id="criarBolao" style="display: none;">
			
		</section>

		<section id="usuarios" style="display: none;">
			
		</section>

		<section id="boloes" style="display: none;">
			
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
							<button type="button" class="col-6 close" style="padding: 0.5em; background-color: #C0C0C0;" data-dismiss="modal">Cancelar</button>
							<button type="button" class="col-6 close" style="padding: 0.5em; background-color: #FF0000;" data-dismiss="modal">Sim</button>
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
				} else {
					document.getElementById(ash).style.display = "none";
				}
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
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";

					document.getElementById('an').style.backgroundColor = "#4c9593";
					document.getElementById('b').style.backgroundColor = "#b2d1d0";
					document.getElementById('c').style.backgroundColor = "#b2d1d0";
					document.getElementById('d').style.backgroundColor = "#b2d1d0";
					document.getElementById('en').style.backgroundColor = "#b2d1d0";
					document.getElementById('f').style.backgroundColor = "#b2d1d0";

				} else if (ash == 'equipes') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";

					document.getElementById('b').style.backgroundColor = "#4c9593";
					document.getElementById('an').style.backgroundColor = "#b2d1d0";
					document.getElementById('c').style.backgroundColor = "#b2d1d0";
					document.getElementById('d').style.backgroundColor = "#b2d1d0";
					document.getElementById('en').style.backgroundColor = "#b2d1d0";
					document.getElementById('f').style.backgroundColor = "#b2d1d0";
				} else if (ash == 'eliminacao') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";

					document.getElementById('c').style.backgroundColor = "#4c9593";
					document.getElementById('an').style.backgroundColor = "#b2d1d0";
					document.getElementById('b').style.backgroundColor = "#b2d1d0";
					document.getElementById('d').style.backgroundColor = "#b2d1d0";
					document.getElementById('en').style.backgroundColor = "#b2d1d0";
					document.getElementById('f').style.backgroundColor = "#b2d1d0";
				} else if (ash == 'repescagem') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('final').style.display = "none";

					document.getElementById('d').style.backgroundColor = "#4c9593";
					document.getElementById('an').style.backgroundColor = "#b2d1d0";
					document.getElementById('c').style.backgroundColor = "#b2d1d0";
					document.getElementById('b').style.backgroundColor = "#b2d1d0";
					document.getElementById('en').style.backgroundColor = "#b2d1d0";
					document.getElementById('f').style.backgroundColor = "#b2d1d0";
				} else if (ash == 'semifinal') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('equipes').style.display = "none";
					document.getElementById('final').style.display = "none";

					document.getElementById('en').style.backgroundColor = "#4c9593";
					document.getElementById('an').style.backgroundColor = "#b2d1d0";
					document.getElementById('c').style.backgroundColor = "#b2d1d0";
					document.getElementById('d').style.backgroundColor = "#b2d1d0";
					document.getElementById('b').style.backgroundColor = "#b2d1d0";
					document.getElementById('f').style.backgroundColor = "#b2d1d0";
				} else if (ash == 'final') {
					document.getElementById('caixaMisteriosa').style.display = "none";
					document.getElementById('eliminacao').style.display = "none";
					document.getElementById('repescagem').style.display = "none";
					document.getElementById('semifinal').style.display = "none";
					document.getElementById('equipes').style.display = "none";

					document.getElementById('f').style.backgroundColor = "#4c9593";
					document.getElementById('an').style.backgroundColor = "#b2d1d0";
					document.getElementById('c').style.backgroundColor = "#b2d1d0";
					document.getElementById('d').style.backgroundColor = "#b2d1d0";
					document.getElementById('en').style.backgroundColor = "#b2d1d0";
					document.getElementById('b').style.backgroundColor = "#b2d1d0";
				}
			}

			// função faz aparecer um modal dizendo "tem certeza que deseja excluir 'message'?"
			function mensagemsure(message){
				document.getElementById('textosure').innerHTML = '<div id="textosure" class="modal-body"> <p class="text-center" style="margin: 2em;"><strong>Tem certeza que quer excluir ' + message + '?</strong></p> <div><button type="button" class="col-6 close" style="padding: 0.5em; background-color: #C0C0C0;" data-dismiss="modal">Cancelar</button><button type="button" class="col-6 close" style="padding: 0.5em; background-color: #FF0000;" data-dismiss="modal">Sim</button></div></div>';
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
    			

    		function addIngrediente(){
    			document.getElementById('ingredientes').innerHTML += '<li contenteditable="true" style="font-size: 0.8em;">' + document.getElementById('entradaIngrediente').value + '</li>';
    			document.getElementById('entradaIngrediente').value = '';
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
			});
		</script>
	</body>
</html>
