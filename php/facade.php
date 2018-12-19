<?php

	require_once 'ArquivoInterface.php';

	class Facade {

		private $arquivo;

		public function Facade(ArquivoInterface $arquivo){

			$this->arquivo = $arquivo;

		}

		public function lerDe($nome) {
			$this->arquivo->ler($nome);
		}

		public function escreverEm($nome, $conteudo){
			$this->arquivo->escrever($nome, $conteudo);
		}

	}

?>