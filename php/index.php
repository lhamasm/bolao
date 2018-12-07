<?php
  require_once 'sistema.php';
  require_once 'usuario.php';
  require_once 'jogo.php';
  require_once 'bolao.php';

  session_start();

    $usuarios = array();
    $jogos = array();
    $boloes = array();
    $bugs = array();

    $sistema = new Sistema($usuarios, $jogos, $boloes, $bugs);

    if(file_exists('../bd/usuarios.txt')){
      $arquivo = fopen('../bd/usuarios.txt', 'r');

      while(!feof($arquivo)){
        $usuario = fgets($arquivo);

        $dados = explode(';', $usuario);
        $u = new Usuario($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[9], $dados[10], $dados[11], $dados[12], $dados[13]);

        $sistema->setUsuarios($u);
      }

      fclose($arquivo);
    } 

    if(file_exists('../bd/jogos.txt')){
      $arquivo = fopen('../bd/jogos.txt', 'r');

      while(!feof($arquivo)){
        $jogo = fgets($arquivo);

        $dados = explode(';', $jogo);
        $j = new Jogo($dados[0], $dados[1]);

        $sistema->setJogos($j);
      }

      fclose($arquivo);
    } 

    if(file_exists('../bd/boloes.txt')){
      $arquivo = fopen('../bd/boloes.txt', 'r');

      while(!feof($arquivo)){
        $bolao = fgets($arquivo);

        //id;criador;tipo;campeonato;titulo;descricao;limite;participantes;tipoJogo;tipoAposta;opcoesAposta;senha;resultado;ganhadores;dinheiros;tempoLimite;apostas
        $dados = explode(';', $bolao);

        $participantes = explode('-', $dados[7]);
        $tipoJogo = explode('-', $dados[8]);
        $opcoesAposta = explode('-', $dados[10]);
        $ganhadores = explode('-', $dados[13]);
        $apostas = explode('-', $dados[16]);

        $b = new Bolao($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $tipoJogo,$dados[9], $opcoesAposta, $dados[11], $dados[14]);

        for($i = 0; $i < count($participantes); $i++){
          $b->setParticipantes($participantes[$i]);
        }

        for($i = 0; $i < count($apostas); $i++){
          $b->setApostas($apostas[$i]);
        }

        $b->setOpcoesAposta($opcoesAposta);
        $b->setResultado($dados[12]);
        $b->setTempoLimite($dados[15]);

        $sistema->setBoloes($b);
      }

      fclose($arquivo);
    } 

    $_SESSION["sistema"] = $sistema;
    $_SESSION["numero_usuarios"] = count($sistema->getUsuarios());
?>