<?php

	require_once 'sistema.php';
	require_once 'administrador.php';
	require_once 'jogo.php';
	require_once 'bolao.php';
	require_once 'ArquivoJogos.php';
	require_once 'ArquivoUsuario.php';
	require_once 'ArquivoBolao.php';
	require_once 'facade.php';

	class AdministradorSistema extends Administrador {

		function AdministradorSistema($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta){
			parent::Administrador($tipo, $nome, $username, $email, $senha, $dataNascimento, $genero, $rg, $cpf, $telefone, $celular, $banco, $agencia, $conta);
		}

		function cadastrarResultado($campeonato, $ano, $tipo, $dataProva, $tema, $ganhador, $ingredientes, $equipes){
			$sistema = $_SESSION['sistema'];
			$jogos = $sistema->getJogos();;

			for($i = 0; $i < count($jogos); $i++){
				if($jogos[$i]->getTipo() == $tipo && $jogos[$i]->getData() == $dataProva){
					$_SESSION['status'] = 2;
					//header('Location: ../adm-page#cadastrarResultados.php');
			  		//echo 'Já existe um bolão com o mesmo nome, administrador e campeonato';
					exit();	
				}
			}

			$jogo = new Jogo($campeonato, $ano, $tipo, $dataProva, $tema, $ganhador, $ingredientes);
			$jogo->setEquipes($equipes);

			$j = new ArquivoJogo();
    		$facade = new Facade($j);
    		$facade->escreverEm('../bd/jogos.txt', $jogo);

    		$sistema->setJogos($jogo);
			$_SESSION['sistema'] = $sistema;


			$_SESSION['status'] = 3;
			//echo "Bolão cadastrado com sucesso!";
			//header('Location: ../adm-page#cadastrarResultados.php');
			exit();
		}

		function excluirBolao($bolao){
			$sistema = $_SESSION['sistema'];
			$boloes = $sistema->getBoloes();

			$boloes[intval($bolao)]->setEvent('O bolão '  . $boloes[intval($bolao)]->getTitulo() . ' foi excluído');

			array_splice($boloes, $bolao);

			$s = new Sistema($sistema->getUsuarios(), $sistema->getJogos(), array(), $sistema->getBugs());
			$_SESSION['sistema'] = $s;

			unlink('../bd/boloes.txt');
			$b = new ArquivoBolao();
    		$facade = new Facade($b);
    		for($i=0; $i<count($boloes); $i++){
    			$facade->escreverEm('../bd/boloes.txt', $boloes[$i]);
    		}
		}

		function excluirUsuario($usuario) {
			$sistema = $_SESSION['sistema'];
			$usuarios = $sistema->getUsuarios();

			for($i=0; $i<count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $usuario){
					array_splice($usuarios, $i);
					break;
				}
			}

			$s = new Sistema(array(), $sistema->getJogos(), $sistema->getBoloes(), $sistema->getBugs());
			$_SESSION['sistema'] = $s;

			unlink('../bd/usuarios.txt');
			$u = new ArquivoUsuario();
    		$facade = new Facade($u);
    		for($i=0; $i<count($usuarios); $i++){
    			$facade->escreverEm('../bd/usuarios.txt', $usuarios[$i]);
    		}
		}

		/*function consultarUsuario($usuario) {
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getCpf() == $usuario){
					return $usuarios[$i];
				}
			}
		}

		function sendMensagem($username, $texto){
			for($i = 0; $i < count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					$mensagem = new Mensagem($texto);
					$usuarios[$i]->setMensagem($mensagem);
				}
			}
		}*/

	}
?>