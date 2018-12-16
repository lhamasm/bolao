<?php

	//session_start();
	
	interface ArquivoInterface {

		public function ler($nome);
		public function escrever($nome, $conteudo);

	}

?>