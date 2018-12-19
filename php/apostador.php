<?php

	require_once 'usuario.php';
	require_once 'facade.php';
	require_once 'ArquivoMensagem.php';
	require_once 'funcoes.php';
	
	class Apostador extends Usuario {
		protected $posicao;
		protected $pontuacao;
		protected $apostas;

		# Construtor
		function Apostador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta, $posicao, $pontuacao){
			parent::Usuario($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
			$this->posicao = $posicao;
			$this->pontuacao = $pontuacao;
			$this->apostas = array();
		}

		# Gettes e Setters
		function getPosicao() {
			return $this->posicao;
		}

		function getPontuacao() {
			return $this->pontuacao;
		}

		function getApostas(){
			return $this->apostas;
		}

		function setPosicao($posicao) {
			$this->posicao = $posicao;
		}

		function setPontuacao($pontuacao) {
			$this->pontuacao += $pontuacao;
		}

		function setApostas($aposta){
			array_push($this->apostas, $aposta);
		}

		# Métodos
		function reportarBugs($texto) {
			$mensagem = new Mensagem($texto);
			$sistema->setBugs($mensagem);
		}

		function apostar($usuario, $bolao, $valor, $opcaoDeAposta){
			if ($bolao->getLimiteDeParticipantes() > count($bolao->getParticipantes())) {
				$aposta = new Aposta($usuario, $bolao, $valor, $opcaoDeAposta);
				array_push($this->apostas, $aposta);

				for ($i=0; $i < count($bolao->getParticipantes()); $i++) { 
					if ($bolao->getParticipantes()[$i] == $usuario) {
						break;
					}
				}

				if ($i ==  count($bolao->getParticipantes())) {
					$bolao->setParticipantes($usuario);
				}
				
				$bolao->setApostas($aposta);
				$bolao->setDinheiros(doubleval($valor));

			}
			else {
				echo 'Limite de Participantes atingido';
			}
		}

		/*function editarAposta($aposta, $data) {
			if ($data < $bolao->getTempoLimite()) {
				for ($i=0; $i < count(($aposta->getBolao())->getApostas()); $i++) { 
					if ((($aposta->getBolao())->getApostas())[$i] == $aposta) {
						# edit aposta here
					}
				}
			}
			else {
				return -1;
			}
		}

		function aceitarConvite() {
			
		}*/
	}


?>