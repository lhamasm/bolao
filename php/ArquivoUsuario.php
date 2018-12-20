<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'apostador.php';
	require_once 'administrador-sistema.php';
	require_once 'administrador-bolao.php';

	//session_start();

	class ArquivoUsuario implements ArquivoInterface {
		
		public function ler($nome) {

			if(file_exists($nome)){

				$sistema = $_SESSION['sistema'];

				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				while(!feof($arquivo)){
					$usuario = fgets($arquivo);

					if($usuario != ''){
						$dados = explode(':', $usuario);
						if($dados[0] == '1'){
							$u = new AdministradorSistema($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[9], $dados[10], $dados[11], $dados[12], $dados[13]);
						} elseif ($dados[0] == '0') {
							$u = new Apostador($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7], $dados[8], $dados[9], $dados[10], $dados[11], $dados[12], $dados[13], intval($dados[14]), intval($dados[15]));
						} 

		        		$sistema->setUsuarios($u);
					}
				}

				fclose($arquivo);

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $usuario){
			$sistema = $_SESSION['sistema'];
			$usuarios = $sistema->getUsuarios();

			$cadastro = $usuario->getTipo() . ':' . $usuario->getNome() . ':' . $usuario->getUsername() . ':' . $usuario->getEmail() . ':' . $usuario->getSenha() . ':' . $usuario->getDataNascimento() . ':' . $usuario->getGenero() . ':' . $usuario->getRg() . ':' . $usuario->getCpf() . ':' . $usuario->getTelefone() . ':' . $usuario->getCelular() . ':' . $usuario->getBanco() . ':' . $usuario->getAgencia() . ':' . $usuario->getConta() . ':'. count($usuarios) . ':0' . PHP_EOL;

			$arquivo = fopen($nome, 'a+') or die("Não foi possível abrir o arquivo");
			fwrite($arquivo, $cadastro);
			fclose($arquivo);

			$sistema->setUsuarios($usuario);

			$_SESSION['sistema'] = $sistema;
		}
		
	}

?>