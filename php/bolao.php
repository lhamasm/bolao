<?php

	require_once 'sistema.php';
	require_once 'apostador.php';
	require_once 'jogo.php';
	require_once 'usuario.php';
	require_once 'apostador.php';
	require_once 'subject.php';
	require_once 'observer.php';
	require_once 'aposta.php';
	require_once 'mensagem.php';
	require_once 'ArquivoMensagem.php';
	require_once 'facade.php';
	

	class Bolao extends Subject {

		protected $id;
		protected $criador;
		protected $tipo;
		protected $campeonato;
		protected $titulo;
		protected $descricao;
		protected $limiteDeParticipantes;
		protected $participantes;
		protected $tipoJogo;
		protected $tipoAposta;
		protected $opcoesAposta;
		protected $senha;
		protected $resultado;
		protected $ganhadores;
		protected $dinheiros;
		protected $tempoLimite;
		protected $apostas;

		function Bolao($id, $criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta,/* $opcoesAposta,*/ $senha, $dinheiros){
			$this->id = $id;
			$this->criador = $criador;
			$this->tipo = $tipo;
			$this->campeonato = $campeonato;
			$this->titulo = $titulo;
			$this->descricao = $descricao;
			$this->limiteDeParticipantes = $limiteDeParticipantes;
			$this->participantes = array();
			$this->tipoJogo = $tipoJogo;
			$this->tipoAposta = $tipoAposta;
			//$this->opcoesAposta = $opcoesAposta;
			$this->senha = $senha;
			$this->dinheiros = $dinheiros;
			$this->ganhadores = array();
			$this->resultado = array();
			$this->tempoLimite = 0;
			$this->apostas = array();
		}

		function setId($id){
			$this->id = $id;
		}

		function setCriador($criador){
			$this->criador = $criador;
		}

		function setTipo($tipo){
			$this->tipo = $tipo;
		}

		function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}

		function setTitulo($titulo){
			$this->titulo = $titulo;
		}

		function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		function setLimiteDeParticipantes($limiteDeParticipantes){
			$this->limiteDeParticipantes = $limiteDeParticipantes;
		}

		function setParticipantes($participante){
			array_push($this->participantes, $participante);
		}

		function setTipoJogo($tipoJogo){
			$this->tipoJogo = $tipoJogo;
		}

		function setTipoAposta($tipoAposta){
			$this->tipoAposta = $tipoAposta;
		}

		function setOpcoesAposta($opcao){
			array_push($this->opcoesAposta, $opcao);
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setResultado($resultado){
			array_push($this->resultado, $resultado);
		}

		function setDinheiros($valor){
			$this->dinheiros += $valor;
		}

		function setTempoLimite($tempoLimite){
			$this->tempoLimite = $tempoLimite;
		}

		function setApostas($aposta){
			array_push($this->apostas, $aposta);
			
			if(!in_array($aposta->getUsuario(), $this->participantes)) {
				if($this->criador == $aposta->getUsuario()){
					$observer = new Observer($this->criador, 10);
				} else {
					$observer = new Observer($this->criador, 0);
				}

				$this->attach($observer);

				$m = new Mensagem('SisBolao', $aposta->getUsuario(), "Bem-vindo ao Bolão " . $this->getTitulo(), date('d/m/Y'));
				$msg = array();
				array_push($msg, $m);
				
				$mensagem = new ArquivoMensagem();
	    		$facade = new Facade($mensagem);
	   			$facade->escreverEm('../bd/mensagens-' . $aposta->getUsuario() . '.txt', $msg);
			}
			
			$this->setEvent("O usuário " . $aposta->getUsuario() . " realizou uma aposta de R$ " . $aposta->getValor() . " no bolão " . $this->titulo);
		}

		function getId(){
			return $this->id;
		}

		function getTipo(){
			return $this->tipo;
		}

		function getCriador(){
			return $this->criador;
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function getTitulo(){
			return $this->titulo;
		}

		function getDescricao(){
			return $this->descricao;
		}

		function getLimiteDeParticipantes(){
			return $this->limiteDeParticipantes;
		}

		function getParticipantes(){
			return $this->participantes;
		}

		function getTipoJogo(){
			return $this->tipoJogo;
		}

		function getTipoAposta(){
			return $this->tipoAposta;
		}

		function getOpcoesAposta(){
			return $this->opcoesAposta;
		}

		function getSenha(){
			return $this->senha;
		}

		function getResultado(){
			return $this->resultado;
		}

		function getTempoLimite(){
			return $this->tempoLimite;
		}

		function getApostas(){
			return $this->apostas;
		}

		function getDinheiros(){
			return $this->dinheiros;
		}


		function determinarVencedor($jogos, $usuarios){

			for($i = 0; $i < count($this->participantes); $i++){
				for($j=0; $j < count($usuarios); $j++){
					if($usuarios[$j]->getCpf() == $this->participantes[$i]){
						$a = $usuarios[$j]->getApostas();
						break;
					}
				}
				for($k = 0; $k < count($a); $k++){
					if($a[$k]->getBolao() == $this->id) {
						for($l=0; $l<count($this->resutado); $l++){
							if($a[$k]->getOpcaoDeAposta() == $this->resultado[$l]){
								$usuarios[$j]->setPontuacao(10);
							}
						}
					}
				}
			}

			$g = array_map();
			for($i = 0; $i < count($this->participantes); $i++){
				for($j=0; $j < count($usuarios); $j++){
					if($usuarios[$j]->getCpf() == $this->participantes[$i]){
						$g[$usuarios[$j]->getCpf()] = $usuarios[$j]->getPontuacao();
					}
				}
			}

			$maior = 0;
			arsort($g);
			foreach($g as $x => $x_value) {
			    $maior = $x_value;
			    break;
			}

			foreach($g as $x => $x_value) {
			    if($x_value == $maior){
			    	array_push($this->ganhadores, $x);
			    }
			}

			return $this->ganhadores;

		}

		function calcularValorVencedor($jogos, $usuarios){
			$g = $this->determinarVencedor($jogos, $usuarios);

			if(count($g) > 0){
				return $this->dinheiros/count($g);
			} else {
				return -1;
			}
		}

		function removerAposta($apostas, $aposta){
			array_splice($apostas, $aposta);
		}
	}
?>