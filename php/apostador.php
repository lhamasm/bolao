<?php

	require_once 'usuario.php';

	interface Participante{
		function atualizarResultadoBolao($bolao){}
	}
	
	class Apostador extends Usuario implements Participante{
		protected $posicao;
		protected $pontuacao;
		protected $apostas;
		protected $boloesresultados; //parte do pattern obeserver, guarda o status do subject

		# Construtor
		function Apostador($posicao, $pontuacao){
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->apostas = array();
			$this->boloesresultados = array();
		}

		# Gettes e Setters
		function getPosicao() {
			return $this->posicao;
		}

		function getPontuacao() {
			return $this->pontuacao;
		}

		function getApostas(){
			return $this->apostas;
		}

		function setPosicao($posicao) {
			$this->posicao = $posicao;
		}

		function setPontuacao($pontuacao) {
			$this->pontuacao = $pontuacao;
		}

		function setApostas($apostas){
			$this->apostas = $apostas;
		}

		function getBoloesResultados(){
			return $this->boloesresultados;
		}

		function setBoloesResultados($bolao){ 
			// guardar resultado do bolao no array
		}

		# Métodos
		function reportarBugs($texto) {
			$mensagem = new Mensagem($texto);
			$sistema->setBugs($mensagem);
		}

		function responderConvite($resposta, $convite) {
			// resposta é um bool
		}

		function atualizarResultadoBolao($bolao){ 
			//atualiza status do subject

		}
	}


?>