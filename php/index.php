<?php
  require_once 'sistema.php';
  require_once 'usuario.php';
  require_once 'apostador.php';
  require_once 'jogo.php';
  require_once 'bolao.php';
  require_once 'aposta.php';

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

        for($i=0; $i < count($participantes)-1; $i++){
          $b->setParticipantes($participantes[$i]);
        }

        $b->setResultado($dados[12]);
        $b->setTempoLimite($dados[14]);

        for($i=0; $i < count($apostas)-1; $i++){
          $ap = explode(':', $apostas[$i]);
          $a = new Aposta($ap[0], $count, $ap[1], $ap[2]);
          $b->setApostas($a);

          //$usuarios = $sistema->getUsuarios();
          for($j=0; $j<count($sistema->getUsuarios()); $j++){
            if($sistema->getUsuarios()[$j]->getCpf() == $ap[0]){
              $sistema->getUsuarios()[$j]->setApostas($a);
              break;
            }
          }
        }

        $sistema->setBoloes($b);
        $count += 1;
      }

      fclose($arquivo);
    } 

    $_SESSION["sistema"] = $sistema;
    $_SESSION["numero_usuarios"] = count($sistema->getUsuarios());
    $_SESSION['status'] = -1;
?>