<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'administrador-sistema.php';
	require_once 'administrador-bolao.php';
	require_once 'aposta.php';
	require_once 'funcoes.php';
	require_once 'facade.php';
	require_once 'ArquivoBolao.php';
	require_once 'ArquivoAposta.php';

	session_start();

	class EditarApostaTela{
		protected $idAposta;
		protected $valor;
		protected $opcaoAposta;

		function EditarApostaTela($idAposta, $valor, $opcaoAposta)
		{
			$this->idAposta = $idAposta;
			$this->valor = $valor;
			$this->opcaoAposta = $opcaoAposta;
		}

		function getId(){
			return $this->$idAposta;
		}

		function setId($idAposta){
			$this->idAposta = $idAposta;
		}

		function getValor(){
			return $this->valor;
		}

		function setValor($valor){
			$this->valor = $valor;
		}

		function getOpcaoAposta(){
			return $this->opcaoAposta;
		}

		function setOpcaoAposta($opcaoAposta){
			$this->opcaoAposta = $opcaoAposta;
		}

		function alterarAposta(){
			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();
			$apostas = $_SESSION['apostas'];

			$apostas[intval($this->idAposta)-1]->setValor($this->valor);
			$apostas[intval($this->idAposta)-1]->setOpcaoDeAposta($this->opcaoAposta);
			$apostas[intval($this->idAposta)-1]->setUsuario($_SESSION['login']);

			$bolao = $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())];
			$ap = $bolao->getApostas();

			$AP = array();

			for($i=0; $i<count($ap); $i++){
				if($ap[$i]->getUsuario() != $_SESSION['login']){
					array_push($AP, $ap[$i]);
				}
			}

			for($i=0; $i<count($apostas); $i++){
				array_push($AP, $apostas[$i]);
			}
			
			$b = new Bolao($boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getId(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getCriador(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTipo(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getCampeonato(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTitulo(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getDescricao(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getLimiteDeParticipantes(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTipoJogo(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTipoAposta(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getSenha(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getDinheiros());

			$b->setTempoLimite($boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTempoLimite());

			for($i=0; $i<count($AP); $i++){
				$b->setApostas($AP[$i]);
			}

			$participantes = $bolao->getParticipantes();
			for($i=0; $i<count($participantes); $i++){
				$b->setParticipantes($participantes[$i]);
			}

			$boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())] = $b;

			$s = new Sistema($sistema->getUsuarios(), $sistema->getJogos(), $boloes, $sistema->getBugs());
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
		    	if(get_class($usuarios[$i]) != 'AdministradorSistema' && $usuarios[$i]->getCpf() == $_SESSION['login']){
		    		unlink('../bd/apostas-' . $usuarios[$i]->getCpf() . '.txt');
			      	$facade->escreverEm('../bd/apostas-' . $usuarios[$i]->getCpf() . '.txt', $apostas);
			      	break;
			    }
		    }
		    
			$_SESSION['status'] = 1;
			header('Location: ../minhas-apostas.php');
			exit();
		}
	}

?>