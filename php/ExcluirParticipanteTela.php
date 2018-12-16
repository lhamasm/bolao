<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'apostador.php';
	require_once 'bolao.php';
	require_once 'facade.php';
	require_once 'ArquivoBolao.php';

	session_start();

	class ExcluirParticipanteTela{
		protected $participante;
		protected $bolao;

		function ExcluirParticipanteTela($bolao, $participante)
		{
			$this->participante = $participante;
			$this->bolao = $bolao;
		}

		function getParticipante(){
			return $this->participante;
		}

		function setParticipante($participante){
			$this->participante = $participante;
		}

		function getBolao(){
			return $this->participante;
		}

		function setBolao($bolao){
			$this->bolao = $bolao;
		}

		function excluir(){
			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();
			$valor = 0;

			$participantes = $boloes[intval($this->bolao)]->getParticipantes();
			for($i=0; $i<count($participantes); $i++){
				if($participantes[$i] == $this->participante){
					array_splice($participantes, $i);
					break;
				}
			}

			$apostas = $boloes[intval($this->bolao)]->getApostas();
			for($i=0; $i<count($apostas); $i++){
				if($apostas[$i]->getUsuario() == $this->participante){
					$valor += (-1) * intval($apostas[$i]->getValor());
					array_splice($apostas, $i);
				}
			}

			$b = new Bolao($boloes[intval($this->bolao)]->getId(), $boloes[intval($this->bolao)]->getCriador(), $boloes[intval($this->bolao)]->getTipo(), $boloes[intval($this->bolao)]->getCampeonato(), $boloes[intval($this->bolao)]->getTitulo(), $boloes[intval($this->bolao)]->getDescricao(), $boloes[intval($this->bolao)]->getLimiteDeParticipantes(), $boloes[intval($this->bolao)]->getTipoJogo(), $boloes[intval($this->bolao)]->getTipoAposta(), $boloes[intval($this->bolao)]->getOpcoesAposta(), $boloes[intval($this->bolao)]->getSenha(), $boloes[intval($this->bolao)]->getDinheiros());
			$b->setDinheiros($valor);
			$b->setTempoLimite($boloes[intval($this->bolao)]->getTempoLimite());

			for($i=0; $i<count($apostas); $i++){
				$b->setApostas($aposta[$i]);
			}

			for($i=0; $i<count($participantes); $i++){
				$b->setParticipantes($$participantes[$i]);
			}

			array_splice($boloes, intval($this->bolao));
			array_push($boloes, $b);

			$s = new Sistema($sistema->getUsuarios(), $sistema->getJogos(), $boloes, $sistema->getBugs());
			$_SESSION['sistema'] = $s;

			unlink('../bd/boloes.txt');
			$bolao = new ArquivoBolao();
		    $facade = new Facade($bolao);
		    for($i=0; $i<count($boloes); $i++){
		    	$facade->escreverEm('../bd/boloes.txt', $boloes[$i]);
		    }
			
			fclose($arquivo);
			$_SESSION['status'] = 1;
			header('Location: ../meus-boloes.php');
			exit();
		}
	}
?>