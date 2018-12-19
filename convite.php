<?php

	require_once 'mensagem.php';
	
	class Convite extends Mensagem {
		protected $bolao;

		function Convite($enviador, $recebedor, $mensagem, $data, $bolao) {
			parent::Mensagem($enviador, $recebedor, $mensagem, $data);
			$this->bolao = $bolao;
		}

		function setBolao($bolao){
			$this->bolao = $bolao;
		}

		function getBolao(){
			return $this->bolao;
		}
	}
?>