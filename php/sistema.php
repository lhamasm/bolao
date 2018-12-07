<?php

	class Sistema {
		protected $usuarios;
		protected $jogos;
		protected $boloes;
		protected $bugs;

		function Sistema($usuarios, $jogos, $boloes, $bugs){
			$this->usuarios = $usuarios;
			$this->jogos = $jogos;
			$this->boloes = $boloes;
			$this->bugs = $bugs;
		}

		/*function Sistema(){
			$this->usuarios = array();
			$this->jogos = array();
			$this->boloes = array();
			$this->bugs = array();
		}*/

		function setUsuarios($usuario){
			array_push($this->usuarios, $usuario);
		}

		function setJogos($jogos){
			$this->jogos = $jogos;
		}

		function setBoloes($bolao){
			array_push($this->boloes, $bolao);
		}

		function setBugs($bugs){
			$this->bugs = $bugs;
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

		function getBugs(){
			return $this->bugs;
		}

		function apagarBug($bug){
			for ($i=0; $i < count($bugs); $i++) { 
				if ($bugs[$i].getId() == $bug) {
					array_splice($bugs, $i, 1);
				}
			}
		}
	}

?>