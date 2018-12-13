<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'apostador.php';
	require_once 'bolao.php';

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

			if(file_exists('../bd/boloes.txt')){
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

					if(count($apostas) == 0){
						$bolao = $bolao . '~';
					}

					$bolao = $bolao . PHP_EOL; 
					fwrite($arquivo, $bolao);
				}

				fclose($arquivo);
				$_SESSION['status'] = 1;
				header('Location: ../meus-boloes.php');
				exit();
			}
		}
	}
?>