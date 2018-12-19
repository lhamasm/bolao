<?php

	require_once 'sistema.php';
	require_once 'usuario.php';

	class Mensagem {
		protected $enviador;
		protected $recebedor;
		protected $data;
		protected $mensagem;

		function Mensagem($enviador, $recebedor, $mensagem, $data){
			$this->mensagem = $mensagem;
			$this->enviador = $enviador;
			$this->recebedor = $recebedor;
			$this->data = $data;
		}

		function setMensagem($mensagem){
			$this->mensagem = $mensagem;
		}

		function setEnviador($enviador){
			$this->enviador = $enviador;
		}

		function setRecebedor($recebedor){
			$this->recebedor = $recebedor;
		}

		function setData($data){
			$this->data = $data;
		}

		function getMensagem(){
			return $this->mensagem;
		}

		function getEnviador(){
			return $this->enviador;
		}

		function getRecebedor(){
			return $this->recebedor;
		}

		function getData(){
			return $this->data;
		}
	}

?>