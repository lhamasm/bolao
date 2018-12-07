<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'usuario.php';
	require_once 'aposta.php';
	require_once 'funcoes.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$valor = p_respostas($_REQUEST['valoraposta']);
		$opcaoAposta = $_REQUEST['opcaoaposta'];

		$aposta = new Aposta($_SESSION['login'], $_SESSION['bolao'], $valor, $opcaoAposta);

		$sistema = $_SESSION['sistema'];
		$boloes = $sistema->getBoloes();
		$usuarios = $sistema->getUsuarios();
		$boloes[intval($_SESSION['bolao'])]->setApostas($aposta);
		$boloes[intval($_SESSION['bolao'])]->setDinheiros(doubleval($valor));
		echo intval($valor);
		$boloes[intval($_SESSION['bolao'])]->setParticipantes($_SESSION['login']);

		/*for($i = 0; $i < count($usuarios); $i++){
			if($usuarios[$i]->getCpf() == $_SESSION['login']){
				$usuarios[$i]->getApostas($aposta);
				break;
			}
		}*/

		$s = new Sistema($usuarios, $sistema->getJogos(), $boloes, $sistema->getBugs());

		$_SESSION['sistema'] = $s;

		if(file_exists('../bd/boloes.txt')){
			$arquivo = fopen('../bd/boloes.txt', 'w+');
			for($i = 0; $i < count($boloes); $i++){
				$bolao = $boloes[$i]->getId() . ';' . $boloes[$i]->getCriador() . ';' . $boloes[$i]->getTipo() . ';' . $boloes[$i]->getCampeonato() . ';' . $boloes[$i]->getTitulo() . ';' . $boloes[$i]->getDescricao() . ';' . $boloes[$i]->getLimiteDeParticipantes() . ';';

				$participantes = $boloes[$i]->getParticipantes();
				for($j = 0; $j < count($participantes); $j++){
					$bolao = $bolao . $participantes[$j] . '-';
				}

				$bolao = $bolao . ';';

				$tipoJogo = $boloes[$i]->getTipoJogo();
				for($j = 0; $j < count($tipoJogo); $j++){
					$bolao = $bolao . $tipoJogo[$j] . '-';
				}

				$bolao = $bolao . ';' . $boloes[$i]->getTipoAposta() . ';';

				$opcoesAposta = $boloes[$i]->getOpcoesAposta();
				for($j = 0; $j < count($opcoesAposta); $j++){
					$bolao = $bolao . $opcoesAposta[$j] . '-';
				}

				$bolao = $bolao .';' . $boloes[$i]->getSenha() . ';' . $boloes[$i]->getResultado() . ';';

				/*$ganhadores = $boloes[$i]->determinarVencedor($sistema->getJogos());
				for($j = 0; $j < count($ganhadores); $j++){
					$bolao = $bolao . $ganhadores[$j] . '-';
				}*/

				$bolao = $bolao . ';' . $boloes[$i]->getDinheiros() . ';' . $boloes[$i]->getTempoLimite() . ';';

				$apostas = $boloes[$i]->getApostas();
				for($j = 0; $j < count($apostas); $j++){
					$bolao = $bolao . $apostas[$j]->getUsuario() . ':' . $apostas[$j]->getValor() . ':' .$apostas[$j]->getOpcaoDeAposta() . '-';
				}

				$bolao = $bolao . ';\n'; 
			}

			fclose($arquivo);

		}
	}
	
?>