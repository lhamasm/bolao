<?php

	require_once 'convidarPorEmail.php';
	require_once 'convidarPorUsername.php';

	class ConvitesTela{
		protected $usuario;
		protected $strategy;

		function ConvitesTela($usuario, $tipo)
		{
			$this->usuario = $usuario;

			if($tipo == 'u') {
				$this->strategy = new ConvidarPorUsername();
			} else {
				$this->strategy = new ConvidarPorEmail();
			}
		}

		function getPosicao(){
			return $this->posicao;
		}

		function setPosicao($posicao){
			$this->posicao = $posicao;
		}

		function getPontuacao(){
			return $this->pontuacao;
		}

		function setPontuacao($pontuacao){
			$this->pontuacao = $pontuacao;
		}

		function getNome(){
			return $this->nome;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function getCampeonato(){
			return $this->campeonato;
		}

		function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}

		function getConvites(){
			return $this->convites;
		}

		function setConvites($convites){
			$this->convites = $convites;
		}

		function getUsername(){
			return $this->username;
		}

		function setUsername($username){
			$this->username = $username;
		}

		function getEmail(){
			return $this->email;
		}

		function setEmail($email){
			$this->email = $email;
		}

		function getProvasResultados(){
			return $this->provasresultados;
		}

		function setProvasResultados($provasresultados){
			$this->provasresultados = $provasresultados;
		}

		function getResultadosBoloes(){
			return $this->resultadosboloes;
		}

		function setResultadosBoloes($resultadosboloes){
			$this->resultadosboloes = $resultadosboloes;
		}

		function getReportarBugs(){
			return $this->reportarbugs;
		}

		function setReportarBugs($reportarbugs){
			$this->reportarbugs = $reportarbugs;
		}

		function getTermosCondicoes(){
			return $this->termosCondicoes;
		}

		function setTermosCondicoes($termosCondicoes){
			$this->termosCondicoes = $termosCondicoes;
		}

		function convidar() {
			$this->strategy->convidar($this->usuario);
		}
	}

?>