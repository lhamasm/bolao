<?php

	class Sistema {
		protected $usuarios;
		protected $jogos;
		protected $boloes;
	}

	function Sistema($usuarios, $jogos, $boloes){
		$this->usuarios = $usuarios;
		$this->jogos = $jogos;
		$this->boloes = $boloes;
	}

	function setUsuarios($usuarios){
		$this->usuarios = $usuarios;
	}

	function setJogos($jogos){
		$this->jogos = $jogos;
	}

	function setBoloes($boloes){
		$this->boloes = $boloes;
	}

	function getUsuarios(){
		return $this->usuarios;
	}

	function getJogos(){
		return $this->jogos;
	}

	function getBoloes(){
		return $this->boloes;
	}

?>