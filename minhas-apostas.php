<?php
	
	require_once 'php/sistema.php';
	require_once 'php/bolao.php';
	require_once 'php/usuario.php';
	require_once 'php/jogo.php';
	require_once 'php/aposta.php';
	require_once 'php/apostar.php';

	//session_start();

	$sistema = $_SESSION['sistema'];
	$boloes = $sistema->getBoloes();
	$usuarios = $sistema->getUsuarios();
	$jogos = $sistema->getJogos();
?>

<!doctype html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Larissa Machado && Sabrina Sales">

		<title>Minhas Apostas</title>
	
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
						<li class="nav-item"><strong>MASTERCHEF BRASIL 2018 - PROFISSIONAIS</strong> | </li>
						<li class="nav-item ml-2">POSIÇÃO: posição | </li>
						<li class="nav-item ml-2">PONTUAÇÃO: pontuação</li>
					</ul>

					<ul class="navbar-nav">
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong> <?php echo $_SESSION['nome']; ?></strong></li>
						<!-- trocar de modalidade -->
						<li class="nav-item ml-4"><a href="#"><i class="fas fa-exchange-alt text-white"></i></a></li>
						<!-- convites -->
						<li class="nav-item ml-3"><a href="convites.php"><i class="far fa-envelope text-white"></i></a></li>
						<!-- minha conta -->
						<li class="nav-item ml-3"><a href="minha-conta.php"><i class="far fa-user text-white"></i></a></li>
						<!-- sair -->
						<li class="nav-item ml-3"><a href="index.php"><i class="fas fa-sign-out-alt text-white"></i></a></li>
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
			                	<a class="nav-link atual" href="minhas-apostas.php">MINHAS APOSTAS</a>
			              	</li>

			              	<li class="nav-item ml-3">
			                	<a class="nav-link" href="historico-apostas.php">MEU HISTÓRICO DE APOSTAS</a>
			              	</li>
			            </ul>
					</div>
				</div>
			</nav>
		</section>

		<section id="apostas">
			<div class="container">

				<?php

					for($i = 0; $i < count($usuarios); $i++){
						if($usuarios[$i]->getCpf() == $_SESSION['login']){
							$apostas = $usuarios[$i]->getApostas();


							if(count($apostas) > 0){
								for($j=0; $j<count($apostas); $j++){
									echo '<div id="aposta' . $j+1 . '" class="row">
											<h5 class="col-md-4">' . ($apostas[$j]->getBolao())->getTitulo() . '</h5>
											<h5 class="col-md-3"><i class="fas fa-dollar-sign col-md-1"></i>' .  $apostas[$j]->getValor() . '</h5>
											<h5 class="col-md-4">' . $apostas[$j]->getOpcaoDeAposta() . '</h5>
											<div class="col-md-1">
												<button style="padding: 0; background: none; border: none;" data-toggle="modal" data-target="#editAposta"><i class="fas fa-edit mr-3"></i></button>
												<button style="padding: 0; border: none; background: none;" data-toggle="modal" data-target="#sure"><i class="fas fa-times"></i></button>
											</div>
										</div>

										<hr>';
								}
							}else {
								echo '<h3 class="text-center">Não há apostas cadastradas</h3>';
							}
						} 
					}

				?>
				
			</div>

			<div class="modal" id="sure">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header text-center justify-content-center">
							<i class="fas fa-exclamation-triangle" style="font-size: 2em; color: #FF002F"></i>
						</div>
						<div class="modal-body">
							<p class="text-center" style="margin: 2em;"><strong>Tem certeza que quer remover sua aposta neste bolão?</strong></p>
							<div>
								<button type="button" class="col-6 close" style="padding: 0.5em; background-color: #C0C0C0;" data-dismiss="modal">Cancelar</button>
								<button type="button" class="col-6 close" style="padding: 0.5em; background-color: #FF0000;" data-dismiss="modal">Sim</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal" id="editAposta">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header text-center justify-content-center">
							<h5>Editar Aposta</h5>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label style="font-size: 1.2em;"><strong>Nome do Bolão</strong></label>
								</div>
								<div class="form-group">
									<label style="margin-right: 1em;">Valor da Aposta:</label>
									<input id="valoraposta" name="valoraposta" type="texts">
								</div>
								<div class="form-group">
									<label style="margin-right: 1em;">Opção de Aposta:</label>
									<select>
										<option>Opção 1</option>
										<option>Opção 2</option>
										<option>Opção 3</option>
									</select>
								</div>
								<div class="text-center justify-content-center">
									<button class="btn btn-info">Salvar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

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
							<a class="nav-link" data-target="#termos" data-toggle="modal">TERMOS E CONDIÇÕES</a>
						</li>
						<li class="nav-item ml-md-2">
							<a class="nav-link" data-toggle="modal" data-target="#repbugs">REPORTAR BUGS</a>
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
			$('#telefone').mask('+00 00 0000-0000');
			$('#celular').mask('+00 00 0 0000-0000');
			$('#agencia').mask('0000-0');
			$('#conta').mask('00000-0');

			function alterar_dados() {
				document.getElementById('senha').style.display = 'block';
				document.getElementById('confirmar').style.display = 'block';
				document.getElementById('alterar-dados').style.display = 'none';
				document.getElementById('salvar-alteracao').style.display = 'block';

				document.getElementById('username').disabled = false;
				document.getElementById('email').disabled = false;
				document.getElementById('nome').disabled = false;
				document.getElementById('genero').disabled = false;
				document.getElementById('rg').disabled = false;
				document.getElementById('cpf').disabled = false;
				document.getElementById('ddn').type = 'date';
				document.getElementById('ddn').disabled = false;
				document.getElementById('telefone').disabled = false;
				document.getElementById('celular').disabled = false;
				document.getElementById('banco').disabled = false;
				document.getElementById('agencia').disabled = false;
				document.getElementById('conta').disabled = false;
			}

			function salvar_alteracoes() {
				document.getElementById('senha').style.display = 'none';
				document.getElementById('confirmar').style.display = 'none';
				document.getElementById('alterar-dados').style.display = 'block';
				document.getElementById('salvar-alteracao').style.display = 'none';

				document.getElementById('username').disabled = true;
				document.getElementById('email').disabled = true;
				document.getElementById('nome').disabled = true;
				document.getElementById('genero').disabled = true;
				document.getElementById('rg').disabled = true;
				document.getElementById('cpf').disabled = true;
				document.getElementById('ddn').type = 'text';
				document.getElementById('ddn').disabled = true;
				document.getElementById('telefone').disabled = true;
				document.getElementById('celular').disabled = true;
				document.getElementById('banco').disabled = true;
				document.getElementById('agencia').disabled = true;
				document.getElementById('conta').disabled = true;
			}

		</script>

	</body>
</html>