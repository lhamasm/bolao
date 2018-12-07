<?php

	class Bug extends Mensagem{
		protected $nome;
		protected $detalhes;
		protected $descricao;

		function Bug($nome, $detalhes, $descricao){
			$this->nome = $nome;
			$this->detalhes = $detalhes;
			$this->descricao = $descricao;
		}

		
		function getNome($nome){
			return $this->nome;
		}

		function getDetalhes($detalhes){
			return $this->detalhes;
		}

		function getDescricao($descricao){
			return $this->descricao;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function setDetalhes($detalhes){
			$this->detalhes = $detalhes;
		}

		function setDescricao($descricao){
			$this->descricao = $descricao;
		}
	}

?>