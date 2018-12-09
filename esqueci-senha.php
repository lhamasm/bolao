<!doctype html>

<html lang="pt-br">

	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Icone da aba -->
	    <link rel="icon" href="images/logo-vermelho.png">

	    <link rel="stylesheet" type="text/css" href="css/style-esqueci-senha.css">


	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	    <title>Recuperar Senha</title>
	</head>

	<body>

		<header>
	    	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(248,249,250);">
		        <div class="container">

		          <a class="navbar-brand" href="index-principal.php">
		            <img style="width: 2.5em" src="images/logo-vermelho.png">
		          </a>

		          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse">
		            <span class="navbar-toggler-icon"></span>
		          </button>

		          <div class="collapse navbar-collapse" id="nav-collapse">
		            <ul class="navbar-nav">
		              <li class="nav-item">
		                <a class="nav-link" href="index-principal.php#programa">O programa</a>
		              </li>

		              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

		              <li class="nav-item">
		                <a class="nav-link" href="index-principal.php#participantes">Os participantes</a>
		              </li>

		              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

		              <li class="nav-item">
		                <a class="nav-link" href="index-principal.php#aux-section">Como jogar</a>
		              </li>

		              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

		              <li class="nav-item">
		                <a class="nav-link" href="index-principal.php#noticias">Noticias</a>
		              </li>

		              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

		            </ul>
		            <div class="row" style="margin-left: 2em;">
						<a class="btn btn-outline-info" style="height: 2.5em; margin-left: 5em; margin-top: 1em;" href="index.php">Entrar</a>

		            	<vr class="nav-item divisor d-none d-lg-block" style="background-color: black;">

		            	<a class="mt-lg-1 ml-lg-3 btn btn-outline-danger" style="height: 2.5em;" href="cadastro.php">Cadastrar</a>
		        	</div>
		          </div>
		        </div>
	      	</nav>
	    </header>

	    <section style="height: 87.3vh;">
	    	<div class="container">
	    		<div class="row">
	    			<div id="tela-1" class="col-4 offset-1 align-self-center">
	    				<h3 class="text-info" style="font-family: robotoBold;">Recuperar Senha</h3>
	    				<form class="form shadow p-3" method="post" action="php/recuperacao-senha.php">
	    					<div class="form-group">
	    						<label style="font-family: robotoBold;" for="cpf">CPF</label>
	    						<input class="form-control" type="text" id="cpf" placeholder="Apenas números" style="width:60%;">
	    					</div>
	    					<div class="form-group">
	    						<label style="font-family: robotoBold;" for="email">Email</label>
	    						<input class="form-control" type="email" id="email">
	    					</div>
	    					<div class="form-group">
	    						<label style="font-family: robotoBold;" for="ddn">Data de Nascimento</label>
	    						<input class="form-control data-mask" style="width: 60%;" type="date" id="ddn" placeholder="DD/MM/AAAA">
	    					</div>
	    					<div class="form-group">
	    						<button class="btn btn-danger btn-block" type="submit" onclick="recuperar_senha()">Recuperar</button>
	    					</div>
	    				</form>
	    			</div>

	    			<div id="tela-2" class="col-4 offset-1 align-self-center" style="display: none;">
	    				<div id="alerta" class="alert alert-success" style="display: none; width: 20em;">
		    				Senha recuperada com <strong>sucesso</strong>!
		    			</div>
	    				<h3 class="text-info" style="font-family: robotoBold;">Recuperar Senha</h3>
	    				<form class="form shadow p-3" method="post" action="php/alterar-senha.php">
	    					<div class="form-group">
	    						<label style="font-family: robotoBold;" for="pwd">Nova Senha</label>
	    						<div class="input-group">
	    							<input class="form-control" type="password" id="pwd">
	    							<div class="input-group-append">
	    								<button id="visualizar" class="input-group-text btn" type="button"><i class="far fa-eye"></i></button>
	    							</div>
	    						</div>
	    					</div>

	    					<div class="form-group">
	    						<label style="font-family: robotoBold;" for="pwd-2">Confirme Nova Senha</label>
	    						<div class="input-group">
	    							<input class="form-control" type="password" id="pwd-2">
	    							<div class="input-group-append">
	    								<button id="visualizar-2" class="input-group-text btn" type="button"><i class="far fa-eye"></i></button>
	    							</div>
	    						</div>
	    					</div>
	    					
	    					<div class="form-group">
	    						<button class="btn btn-danger btn-block" type="button" onclick="confirmacao_recuperar_senha()">Recuperar</button>
	    					</div>
	    				</form>
	    			</div>

	    			<div class="col-6">
	    				<img style="height: 87.3vh;" src="images/chef-frustrado.jpg">
	    			</div>	    			
	    		</div>
	    	</div>
	    </section>

	    <footer class="fixed-bottom" style="background-color: #B22222">
      		<nav class="navbar navbar-expand-lg text-white navbar-dark">
        		<div class="container justify-content-center">
          			<ul class="navbar-nav">
           	 			<li class="nav-item">&copy Bolão MasterChef Brasil</li>
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
    		function recuperar_senha() {
    			document.getElementById('tela-1').style.display = "none";
    			document.getElementById('tela-2').style.display = "block";
    		}

    		function confirmacao_recuperar_senha() {
    			document.getElementById('alerta').style.display = "block";
    		}

    		$('#ddn').mask('00/00/0000');
    		$('#cpf').mask('000.000.000-00');

    		$("#visualizar").mousedown(function() {
	  			$("#pwd").attr("type", "text");
			});

			$("#visualizar").mouseup(function() {
			  $("#pwd").attr("type", "password");
			});

			$("#visualizar-2").mousedown(function() {
	  			$("#pwd-2").attr("type", "text");
			});

			$("#visualizar-2").mouseup(function() {
			  $("#pwd-2").attr("type", "password");
			});
    	</script>    	

	</body>

</html>