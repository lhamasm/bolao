<?php
	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'apostador.php';
	require_once 'usuario.php';
	require_once 'aposta.php';
	require_once 'facade.php';
	require_once 'ArquivoBolao.php';
	require_once 'ArquivoAposta.php';
	require_once 'administrador-sistema.php';
	require_once 'administrador-bolao.php';

	session_start();

	class ExcluirApostaTela{
		protected $aposta;

		function ExcluirApostaTela($aposta)
		{
			$this->aposta = $aposta;
		}

		function getAposta(){
			return $this->aposta;
		}

		function setAposta($aposta){
			$this->aposta = $aposta;
		}

		function excluir(){
			$sistema = $_SESSION['sistema'];
			$usuarios = $sistema->getUsuarios();
			$boloes = $sistema->getBoloes();
			$contador = 0;

			$apostas = array();

			for($i=0; $i<count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $_SESSION['login']){
					$apostas = $usuarios[$i]->getApostas();
					$a = $apostas[intval($this->aposta)-1];
					$usuarios[$i]->getApostas()[intval($this->aposta)-1]->setStatus(0);
					//array_splice($apostas, intval($this->aposta)-1);
					break;
				}
			}

			/*for($i=0; $i<count($apostas); $i++){
				if($apostas[$i]->getUsuario() == $_SESSION['login']){
					$contador += 1;
				}
			}

			$participantes = $boloes[intval($a->getBolao())]->getParticipantes();
			if($contador == 0){			

				for($i=0; $i<count($participantes); $i++){
					if($participantes[$i] == $_SESSION['login']) {
						array_splice($participantes, $i);
						break;
					}
				}
			} */

			$bolao = $boloes[intval($a->getBolao())];
			$b = new Bolao($bolao->getId(), $bolao->getCriador(), $bolao->getTipo(), $bolao->getCampeonato(), $bolao->getTitulo(), $bolao->getDescricao(), $bolao->getLimiteDeParticipantes(), $bolao->getTipoJogo(), $bolao->getTipoAposta(), $bolao->getSenha(), $bolao->getDinheiros());
			$b->setTempoLimite($bolao->getTempoLimite());

			for($i=0; $i<count($apostas); $i++){
				if($i != intval($this->aposta)-1) {
					$b->setApostas($apostas[$i]);
				}
			}

			//$participantes = $bolao->getParticipantes();
			/*for($i=0; $i<count($participantes); $i++){
				$b->setParticipantes($participantes[$i]);
			}*/

			$boloes[intval($a->getBolao())] = $b;

			$s = new Sistema($usuarios, $sistema->getJogos(), $boloes, $sistema->getBugs());
			$_SESSION['sistema'] = $s;

			unlink('../bd/boloes.txt');
			$bolao = new ArquivoBolao();
		    $facade = new Facade($bolao);
		    for($i=0; $i<count($boloes); $i++){
		    	$facade->escreverEm('../bd/boloes.txt', $boloes[$i]);
		    }

		    $sistema = $_SESSION['sistema'];
		    $usuarios = $sistema->getUsuarios();
		    $aposta = new ArquivoAposta();
		    $facade = new Facade($aposta);
		    for($i=0; $i<count($usuarios); $i++){
		    	if($usuarios[$i]->getCpf() == $_SESSION['login']){
		    		unlink('../bd/apostas-' . $usuarios[$i]->getCpf() . '.txt');
		      		$facade->escreverEm('../bd/apostas-' . $usuarios[$i]->getCpf() . '.txt', $usuarios[$i]->getApostas());
		      		break;
		    	}
		    }


			$_SESSION['status'] = 2;
			header('Location: ../minhas-apostas.php');
			exit();

			/*if(file_exists('../bd/boloes.txt')){
				$arquivo = fopen('../bd/boloes.txt', 'w+');
				for($i = 0; $i < count($boloes); $i++){
					$bolao = $boloes[$i]->getId() . ';' . $boloes[$i]->getCriador() . ';' . $boloes[$i]->getTipo() . ';' . $boloes[$i]->getCampeonato() . ';' . $boloes[$i]->getTitulo() . ';' . $boloes[$i]->getDescricao() . ';' . $boloes[$i]->getLimiteDeParticipantes() . ';';

					$participantes = $boloes[$i]->getParticipantes();
					for($j = 0; $j < count($participantes)-1; $j++){
						$bolao = $bolao . $participantes[$j] . '~';
					}
					if(count($participantes) > 0){
						$bolao = $bolao . $participantes[count($participantes)-1];
					}

					$bolao = $bolao . ';';

					$tipoJogo = $boloes[$i]->getTipoJogo();
					for($j = 0; $j < count($tipoJogo)-1; $j++){
						$bolao = $bolao . $tipoJogo[$j] . '-';
					}
					if(count($tipoJogo) > 0){
						$bolao = $bolao . $tipoJogo[count($tipoJogo)-1];
					}

					$bolao = $bolao . ';' . $boloes[$i]->getTipoAposta() . ';';

					$opcoesAposta = $boloes[$i]->getOpcoesAposta();
					for($j = 0; $j < count($opcoesAposta)-1; $j++){
						$bolao = $bolao . $opcoesAposta[$j] . '-';
					}
					if(count($opcoesAposta) > 0){
						$bolao = $bolao . $opcoesAposta[count($opcoesAposta)-1];
					}

					$bolao = $bolao .';' . $boloes[$i]->getSenha() . ';';

					$resultado = $boloes[$i]->getResultado();
					for($j = 0; $j < count($resultado)-1; $j++){
						$bolao = $bolao . $resultado[$j] . '-';
					}
					if(count($resultado) > 0){
						$bolao = $bolao . $resultado[count($resultado)-1];
					}

					$ganhadores = $boloes[$i]->determinarVencedor($sistema->getJogos(), $sistema->getUsuarios());
					for($j = 0; $j < count($ganhadores)-1; $j++){
						$bolao = $bolao . $ganhadores[$j] . '~';
					}
					if(count($ganhadores) > 0){
						$bolao = $bolao . $ganhadores[count($ganhadores)-1];
					}

					$bolao = $bolao . ';' . $boloes[$i]->getDinheiros() . ';' . $boloes[$i]->getTempoLimite() . ';';

					$apostas = $boloes[$i]->getApostas();
					for($j = 0; $j < count($apostas)-1; $j++){
						$bolao = $bolao . $apostas[$j]->getUsuario() . ':' . $apostas[$j]->getValor() . ':' .$apostas[$j]->getOpcaoDeAposta() . '~';
					}
					if(count($apostas) > 0){
						$bolao = $bolao . $apostas[count($apostas)-1]->getUsuario() . ':' . $apostas[count($apostas)-1]->getValor() . ':' .$apostas[count($apostas)-1]->getOpcaoDeAposta();
					}

					$bolao = $bolao . PHP_EOL; 
					fwrite($arquivo, $bolao);
				} 
			} else {
				exit();
			}

			$arquivo = fopen('../bd/apostas-' . $_SESSION['login'] . '.txt', 'w+');
			//$apostas = $usuarios[$j]->getApostas();
			for($i=0; $i<count($apostas); $i++){
				fwrite($arquivo, $apostas[$i]->getBolao() . ';' . $apostas[$i]->getValor() . ';' . $apostas[$i]->getOpcaoDeAposta() . PHP_EOL);
			}
			
			fclose($arquivo);*/
		}
	}

?>