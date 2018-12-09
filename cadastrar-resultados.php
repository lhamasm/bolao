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
			        			<a class="nav-link" href="adm-page.php">PÁGINA PRINCIPAL</a>
			        		</li>

			              	<li class="nav-item ml-3">
			              		<a class="nav-link" href="cadastrar-resultados.php">CADASTRAR RESULTADOS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="cadastrar-bolao.php">CRIAR BOLÃO</a>
			              	</li>

			              	<li class="nav- ml-3">
			              		<a class="nav-link" href="#">USUÁRIOS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			              		<a class="nav-link" href="#">BOLÕES</a>
			              	</li>
			            </ul>
					</div>
				</div>
			</nav>
		</section>

		<section>
			<div class="container">
				<div class="row">
					<div class="offset-3 col-6">
						<form method="post" action="php/cadastrar-jogo.php">
							<div class="row my-2">
								<div class="col-5 form-group">
									<label for="tipo">Tipo</label>
									<select class="form-control custom-select" id="tipo" name="tipo" onchange="tipo_jogo()">
										<option value="caixa-misteriosa" selected>Caixa Misteriosa</option>
										<option value="equipes">Equipes</option>
										<option value="eliminacao">Eliminação</option>
										<option value="repescagem">Repescagem</option>
										<option value="semifinal">Semifinal</option>
										<option value="final">Final</option>
									</select>
								</div>

								<div class="offset-2 col-5 form-group">
									<label for="data" name="data">Data da Prova</label>
									<input class="form-control" type="date" id="data" name="data">
								</div>
							</div>

							<div id="equipe" class="my-2" style="display: none;">
								<label>Resultado</label><br>
								<div class="row" style="font-family: robotok;">									
									<div class="col-5">
										<input type="checkbox" id="adriana" name="adriana">
										<label for="adriana">Adriana</label><br>
										<input type="checkbox" id="alex" name="alex">
										<label for="alex">Alex</label><br>
										<input type="checkbox" id="andre" name="andre">
										<label for="andre">André</label><br>
										<input type="checkbox" id="andreR" name="andreR">
										<label for="andreR">André R.</label><br>
										<input type="checkbox" id="daniel" name="daniel">
										<label for="daniel">Daniel</label><br>
										<input type="checkbox" id="heaven" name="heaven">
										<label for="heaven">Heaven</label><br>
										<input type="checkbox" id="manuela" name="manuela">
										<label for="manuela">Manuela</label><br>
									</div>

									<div class="offset-2 col-4">
										<input type="checkbox" id="marcela" name="marcela">
										<label for="marcela">Marcela</label><br>
										<input type="checkbox" id="paulo" name="paulo">
										<label for="paulo">Paulo</label><br>
										<input type="checkbox" id="rafael" name="rafael">
										<label for="rafael">Rafael</label><br>
										<input type="checkbox" id="roberta" name="roberta">
										<label for="roberta">Roberta</label><br>
										<input type="checkbox" id="simone" name="simone">
										<label for="simone">Simone</label><br>
										<input type="checkbox" id="thalles" name="thalles">
										<label for="thalles">Thalles</label><br>
										<input type="checkbox" id="will" name="will">
										<label for="will">William</label><br>
									</div>
								</div>

								<div class="row"> <label class="col-6" for="cor">Cor da Equipe</label> </div>
								<div class="row">
									<div class="col-6 form-group">
										<select class="form-control custom-select" id="cor" name="cor" onchange="outra_cor()">
											<option value="Amarela" selected>Amarela</option>
											<option value="Azul" >Azul</option>
											<option value="Vermelha">Vermelha</option>
											<option value="Outra">Outra</option>
										</select>
									</div>
									<div id="outra-cor" class="form-group col-6" style="display:none;">
										<input class="form-control" type="text" id="corr" name="corr">
									</div>
								</div>
							</div>

							<div class="my-2" id="nao-equipe">
								<label>Resultado</label><br>
								<div class="row" style="font-family: robotok;">									
									<div class="col-5">
										<input type="checkbox" id="adriana" name="adriana">
										<label for="adriana">Adriana</label><br>
										<input type="checkbox" id="alex" name="alex">
										<label for="alex">Alex</label><br>
										<input type="checkbox" id="andre" name="andre">
										<label for="andre">André</label><br>
										<input type="checkbox" id="andreR" name="andreR">
										<label for="andreR">André R.</label><br>
										<input type="checkbox" id="daniel" name="daniel">
										<label for="daniel">Daniel</label><br>
										<input type="checkbox" id="heaven" name="heaven">
										<label for="heaven">Heaven</label><br>
										<input type="checkbox" id="manuela" name="manuela">
										<label for="manuela">Manuela</label><br>
									</div>

									<div class="offset-2 col-4">
										<input type="checkbox" id="marcela" name="marcela">
										<label for="marcela">Marcela</label><br>
										<input type="checkbox" id="paulo" name="paulo">
										<label for="paulo">Paulo</label><br>
										<input type="checkbox" id="rafael" name="rafael">
										<label for="rafael">Rafael</label><br>
										<input type="checkbox" id="roberta" name="roberta">
										<label for="roberta">Roberta</label><br>
										<input type="checkbox" id="simone" name="simone">
										<label for="simone">Simone</label><br>
										<input type="checkbox" id="thalles" name="thalles">
										<label for="thalles">Thalles</label><br>
										<input type="checkbox" id="william" name="william">
										<label for="william">William</label><br>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button class="btn btn-info btn-block my-2" type="submit">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
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
    	<div class="modal">
    		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<div class="modal-header">
    					
    				</div>
    				<div class="modal-body">
    					
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
    	

    	<!-- foooooooooter -->
		<footer style="background-color: #B22222;">
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
							<a data-toggle="modal" data-target="#repbugs" class="nav-link">REPORTAR BUGS</a>
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

		<!-- scriiiiiiiiiiiipt-->
		<script type="text/javascript">
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
				} else {
					document.getElementById('divNoticias').style.display = "none";
					document.getElementById('divRanking').style.display = "none";
					document.getElementById('divCampeonato').style.display = "none";
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

			function tipo_jogo(){
				if(document.getElementById('tipo').value == 'equipes'){
					document.getElementById('equipe').style.display = "block";
					document.getElementById('nao-equipe').style.display = "none";
				} else {
					document.getElementById('equipe').style.display = "none";
					document.getElementById('nao-equipe').style.display = "block";
				}
			}

			function outra_cor() {
				if(document.getElementById('cor').value == 'outra'){
					document.getElementById('outra-cor').style.display = 'block';
				} else {
					document.getElementById('outra-cor').style.display = 'none';
				}
			}
    			 
		</script>
		
		
	</body>
</html>