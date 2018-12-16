<?php

	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'administrador.php';
	require_once 'administrador-bolao.php';
	require_once 'bolao.php';
	require_once 'funcoes.php';
	require_once 'ConvitesTela.php';

	//session_start();

	$username = '';
	$email = '';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_REQUEST['username']) && $_REQUEST['username'] != ''){

			$username = p_respostas($_REQUEST['username']);

			$telaConvites = new ConvitesTela($username, 'u');
			$telaConvites->convidar();

			/*$adm = new AdministradorBolao($_SESSION['tipo'], $_SESSION['nome'], $_SESSION['username'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['ddn'], $_SESSION['genero'], $_SESSION['rg'], $_SESSION['login'], $_SESSION['telefone'], $_SESSION['celular'], $_SESSION['banco'], $_SESSION['agencia'], $_SESSION['conta']);
			$adm->setBolao($boloes[count($boloes)-1]);
			$adm->setUsername($_SESSION['username']);
			$adm->convidarApostadorUsername($usuarios, $username, date('d/m/Y'), $boloes[count($boloes)-1]);

			for($i=0; $i<count($usuarios); $i++){
				if($usuarios[$i]->getUsername() == $username){
					if(file_exists('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt')){
						$arquivo = fopen('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt', 'a+');
						fwrite($arquivo, $_SESSION['username'] . ';Convite;' . date('d/m/Y') . ';' . count($boloes) . PHP_EOL);
						fclose($arquivo);
						break;
					} else {
						$arquivo = fopen('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt', 'w+');
						fwrite($arquivo, $_SESSION['username'] . ';Convite;' . date('d/m/Y') . ';' . count($boloes) . PHP_EOL);
						fclose($arquivo);
						break;
					}
				}
			}

			$_SESSION['status'] = 1;
			header("Location: ../convidar-amigos.php");
			exit();*/
		} else {
			if(isset($_REQUEST['email']) && $_REQUEST['email'] != ''){

				$email = p_respostas($_REQUEST['email']);

				$username = p_respostas($_REQUEST['username']);

				$telaConvites = new ConvitesTela($email, 'e');
				$telaConvites->convidar();

				/*$adm = new AdministradorBolao($_SESSION['tipo'], $_SESSION['nome'], $_SESSION['username'], $_SESSION['email'], $_SESSION['senha'], $_SESSION['ddn'], $_SESSION['genero'], $_SESSION['rg'], $_SESSION['login'], $_SESSION['telefone'], $_SESSION['celular'], $_SESSION['banco'], $_SESSION['agencia'], $_SESSION['conta']);
				$adm->setBolao($boloes[count($boloes)-1]);
				$adm->setUsername($_SESSION['username']);
				$adm->convidarApostadorEmail($usuarios, $email, date('d/m/Y'), $boloes[count($boloes)-1]);

				for($i=0; $i<count($usuarios); $i++){
					if($usuarios[$i]->getEmail() == $email){
						if(file_exists('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt')){
							$arquivo = fopen('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt', 'a+');
							fwrite($arquivo, $_SESSION['login'] . ';Convite;' . date('d/m/Y') . ';' . count($boloes . PHP_EOL));
							fclose($arquivo);
							break;
						} else {
							$arquivo = fopen('../bd/mensagens-' . $usuarios[$i]->getCpf() . '.txt', 'w+');
							fwrite($arquivo, $_SESSION['login'] . ';Convite;' . date('d/m/Y') . ';' . count($boloes . PHP_EOL));
							fclose($arquivo);
							break;
						}
					}
				}

				$_SESSION['status'] = 1;
				header("Location: ../convidar-amigos.php");
				exit();
			} else {
				$_SESSION['status'] = 0;
				header("Location: ../convidar-amigos.php");
				exit();
			}*/
			}
		}
	}


?>