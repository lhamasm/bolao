<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'apostador.php';
	require_once 'aposta.php';

	//session_start();

	class ArquivoAposta implements ArquivoInterface {

		public function ler($nome) {

			if(file_exists($nome)){
				$sistema = $_SESSION['sistema'];

				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				$user = explode('.', $nome);
				$u = $user[2] .  $user[3] . $user[4];
				$user = explode('-', $u);
				$u = '';
				$u = $user[1] . '-' . $user[2];
				$U = $u[0] . $u[1] . $u[2] . '.' . $u[3] . $u[4] . $u[5] . '.' . $u[6] . $u[7] . $u[8] . $u[9] . $u[10] . $u[11];


				while(!feof($arquivo)) {
					$aposta = fgets($arquivo);

					if($aposta != ''){
						//if(isset($_SESSION['login'])){
							$dados = explode(':', $aposta);
							$a = new Aposta($_SESSION['login'], $dados[0], $dados[1], $dados[2], $dados[3], intval($dados[4]));
							for($i=0; $i<count($sistema->getUsuarios()); $i++){
								if($sistema->getUsuarios()[$i]->getCpf() == $U){
									$sistema->getUsuarios()[$i]->setApostas($a);
								}
							}
						//}
					}
				}

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $apostas) {

			$arquivo = fopen($nome, 'w+') or die("Não foi possível abrir o arquivo");

			for($i=0; $i<count($apostas); $i++){
				fwrite($arquivo, $apostas[$i]->getBolao() . ':' . $apostas[$i]->getValor() . ':' . $apostas[$i]->getOpcaoDeAposta() . ':' . date('d/m/Y') . ':' . $apostas[$i]->getStatus() . PHP_EOL);
			}

			fclose($arquivo);

		}

	}

?>