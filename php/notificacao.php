<?php

	class Notificacao extends Mensagem(){
		protected $usuario;
		protected $mensagem;

		function Mensagem($usuario, $mensagem){
			$this->usuario = $usuario;
			$this->mensagem = $mensagem
		}

		function getUsuario(){
			return $this->usuario;
		}

		function getMensagem(){
			return $this->mensagem;

		}
		function setUsuario($usuario){
			$this->usuario = $usuario;
		}

		function setMensagem($mensagem){
			$this->mensagem = $mensagem;
		}
	}
?>