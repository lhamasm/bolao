<?php

	require_once 'sistema.php';
	require_once 'bolao.php';
	require_once 'funcoes.php';

	session_start();

	class CadastrarBolaoTela{
		/*protected $campeonato;
		protected $posicao;
		protected $pontuacao;
		protected $nome;*/
		protected $campeonatobolao;
		protected $tipobolao;
		protected $nomebolao;
		protected $descricaobolao;
		protected $noparticipantesbolao;
		protected $escolhasapostabolao;
		protected $tipojogobolao;
		protected $tipoapostabolao;
		/*protected $reportarbugs;
		protected $termosCondicoes;*/
		protected $senha;
		protected $dataTermino;

		function CadastrarBolaoTela($campeonato, $tipo, $senha, $nome, $descricao, $participantes, $opcoesAposta, $tipoJogo, $tipoAposta, $dataTermino)
		{
			/*$this->campeonato = $campeonato;
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->nome = $nome;*/
			$this->campeonatobolao = $campeonato;
			$this->tipobolao = $tipo;
			$this->nomebolao = $nome;
			$this->descricaobolao = $descricao;
			$this->noparticipantesbolao = $participantes;
			/*$this->reportarbugs = $reportarbugs;
			$this->termosCondicoes = $termosCondicoes;*/
			$this->escolhasapostabolao = $opcoesAposta;
			$this->tipojogobolao = $tipoJogo;
			$this->tipoapostabolao = $tipoAposta;
			$this->senha = $senha;
			$this->dataTermino = $dataTermino;

		}

		/*function getPosicao(){
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
		}*/

		function getCampeonatoBolao(){
			return $this->campeonatobolao;
		}

		function setCampeonatoBolao($campeonatobolao){
			$this->campeonatobolao = $campeonatobolao;
		}

		function getTipoBolao(){
			return $this->tipobolao;
		}

		function setTipoBolao($tipobolao){
			$this->tipobolao = $tipobolao;
		}

		function getNomeBolao(){
			return $this->nomebolao;
		}

		function setNomeBolao($nomebolao){
			$this->nomebolao = $nomebolao;
		}

		function getDescricaoBolao(){
			return $this->descricaobolao;
		}

		function setDescricaoBolao($descricaobolao){
			$this->descricaobolao = $descricaobolao;
		}

		function getNoParticipantesBolao(){
			return $this->noparticipantesbolao;
		}

		function setNoParticipantesBolao($noparticipantesbolao){
			$this->noparticipantesbolao = $noparticipantesbolao;
		}

		function getEscolhasApostaBolao(){
			return $this->escolhasapostabolao;
		}

		function setEscolhasApostaBolao($escolhasapostabolao){
			$this->escolhasapostabolao = $escolhasapostabolao;
		}

		function getTipoJogoBolao(){
			return $this->tipojogobolao;
		}

		function setTipoJogoBolao($tipojogobolao){
			$this->tipojogobolao = $tipojogobolao;
		}

		function getTipoApostaBolao(){
			return $this->tipoapostabolao;
		}

		function setTipoApostaBolao($tipoapostabolao){
			$this->tipoapostabolao = $tipoapostabolao;
		}

		/*function getReportarBugs(){
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
		}*/

		function getSenha(){
			return $this->senha;
		}

		function setSenha($senha){
			$this->senha = $senha;
		}

		function getDataTermino(){
			return $this->dataTermino;
		}

		function setDataTermino($dataTermino){
			$this->dataTermino = $dataTermino;
		}

		function cadastrarBolao() {
			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();

			$this->id = count($boloes) + 1;

			$cadastro = $this->id . ';' . $_SESSION['login'] . ';' . $this->tipobolao . ';' . $this->campeonatobolao . ';' . $this->nomebolao . ';' . $this->descricaobolao . ';' . $this->noparticipantesbolao . ';;' . $this->tipojogobolao[0] . '-' . $this->tipojogobolao[1] . '-' . $this->tipojogobolao[2] . '-' . $this->tipojogobolao[3] . '-' . $this->tipojogobolao[4] . '-' . $this->tipojogobolao[5] . ';' . $this->tipoapostabolao . ';';


			for($i = 0; $i < count($this->escolhasapostabolao)-1; $i++){
				if($i == count($this->escolhasapostabolao)-2){
					$cadastro = $cadastro . $this->escolhasapostabolao[$i];
				} else {
					$cadastro = $cadastro . $this->escolhasapostabolao[$i] . '-';
				}
			}

			$cadastro = $cadastro . ';' . $this->senha . ';;0;' . $this->dataTermino . PHP_EOL;

			$bolao = new Bolao($this->id, $_SESSION['login'], $this->tipobolao, $this->campeonatobolao, $this->nomebolao, $this->descricaobolao, $this->noparticipantesbolao, $this->tipojogobolao, $this->tipoapostabolao, $this->escolhasapostabolao, $this->senha, 0);
			$bolao->setTempoLimite($this->dataTermino);

			for($i = 0; $i < count($boloes); $i++){
				if($boloes[$i]->getCriador() == $_SESSION['login'] && $boloes[$i]->getTitulo() == $this->nomebolao && $boloes[$i]->getCampeonato() == $this->campeonatobolao){
					$_SESSION['status'] = 2;
					header('Location: ../cadastro-bolao.php');
			  		//echo 'Já existe um bolão com o mesmo nome, administrador e campeonato';
					exit();	
				}
			}

			if(file_exists('../bd/boloes.txt')){
				$arquivo = fopen('../bd/boloes.txt', 'a+') or die("Não foi possível abrir o arquivo");
			} else {
				$arquivo = fopen('../bd/boloes.txt', 'w+') or die("Não foi possível abrir o arquivo");
			}

			fwrite($arquivo, $cadastro);
			fclose($arquivo);

			$sistema->setBoloes($bolao);
			$_SESSION['sistema'] = $sistema;

			$_SESSION['status'] = 3;
			//echo "Bolão cadastrado com sucesso!";
			header('Location: ../convidar-amigos.php');
			exit();
		}
	}

?>