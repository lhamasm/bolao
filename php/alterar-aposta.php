<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'aposta.php';
	require_once 'funcoes.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sistema = $_SESSION['sistema'];
		$boloes = $sistema->getBoloes();
		$apostas = $_SESSION['apostas'];

		$idApostas = $_REQUEST['aposta-id'];
		$valor = $_REQUEST['valoraposta'];
		$opcao = $_REQUEST['opcaoAposta'];

		$apostas[intval($idApostas)-1]->setValor = $valor;
		$apostas[intval($idApostas)-1]->setOpcaoDeAposta = $opcao;

		$aposta = array();
		$bolao = $boloes[intval($apostas[intval($idApostas)-1]->getBolao()];
		array_splice($bolao->getApostas(), intval($idApostas)-1);
		$bolao->setApostas($apostas[intval($idApostas)-1]);

		$boloes[intval($apostas[intval($idApostas)-1])] = $bolao;

		$s = new Sistema($sistema->getUsuarios(), $sistema->getJogos(), $boloes, $sistema->getBugs);
		$_SESSION['sistema'] = $s;

		if(file_exists('../bd/boloes.txt')){
			$arquivo = fopen('../bd/boloes.txt', 'w+');
			for($i = 0; $i < count($boloes)-1; $i++){
				$bolao = $boloes[$i]->getId() . ';' . $boloes[$i]->getCriador() . ';' . $boloes[$i]->getTipo() . ';' . $boloes[$i]->getCampeonato() . ';' . $boloes[$i]->getTitulo() . ';' . $boloes[$i]->getDescricao() . ';' . $boloes[$i]->getLimiteDeParticipantes() . ';';

				$participantes = $boloes[$i]->getParticipantes();
				for($j = 0; $j < count($participantes); $j++){
					$bolao = $bolao . $participantes[$j] . '~';
				}

				$bolao = $bolao . ';';

				$tipoJogo = $boloes[$i]->getTipoJogo();
				for($j = 0; $j < count($tipoJogo); $j++){
					$bolao = $bolao . $tipoJogo[$j] . '-';
				}

				$bolao = $bolao . ';' . $boloes[$i]->getTipoAposta() . ';';

				$opcoesAposta = $boloes[$i]->getOpcoesAposta();
				for($j = 0; $j < count($opcoesAposta)-1; $j++){
					$bolao = $bolao . $opcoesAposta[$j] . '-';
				}

				$bolao = $bolao .';' . $boloes[$i]->getSenha() . ';';

				$resultado = $boloes[$i]->getResultado();
				for($j = 0; $j < count($resultado); $j++){
					$bolao = $bolao . $resultado[$j] . '-';
				}

				$ganhadores = $boloes[$i]->determinarVencedor($sistema->getJogos(), $usuarios);
				for($j = 0; $j < count($ganhadores); $j++){
					$bolao = $bolao . $ganhadores[$j] . '~';
				}

				$bolao = $bolao . ';' . $boloes[$i]->getDinheiros() . ';' . $boloes[$i]->getTempoLimite() . ';';

				$apostas = $boloes[$i]->getApostas();
				for($j = 0; $j < count($apostas); $j++){
					$bolao = $bolao . $apostas[$j]->getUsuario() . ':' . $apostas[$j]->getValor() . ':' .$apostas[$j]->getOpcaoDeAposta() . '~';
				}

				if(count($apostas) == 0){
					$bolao = $bolao . '~';
				}

				$bolao = $bolao . PHP_EOL; 
				fwrite($arquivo, $bolao);
			}

			fclose($arquivo);
			$_SESSION['status'] = 1;
			header('Location: ../minhas-apostas.php');
			exit();
		}
	}

?>