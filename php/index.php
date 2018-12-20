<?php

  session_start();

  require_once 'sistema.php';
  require_once 'usuario.php';
  require_once 'apostador.php';
  require_once 'jogo.php';
  require_once 'bolao.php';
  require_once 'aposta.php';
  require_once 'facade.php';
  require_once 'ArquivoBolao.php';
  require_once 'ArquivoJogos.php';
  require_once 'ArquivoUsuario.php';
  require_once 'ArquivoAposta.php';
  require_once 'ArquivoMensagem.php';


    $usuarios = array();
    $jogos = array();
    $boloes = array();
    $bugs = array();

    $sistema = new Sistema($usuarios, $jogos, $boloes, $bugs);
    $_SESSION['sistema'] = $sistema;

    $usuario = new ArquivoUsuario();
    $facade = new Facade($usuario);
    $facade->lerDe('../bd/usuarios.txt');

    $jogo = new ArquivoJogo();
    $facade = new Facade($jogo);
    $facade->lerDe('../bd/jogos.txt');

    $bolao = new ArquivoBolao();
    $facade = new Facade($bolao);
    $facade->lerDe('../bd/boloes.txt');

    //echo count($_SESSION['sistema']->getBoloes());
    $sistema = $_SESSION['sistema'];
    $usuarios = $sistema->getUsuarios();
    $aposta = new ArquivoAposta();
    $facade = new Facade($aposta);
    for($i=0; $i<count($usuarios); $i++){
      if(get_class($usuarios[$i]) == 'Apostador' || get_class($usuarios[$i]) == 'AdministradorBolao'){
        $facade->lerDe('../bd/apostas-' . $usuarios[$i]->getCpf() . '.txt');
      }
    }

    $sistema = $_SESSION['sistema'];
    $usuarios = $sistema->getUsuarios();
    $mensagem = new ArquivoMensagem();
    $facade = new Facade($mensagem);
    for($i=0; $i<count($usuarios); $i++){
      $facade->lerDe('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt');
    }

    $_SESSION["numero_usuarios"] = count($sistema->getUsuarios());
    $_SESSION['status'] = -1;

    /*if(file_exists('../bd/usuarios.txt')){
      $arquivo = fopen('../bd/usuarios.txt', 'r');

      while(!feof($arquivo)){
        $usuario = fgets($arquivo);

        $dados = explode(';', $usuario);
        $u = new Apostador($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[9], $dados[10], $dados[11], $dados[12], $dados[13], intval($dados[14]), intval($dados[15]));

        $sistema->setUsuarios($u);
      }

      fclose($arquivo);
    }

    if(file_exists('../bd/jogos.txt')){ 
      $arquivo = fopen('../bd/jogos.txt', 'r');

      while(!feof($arquivo)){
        $jogo = fgets($arquivo);

        $dados = explode(';', $jogo);
        $j = new Jogo($dados[0], $dados[1], $dados[2]);

        $sistema->setJogos($j);
      }

      fclose($arquivo);
    } 

    if(file_exists('../bd/boloes.txt')){
      $arquivo = fopen('../bd/boloes.txt', 'r');

      $count = 0;

      while(!feof($arquivo)){
        $bolao = fgets($arquivo);

        //id;criador;tipo;campeonato;titulo;descricao;limite;participantes;tipoJogo;tipoAposta;opcoesAposta;senha;resultado;ganhadores;dinheiros;tempoLimite;apostas
        $dados = explode(';', $bolao);

        $participantes = explode('~', $dados[7]);
        $opcoesAposta = explode('-', $dados[10]);
        echo $dados[14];
        $apostas = explode('~', $dados[15]);
        $tipoJogo = explode('-', $dados[8]);

        $b = new Bolao($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $tipoJogo, $dados[9], $opcoesAposta, $dados[11], $dados[13]);

        for($i=0; $i < count($participantes); $i++){
          $b->setParticipantes($participantes[$i]);
        }

        $b->setResultado($dados[12]);
        $b->setTempoLimite($dados[14]);

        for($i=0; $i < count($apostas); $i++){
          $ap = explode(':', $apostas[$i]);
          $a = new Aposta($ap[0], $count, $ap[1], $ap[2]);
          $b->setApostas($a);
        }

        $sistema->setBoloes($b);
        $count += 1;
      }

      fclose($arquivo);
    } 

    for($i=0; $i<count($sistema->getUsuarios()); $i++){
      if(file_exists('../bd/apostas-' . $sistema->getUsuarios()[$i]->getCpf() . '.txt')){
        $arquivo = fopen('../bd/apostas-' . $sistema->getUsuarios()[$i]->getCpf() . '.txt', 'r');
        while(!feof($arquivo)){
          // bolao, valor, opcaoAposta
          $aposta = fgets($arquivo);
          $dados = explode(';', $aposta);

          $a = new Aposta($sistema->getUsuarios()[$i]->getCpf(), $dados[0], $dados[1], $dados[2]);
          $sistema->getUsuarios()[$i]->setApostas($a);
        }
      }
    }

    $_SESSION["sistema"] = $sistema;*/
?>