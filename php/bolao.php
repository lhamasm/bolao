<?php

	require_once 'sistema.php';

	interface BolaoInterface{
		function notificarApostadores(){}
	}

	class Bolao {

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

		function Bolao($criador, $tipo, $campeonato, $titulo, $descricao, $limiteDeParticipantes, $tipoJogo, $tipoAposta, $opcoesAposta, $senha){
			$this->id = $id; // pôr um random aqui
			$this->criador = $criador;
			$this->tipo = $tipo;
			$this->campeonato = $campeonato;
			$this->titulo = $titulo;
			$this->descricao = $descricao;
			$this->limiteDeParticipantes = $limiteDeParticipantes;
			$this->participantes = array();
			$this->tipoJogo = $tipoJogo;
			$this->tipoAposta = $tipoAposta;
			$this->opcoesAposta = $opcoesAposta;
			$this->senha = $senha;
			$this->dinheiros = 0;
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

		function setParticipantes($participantes){
			$this->participantes = $participantes;
		}

		function setTipoJogo($tipoJogo){
			$this->tipoJogo = $tipoJogo;
		}

		function setTipoAposta($tipoAposta){
			$this->tipoAposta = $tipoAposta;
		}

		function setOpcoesAposta($opcoesAposta){
			$this->opcoesAposta = $opcoesAposta;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function setResultado($resultado){
			$this->resultado = $resultado;
		}

		function setDinheiros($valor){
			$this->dinheiros += $valor;
		}

		function setTempoLimite($tempoLimite){
			$this->tempoLimite = $tempoLimite;
		}

		function setApostas($apostas){
			array_push($this->apostas, $apostas);
		}

		function getId(){
			return $this->id;
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

		function getApostas($apostas){
			return $this->apostas;
		}

		function excluirApostador($bolao, $apostador){
			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getTitulo() == $bolao){
					$p = $boloes[$i]->getParticipantes();
					for($j = 0; $j < count($p); $j++){
						if($p[$j]->getCpf() == $apostador){
							array_splice($p, $j, 1);
						}
					}
				}
			}
		}

		function apostar($usuario, $bolao, $valor, $opcaoDeAposta){
			if ($bolao->getLimiteDeParticipantes() > count($bolao->getParticipantes()) ) {
				$aposta = new Aposta($usuario, $bolao, $valor,$opcaoDeAposta);
				array_push($this->apostas, $aposta);

				for ($i=0; $i < count($bolao->getParticipantes()); $i++) { 
					if (($bolao->getParticipantes())[$i] == $usuario) {
						break;
					}
				}
				if (i ==  count($bolao->getParticipantes())) {
					$bolao->setParticipantes($usuario);
				}
				
				$bolao->setApostas($aposta);

			}
			else{
				return -1;
			}
		}

		function determinarVencedor(){

			for($i = 0; $i < count($tipoJogo); $i++){
				for($j = 0; $j < count($jogos); $j++){
					if($tipoJogo[$i]->getId() == $jogos[$j]->getId()){
						if($jogos[$j]->getResultado == ''){
							return -1;
						}
					}
				}
			}

			for($i = 0; $i < count($participantes); $i++){
				$a = $participantes[$i]->getApostas();
				for($j = 0; $j < count($a); $j++){
					if($a[$j]->getBolao() == $this->titulo) {
						if($a[$j]->getOpcaoDeAposta() == $this->resultado){
							array_push($this->ganhadores, $participantes[$i]);
						}
					}
				}
			}

			return $this->ganhadores;

		}

		function calcularValorVencedor(){
			$g = determinarVencedor();

			return $this->dinheiros/count($g);
		}

		function participarBolao(){
			// tem a ver com o observer pattern
		}

		function sairBolao(){
			// tem a ver com o observer pattern
		}

		function notificarApostadores(){
			// tem a ver com o observer pattern
		}

		function getParticipantesLength(){

		}

		function excluirAposta(){
			//retorna booleano
		}
	}

?>