<?php
	session_start();
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
			                	<a class="nav-link" href="cadastrar-bolao.html">CRIAR BOLÃO</a>
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
									<input class="form-control" type="text" name="username" id="username" value="<?php echo $_SESSION["username"]; ?>" disabled>
								</div>

								<div id="senha" class="col-4 offset-4 form-group" style="display: none;">
									<label class="titulo" for="nova-senha">Criar Nova Senha <span class="text-danger">*</span>:</label>
									<input class="form-control" type="password" name="nova-senha" id="nova-senha">
								</div>
							</div>

							<div class="row">
								<div class="col-6 form-group">
									<label class="titulo" for="email">Email <span class="text-danger">*</span>:</label>
									<input class="form-control" type="email" name="email" id="email" value="<?php echo $_SESSION["email"]; ?>" disabled>
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
									<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $_SESSION["nome"]; ?>" disabled>
								</div>

								<div class="col-4 offset-1 form-group">
									<label class="titulo" for="genero">Gênero <span class="text-danger">*</span></label><br>
									<select id="genero" disabled>
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
									<input class="form-control" type="text" name="rg" id="rg" value="<?php echo $_SESSION["rg"]; ?>" disabled>
								</div>

								<div class="col-4 offset-4 form-group">
									<label class="titulo" for="ddn">Data de Nascimento <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="ddn" id="ddn" value="<?php echo $_SESSION["ddn"]; ?>" disabled>
								</div>
							</div>	
							
							<div class="row">
								<div class="col-4 form-group">
									<label class="titulo" for="telefone">Telefone <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="telefone" id="telefone" value="<?php echo $_SESSION["telefone"]; ?>" disabled>
								</div>

								<div class="col-4 offset-4 form-group">
									<label class="titulo" for="celular">Celular <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="celular" id="celular" value="<?php echo $_SESSION["celular"]; ?>" disabled>
								</div>
							</div>	

							<h4 class="titulo my-3 text-info">Dados Bancários</h4>
							<hr>

							<div class="row">
								<div class="col-4 form-group">
									<label class="titulo" for="banco">Banco <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="banco" id="banco" value="<?php echo $_SESSION["banco"]; ?>" disabled>
								</div>
								<div class="col-4 form-group">
									<label class="titulo" for="agencia">Agência <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="agencia" id="agencia" value="<?php echo $_SESSION["agencia"]; ?>" disabled>
								</div>
								<div class="col-4 offset-4form-group">
									<label class="titulo" for="conta">Conta <span class="text-danger">*</span>:</label>
									<input class="form-control" type="text" name="conta" id="conta" value="<?php echo $_SESSION["conta"]; ?>" disabled>
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