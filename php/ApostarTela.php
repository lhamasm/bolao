<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'usuario.php';
	require_once 'aposta.php';
	require_once 'jogo.php';
	require_once 'facade.php';
	require_once 'ArquivoBolao.php';
	require_once 'ArquivoAposta.php';

	//session_start();
	
	class ApostarTela
	{
		protected $bolaoId;
		protected $senha;
		protected $valor;
		protected $opcao;
		protected $banco;
		protected $agencia;
		protected $conta;
		
		function ApostarTela($bolaoId, $valor, $opcao, $senha, $banco, $agencia, $conta)
		{
		$this->bolaoId = $bolaoId;
		$this->valor = $valor;
		$this->opcao = $opcao;
		$this->senha = $senha;
		$this->banco = $banco;
		$this->agencia = $agencia;
		$this->conta = $conta;
		}

		function getBolaoId(){
			return $this->bolaoId;
		}

		function setBolaoId($bolaoId){
			$this->bolaoId = $bolaoId;
		}

		function getValor(){
			return $this->valor;
		}

		function setValor($valor){
			$this->valor = $valor;
		}

		function getOpcao(){
			return $this->opcao;
		}

		function setOpcao($opcao){
			$this->opcao = $opcao;
		}

		function getBanco(){
			return $this->banco;
		}

		function setBanco($banco){
			$this->banco = $banco;
		}

		function getAgencia(){
			return $this->agencia;
		}

		function setAgencia($agencia){
			$this->agencia = $agencia;
		}

		function getConta(){
			return $this->conta;
		}

		function setConta($conta){
			$this->conta = $conta;
		}

		function getSenha(){
			return $this->senha;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function apostar(){
			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();
			$usuarios = $sistema->getUsuarios();
			$part = $boloes[intval($this->bolaoId)]->getParticipantes();
			if( ($this->senha != '' && $this->senha == $boloes[intval($this->bolaoId)]->getSenha()) || ($this->senha == '') ){
				if ( (!in_array($_SESSION['login'], $part) && $boloes[intval($this->bolaoId)]->getLimiteDeParticipantes() > count($boloes[intval($this->bolaoId)]->getParticipantes())) || in_array($_SESSION['login'], $part)) {
					$aposta = new Aposta($_SESSION['login'], intval($this->bolaoId), $this->valor, $this->opcao, date('d/m/Y'), 1);

					$p = $boloes[intval($this->bolaoId)]->getParticipantes();
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

					if (count($p) == 0) {
						$boloes[intval($this->bolaoId)]->setParticipantes($_SESSION['login']);
						for($j=0; $j < count($usuarios); $j++){
							if($usuarios[$j]->getCpf() == $_SESSION['login']){
								$usuarios[$j]->setApostas($aposta);
								break;
							}
						}
					}

					$b = new Bolao($boloes[intval($this->bolaoId)]->getId(), $boloes[intval($this->bolaoId)]->getCriador(), $boloes[intval($this->bolaoId)]->getTipo(), $boloes[intval($this->bolaoId)]->getCampeonato(), $boloes[intval($this->bolaoId)]->getTitulo(), $boloes[intval($this->bolaoId)]->getDescricao(), $boloes[intval($this->bolaoId)]->getLimiteDeParticipantes(), $boloes[intval($this->bolaoId)]->getTipoJogo(), $boloes[intval($this->bolaoId)]->getTipoAposta(), $boloes[intval($this->bolaoId)]->getOpcoesAposta(), $boloes[intval($this->bolaoId)]->getSenha(), doubleval($this->valor));

					$b->setTempoLimite($boloes[intval($this->bolaoId)]->getTempoLimite());

					$b->setApostas($aposta);

					$participantes = $boloes[intval($this->bolaoId)]->getParticipantes();
					for($i=0; $i<count($participantes); $i++){
						$b->setParticipantes($participantes[$i]);
					}

					$boloes[intval($this->bolaoId)] = $b;
					
					/*$b = $boloes[intval($this->bolaoId)];
					$b->setApostas($aposta);
					$b->setDinheiros(doubleval($this->valor));
					$boloes[intval($this->bolaoId)] = $b;
					//array_splice($boloes, count($boloes)-1);*/


					$s = new Sistema($usuarios, $sistema->getJogos(), $boloes, $sistema->getBugs());

					$_SESSION['sistema'] = $s;

				}
				else {
					$_SESSION['status'] = 2;
					header('Location: ../index-pagina-pessoal.php');
					exit();
					//echo 'Limite de Participantes atingido';
				}
			} else {
				$_SESSION['status'] = 1;
				header('Location: ../index-pagina-pessoal.php');
				exit();
				//senha incorreta
			}


			
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
		    for($i=0; $i<count($usuarios)-1; $i++){
		    	if($usuarios[$i]->getCpf() == $_SESSION['login']){
		    		unlink('../bd/apostas-' . $usuarios[$i]->getCpf());
		      		$facade->escreverEm('../bd/apostas-' . $usuarios[$i]->getCpf() . '.txt', $usuarios[$i]->getApostas());
		    	}
		    }

		    $_SESSION['status'] = 3;
			header('Location: ../index-pagina-pessoal.php');
			exit();

			//$aposta = new Aposta($_SESSION['login'], $_SESSION['bolao'], $valor, $opcaoAposta);
			//$boloes[intval($_SESSION['bolao'])]->setApostas($aposta);
			//$boloes[intval($_SESSION['bolao'])]->setDinheiros(doubleval($valor));
			//$boloes[intval($_SESSION['bolao'])]->setParticipantes($_SESSION['login']);

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

					$ganhadores = $boloes[$i]->determinarVencedor($sistema->getJogos(), $usuarios);
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
						$bolao = $bolao . $apostas[count($apostas)-1]->getUsuario() . ':' . $apostas[count($apostas)-1]->getValor() . ':' . $apostas[count($apostas)-1]->getOpcaoDeAposta();
					}

					//if(count($apostas) == 0){
					//	$bolao = $bolao . '~';
					//}

					$bolao = $bolao . PHP_EOL; 
					fwrite($arquivo, $bolao);
					fclose($arquivo);
				}
			} else {
				exit();
			}

			$arquivo = fopen('../bd/apostas-' . $_SESSION['login'] . '.txt', 'w+');
			$apostas = $usuarios[$u]->getApostas();
			for($i=0; $i<count($apostas); $i++){
				fwrite($arquivo, $apostas[$i]->getBolao() . ';' . $apostas[$i]->getValor() . ';' . $apostas[$i]->getOpcaoDeAposta() . PHP_EOL);
			}
			fclose($arquivo);*/
		}
	}
?>