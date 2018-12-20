<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'apostador.php';
	require_once 'administrador-sistema.php';
	require_once 'administrador-bolao.php';
	require_once 'bolao.php';
	require_once 'facade.php';
	require_once 'ArquivoBolao.php';
	require_once 'convite.php';
	require_once 'mensagem.php';

	abstract class Administrador extends Usuario {

		function Administrador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			parent::Usuario($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
		}

		function convidarApostadorUsername($usuarios, $username, $data, $bolao) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$convite = new Convite($this->username, $username, 'Participe do bolão' . $bolao->getTitulo(), $bolao, $data);
					$usuarios[$i]->setMensagem($convite);
					$_SESSION['status'] = 1;
					header('Location: ../convidar-amigos.php');
					exit();
				}
			}

			$_SESSION['status'] = 0;
			header('Location: ../convidar-amigos.php');
			exit();
		}

		function convidarApostadorEmail($usuarios, $email, $data, $bolao) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getEmail() == $email){
					$convite = new Convite($this->username, $email, 'Participe do bolão' . $bolao->getTitulo(), $bolao, $data);
					$usuarios[$i]->setMensagem($convite);
					$_SESSION['status'] = 1;
					header('Location: ../convidar-amigos.php');
					exit();
				}
			}

			$_SESSION['status'] = 0;
			header('Location: ../convidar-amigos.php');
			exit();
		}

		function excluirApostador($participante, $bolao){
			$sistema = $_SESSION['sistema'];
			$usuarios = $sistema->getUsuarios();
			$boloes = $sistema->getBoloes();
			$valor = 0;

			$participantes = $boloes[intval($bolao)]->getParticipantes();
			for($j=0; $j<count($usuarios); $j++){
				if($usuarios[$j]->getCpf() == $participante){
					$m = new Mensagem('SisBolao', $usuarios[$j]->getCpf(), 'Você foi excluído do bolão ' . $boloes[intval($bolao)]->getTitulo() . '. Todas as suas apostas foram ressarcidas.', date('d/m/Y'));
					$usuarios[$j]->setMensagem($m);
					break;
				}
			}

			$apostas = $boloes[intval($bolao)]->getApostas();
			for($i=0; $i<count($apostas); $i++){
				if($apostas[$i]->getUsuario() == $participante){
					$valor += (-1) * intval($apostas[$i]->getValor());
					//array_splice($apostas, $i);
				}
			}

			$b = new Bolao($boloes[intval($bolao)]->getId(), $boloes[intval($bolao)]->getCriador(), $boloes[intval($bolao)]->getTipo(), $boloes[intval($bolao)]->getCampeonato(), $boloes[intval($bolao)]->getTitulo(), $boloes[intval($bolao)]->getDescricao(), $boloes[intval($bolao)]->getLimiteDeParticipantes(), $boloes[intval($bolao)]->getTipoJogo(), $boloes[intval($bolao)]->getTipoAposta(), $boloes[intval($bolao)]->getSenha(), $boloes[intval($bolao)]->getDinheiros());
			$b->setDinheiros($valor);
			$b->setTempoLimite($boloes[intval($bolao)]->getTempoLimite());

			for($i=0; $i<count($apostas); $i++){
				if($apostas[$i]->getUsuario() != $participante){
					$b->setApostas($apostas[$i]);
				}				
			}

			for($i=0; $i<count($participantes); $i++){
				if($participantes[$i] != $participante){
					$b->setParticipantes($participantes[$i]);
				}
			}

			array_splice($boloes, intval($bolao));
			array_push($boloes, $b);

			$s = new Sistema($sistema->getUsuarios(), $sistema->getJogos(), $boloes, $sistema->getBugs());
			$_SESSION['sistema'] = $s;

			unlink('../bd/boloes.txt');
			$bolao = new ArquivoBolao();
		    $facade = new Facade($bolao);
		    for($i=0; $i<count($boloes); $i++){
		    	$facade->escreverEm('../bd/boloes.txt', $boloes[$i]);
		    }
			
			//fclose($arquivo);
			$_SESSION['status'] = 1;
			header('Location: ../meus-boloes.php');
			exit();
		}
	}
?>