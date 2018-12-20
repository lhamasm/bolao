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

			$adm = new AdministradorBolao($_SESSION['tipo'], $_SESSION['nome'], $_SESSION['username'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['ddn'], $_SESSION['genero'], $_SESSION['rg'], $_SESSION['login'], $_SESSION['telefone'], $_SESSION['celular'], $_SESSION['banco'], $_SESSION['agencia'], $_SESSION['conta']);
			$adm->excluirApostador($this->participante, $this->bolao);

		}
	}
?>