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
						<li class="nav-item ml-auto">BEM-VINDO(A) <strong> <?php echo $_SESSION["nome"]; ?></strong></strong></li>
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
								<select class="form-control custom-select" name="filtro" id="filtro" onchange="filtro()">
									<option value="ano" selected>Ano</option>
									<option value="mes">Mês</option>
									<option value="semana">Semana</option>
								</select>
							</div>
						</form>	
					</div>
				</div>

				<div id="year">
					<div class="row justify-content-center">
						<div class="col-1">
							<button class="btn btn-outline-info" type="button" onclick="ano()">2015</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info" type="button" onclick="ano()">2016</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info" type="button" onclick="ano()">2017</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info" type="button" onclick="ano()">2018</button>
						</div>
					</div>
				</div>

				<div id="month" style="display: none;">
					<div class="row justify-content-center mb-2">
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">JAN</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">FEV</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">MAR</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">ABR</button>
						</div>
					</div>
					<div class="row justify-content-center mb-2">
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">MAI</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">JUN</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">JUL</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">AGO</button>
						</div>
					</div>
					<div class="row justify-content-center mb-2">
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">SET</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">OUT</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">NOV</button>
						</div>
						<div class="col-1">
							<button class="btn btn-outline-info btn-block" type="button" onclick="mes()">DEZ</button>
						</div>
					</div>
				</div>

				<div id="historico" style="display: none;">
					<div class="row">
						<div id="meses" class="carousel slide" data-ride="carousel" style="width:100vw;">
						  <div class="carousel-inner">
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
						    	<hr>
						    	<div class="row">
						    		<div class="col-2 align-self-center" style="font-family: robotoBold;">
						    			<h3 class="text-center">1</h3>
						    			<h6 class="text-center">SEGUNDA-FEIRA</h6>
						    		</div>
						    		<div class="col-10">
						    			<table class="table text-center" style="font-family: robotok;">
						    				<thead class="thead-dark">
						    					<th>BOLÃO</th>
						    					<th>ESCOLHA DE APOSTA</th>
						    					<th>TIPO DE JOGO</th>
						    					<th>TIPO DE APOSTA</th>
						    					<th>VALOR</th>
						    				</thead>
						    				<tbody>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ANDRÉ</td>
							    					<td>FINAL</td>
							    					<td>QUEM VAI GANHAR</td>
							    					<td>R$ 100,00</td>
						    					</tr>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ADRIANA</td>
							    					<td>PROVA DE ELIMINAÇÃO</td>
							    					<td>QUEM VAI PERDER</td>
							    					<td>R$ 1000,00</td>
						    					</tr>
						    				</tbody>
						    			</table>
						    		</div>
						    	</div>

						    	<hr>

						    	<div class="row">
						    		<div class="col-2 align-self-center" style="font-family: robotoBold;">
						    			<h3 class="text-center">2</h3>
						    			<h6 class="text-center">TERÇA-FEIRA</h6>
						    		</div>
						    		<div class="col-10">
						    			<table class="table text-center" style="font-family: robotok;">
						    				<thead class="thead-dark">
						    					<th>BOLÃO</th>
						    					<th>ESCOLHA DE APOSTA</th>
						    					<th>TIPO DE JOGO</th>
						    					<th>TIPO DE APOSTA</th>
						    					<th>VALOR</th>
						    				</thead>
						    				<tbody>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ANDRÉ</td>
							    					<td>FINAL</td>
							    					<td>QUEM VAI GANHAR</td>
							    					<td>R$ 100,00</td>
						    					</tr>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ADRIANA</td>
							    					<td>PROVA DE ELIMINAÇÃO</td>
							    					<td>QUEM VAI PERDER</td>
							    					<td>R$ 1000,00</td>
						    					</tr>
						    				</tbody>
						    			</table>
						    		</div>
						    	</div>
						    </div>

						    <div id="feveiro" class="carousel-item">
						    	<h1 class="text-center titulo text-dark">
						    		<a class="mr-3 text-danger" href="#meses" data-slide="prev">
										<i class="fas fa-angle-left"></i>
									</a>
									Fevereiro
									<a class="ml-3 text-danger" href="#meses" data-slide="next">
						    			<i class="fas fa-angle-right"></i>
						  			</a>
						  		</h1>
						    	<hr>
						    	<div class="row">
						    		<div class="col-2 align-self-center" style="font-family: robotoBold;">
						    			<h3 class="text-center">1</h3>
						    			<h6 class="text-center">QUINTA-FEIRA</h6>
						    		</div>
						    		<div class="col-10">
						    			<table class="table text-center" style="font-family: robotok;">
						    				<thead class="thead-dark">
						    					<th>BOLÃO</th>
						    					<th>ESCOLHA DE APOSTA</th>
						    					<th>TIPO DE JOGO</th>
						    					<th>TIPO DE APOSTA</th>
						    					<th>VALOR</th>
						    				</thead>
						    				<tbody>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ANDRÉ</td>
							    					<td>FINAL</td>
							    					<td>QUEM VAI GANHAR</td>
							    					<td>R$ 100,00</td>
						    					</tr>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ADRIANA</td>
							    					<td>PROVA DE ELIMINAÇÃO</td>
							    					<td>QUEM VAI PERDER</td>
							    					<td>R$ 1000,00</td>
						    					</tr>
						    				</tbody>
						    			</table>
						    		</div>
						    	</div>

						    	<hr>

						    	<div class="row">
						    		<div class="col-2 align-self-center" style="font-family: robotoBold;">
						    			<h3 class="text-center">2</h3>
						    			<h6 class="text-center">SEXTA-FEIRA</h6>
						    		</div>
						    		<div class="col-10">
						    			<table class="table text-center" style="font-family: robotok;">
						    				<thead class="thead-dark">
						    					<th>BOLÃO</th>
						    					<th>ESCOLHA DE APOSTA</th>
						    					<th>TIPO DE JOGO</th>
						    					<th>TIPO DE APOSTA</th>
						    					<th>VALOR</th>
						    				</thead>
						    				<tbody>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ANDRÉ</td>
							    					<td>FINAL</td>
							    					<td>QUEM VAI GANHAR</td>
							    					<td>R$ 100,00</td>
						    					</tr>
						    					<tr>
						    						<td>MEU BOLÃO</td>
							    					<td>ADRIANA</td>
							    					<td>PROVA DE ELIMINAÇÃO</td>
							    					<td>QUEM VAI PERDER</td>
							    					<td>R$ 1000,00</td>
						    					</tr>
						    				</tbody>
						    			</table>
						    		</div>
						    	</div>
						    </div>
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

			function mes() {
				document.getElementById('month').style.display = "none";
				document.getElementById('formulario').style.display = "none";
				document.getElementById('historico').style.display = "block";
			}
		</script>
	</body>

</html>