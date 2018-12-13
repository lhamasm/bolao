<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'aposta.php';
	require_once 'funcoes.php';

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

			$aposta = array();
			$bolao = $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())];
			$ap = $bolao->getApostas();
			array_splice($ap, intval($this->idAposta)-1);
			array_push($ap, $apostas[intval($this->idAposta)-1]);

			$b = new Bolao($boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getId(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getCriador(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTipo(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getCampeonato(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTitulo(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getDescricao(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getLimiteDeParticipantes(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTipoJogo(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTipoAposta(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getOpcoesAposta(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getSenha(), $boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getDinheiros());

			$b->setTempoLimite($boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())]->getTempoLimite());

			for($i=0; $i<count($ap); $i++){
				$b->setApostas($ap[$i]);
			}

			$participantes = $bolao->getParticipantes();
			for($i=0; $i<count($participantes); $i++){
				$b->setParticipantes($participantes[$i]);
			}

			$boloes[intval($apostas[intval($this->idAposta)-1]->getBolao())] = $b;

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
			$apostas = $usuarios[$u]->getApostas();
			for($i=0; $i<count($apostas); $i++){
				fwrite($arquivo, $apostas[$i]->getBolao() . ';' . $apostas[$i]->getValor() . ';' . $apostas[$i]->getOpcaoDeAposta() . PHP_EOL);
			}

			fclose($arquivo);
			$_SESSION['status'] = 1;
			header('Location: ../minhas-apostas.php');
			exit();
		}
	}

?>