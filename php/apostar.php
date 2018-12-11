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

		if((isset($_REQUEST['senha-bolao']) && $_REQUEST['senha-bolao'] == $boloes[intval($_REQUEST['bolao-id'])]->getSenha()) || !isset($_REQUEST['senha-bolao'])){
			if ($boloes[intval($_REQUEST['bolao-id'])]->getLimiteDeParticipantes() > count($boloes[intval($_REQUEST['bolao-id'])]->getParticipantes())) {
				$aposta = new Aposta($_SESSION['login'], intval($_REQUEST['bolao-id']), $valor, $opcaoAposta);

				$p = $boloes[intval($_REQUEST['bolao-id'])]->getParticipantes();
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

				if ($i ==  count($boloes[intval($_REQUEST['bolao-id'])]->getParticipantes())) {
					$boloes[intval($_REQUEST['bolao-id'])]->setParticipantes($_SESSION['login']);
				}
				
				$boloes[intval($_REQUEST['bolao-id'])]->setApostas($aposta);
				$boloes[intval($_REQUEST['bolao-id'])]->setDinheiros(doubleval($valor));

				$s = new Sistema($usuarios, $sistema->getJogos(), $boloes, $sistema->getBugs());

				$_SESSION['sistema'] = $s;


			}
			else {
				$_SESSION['status'] = 2;
				exit();
				header('Location: ../index-pagina-pessoal.php');
				//echo 'Limite de Participantes atingido';
			}
		} else {
			$_SESSION['status'] = 1;
			header('Location: ../index-pagina-pessoal.php');
			exit();
			//senha incorreta
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
					$bolao = $bolao . $participantes[$j] . '~';
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
			$_SESSION['status'] = 3;
			header('Location: ../index-pagina-pessoal.php');
			exit();
		}
	}
	
?>