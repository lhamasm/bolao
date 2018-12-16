<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Icone da aba -->
    <link rel="icon" href="../images/logo-vermelho.png">

    <link rel="stylesheet" type="text/css" href="../css/style-login.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Entrar</title>
  </head>
  <body>

    <?php
      session_start();
    ?>
    
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

          <a class="navbar-brand" href="../index.php">
            <img style="width: 2.5em" src="../images/logo-vermelho.png">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="nav-collapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../index.php#programa">O programa</a>
              </li>

              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

              <li class="nav-item">
                <a class="nav-link" href="../index.php#participantes">Os participantes</a>
              </li>

              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

              <li class="nav-item">
                <a class="nav-link" href="../index.php#aux-section">Como jogar</a>
              </li>

              <li class="nav-item divisor bg-danger d-none d-lg-block"></li>

              <li class="nav-item">
                <a class="nav-link" href="../index.php#noticias">Noticias</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section class="mb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <img class="d-none d-md-block" src="images/fundo.jpg">
          </div>

          <div class="col-md-3">
          </div>
          <div id="login" class="col-auto offset-1 offset-sm-3 col-md-6 offset-md-0 d-flex">
            <div>
              <?php
                if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                  echo '<div class="alert alert-success" style="width: 20em;">
                    Cadastro realizado com sucesso!
                  </div>'; 
                } elseif(isset($_SESSION['status']) && $_SESSION['status'] == 2){
                  echo '<div class="alert alert-danger" style="width: 20em;">
                    Usuário não cadastrado no sistema!
                  </div>'; 
                } elseif(isset($_SESSION['status']) && $_SESSION['status'] == 3){
                  echo '<div class="alert alert-danger" style="width: 20em;">
                    Senha incorreta!
                  </div>'; 
                }

                $_SESSION['status'] = -1;
              ?>
              <div class="col-md-auto offset-3">
                <img style="width:6.5em;" src="../images/logo-vermelho.png">
              </div>

              <form class="form shadow" method="post" action="php/login.php">
                <div class="form-group">
                  <label for="cpf">Login: </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="titulo input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required autofocus>
                  </div>                  
                </div>
                
                <div class="form-group">
                  <label for="pwd">Senha: </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="titulo input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Digite sua senha" required>
                  </div> 
                </div>

                <div class="form-group">
                  <label>
                    <input type="checkbox" id="lembra" name="lembra"> Lembre-se de mim
                  </label>
                </div>

                <div class="row form-group">
                  <button class="mb-1 col-sm-5 mb-sm-0 ml-sm-3 mr-sm-2 btn btn-danger" tye="button" name="entrar">Entrar</button>
                  <a class="col-sm-5 btn btn-info text-white" name="cadastrar" href="cadastro.php">Cadastrar</a>
                </div>
                <a href="esqueci-senha.php" class="text-info">Esqueceu a senha?</a>
              </form>
            </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
      $('#cpf').mask('000.000.000-00');
    </script>

  </body>
</html>
