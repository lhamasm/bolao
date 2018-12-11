<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'usuario.php';
	require_once 'aposta.php';
	require_once 'jogo.php';
	require_once 'funcoes.php';

	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$valor = p_respostas($_REQUEST['valoraposta']);
		$opcaoAposta = $_REQUEST['opcaoaposta'];

		$sistema = $_SESSION['sistema'];
		$boloes = $sistema->getBoloes();
		$usuarios = $sistema->getUsuarios();

		if ($boloes[intval($_SESSION['bolao'])]->getLimiteDeParticipantes() > count($boloes[intval($_SESSION['bolao'])]->getParticipantes())) {
			$aposta = new Aposta($_SESSION['login'], $_SESSION['bolao'], $valor, $opcaoAposta);

			$p = $boloes[intval($_SESSION['bolao'])]->getParticipantes();
			for ($i=0; $i < count($p); $i++) { 
				if ($p[$i] == $_SESSION['login']) {
					for($j=0; $j < count($usuarios); $j++){
						if($usuarios[$j]->getCpf() == $p[$i]){
							$usuarios[$i]->setApostas($aposta);
							break;
						}
					}
					break;
				}
			}

			if ($i ==  count($boloes[intval($_SESSION['bolao'])]->getParticipantes())) {
				$boloes[intval($_SESSION['bolao'])]->setParticipantes($_SESSION['login']);
			}
			
			$boloes[intval($_SESSION['bolao'])]->setApostas($aposta);
			$boloes[intval($_SESSION['bolao'])]->setDinheiros(doubleval($valor));

			$s = new Sistema($usuarios, $sistema->getJogos(), $boloes, $sistema->getBugs());

			$_SESSION['sistema'] = $s;

		}
		else {
			echo 'Limite de Participantes atingido';
		}

		//$aposta = new Aposta($_SESSION['login'], $_SESSION['bolao'], $valor, $opcaoAposta);
		//$boloes[intval($_SESSION['bolao'])]->setApostas($aposta);
		//$boloes[intval($_SESSION['bolao'])]->setDinheiros(doubleval($valor));
		//$boloes[intval($_SESSION['bolao'])]->setParticipantes($_SESSION['login']);

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

				$bolao = $bolao .';' . $boloes[$i]->getSenha() . ';';

				$resultado = $boloes[$i]->getResultado();
				for($j = 0; $j < count($resultado); $j++){
					$bolao = $bolao . $resultado[$j] . '-';
				}

				$ganhadores = $boloes[$i]->determinarVencedor($sistema->getJogos(), $usuarios);
				for($j = 0; $j < count($ganhadores); $j++){
					$bolao = $bolao . $ganhadores[$j] . '-';
				}

				$bolao = $bolao . ';' . $boloes[$i]->getDinheiros() . ';' . $boloes[$i]->getTempoLimite() . ';';

				$apostas = $boloes[$i]->getApostas();
				for($j = 0; $j < count($apostas); $j++){
					$bolao = $bolao . $apostas[$j]->getUsuario() . ':' . $apostas[$j]->getValor() . ':' .$apostas[$j]->getOpcaoDeAposta() . '-';
				}

				$bolao = $bolao . ';\n'; 
				fwrite($arquivo, $bolao);
			}

			fclose($arquivo);
			header('Location: ../index-pagina-pessoal.php');
			exit();
		}
	}
	
?>