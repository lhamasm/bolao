<?php

	require_once 'sistema.php';
	require_once 'usuario.php';

	class Mensagem {
		protected $mensagem;

		function Mensagem($mensagem){
			$this->mensagem = $mensagem;
		}

		function setMensagem($mensagem){
			$this->mensagem = $mensagem;
		}

		function getMensagem($mensagem){
			$this->mensagem = $mensagem;
		}
	}

?>