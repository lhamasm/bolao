<?php

	require_once 'usuario.php';
	
	class Apostador extends Usuario {
		protected $posicao;
		protected $pontuacao;

		# Construtor
		function Apostador($posicao, $pontuacao){
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
		}

		# Gettes e Setters
		function getPosicao() {
			return $this->posicao;
		}

		function getPontuacao() {
			return $this->pontuacao;
		}

		function setPosicao($posicao) {
			$this->posicao = $posicao;
		}

		function setPontuacao($pontuacao) {
			$this->pontuacao = $pontuacao;
		}

		# Métodos
		function verificarPontuacao(){

		}

		function reportarBugs() {

		}

		function apostar(){

		}

		function editarAposta() {

		}

		function aceitarConvite() {
			
		}
	}


?>