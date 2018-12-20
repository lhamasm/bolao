<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'administrador-bolao.php';
	require_once 'apostador.php';
	require_once 'bolao.php';
	require_once 'facade.php';
	require_once 'ArquivoBolao.php';

	session_start();

	class ExcluirParticipanteTela{
		protected $participante;
		protected $bolao;

		function ExcluirParticipanteTela($bolao, $participante)
		{
			$this->participante = $participante;
			$this->bolao = $bolao;
		}

		function getParticipante(){
			return $this->participante;
		}

		function setParticipante($participante){
			$this->participante = $participante;
		}

		function getBolao(){
			return $this->participante;
		}

		function setBolao($bolao){
			$this->bolao = $bolao;
		}

		function excluir(){

			$adm = $_SESSION['usuario'];
			$adm->excluirApostador($this->participante, $this->bolao);

		}
	}
?>