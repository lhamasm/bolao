<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'convite.php';
	require_once 'bolao.php';
	require_once 'mensagem.php';

	//session_start();

	class ArquivoConvite implements ArquivoInterface {

		public function ler($nome) {

			if(file_exists($nome)){
				$sistema = $_SESSION['sistema'];

				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				while(!feof($arquivo)) {
					$convite = fgets($arquivo);

					if($convite != ''){
						$dados = explode(':', $convite);
						// remetente, mensagem, data, bolao
						if($dados[3] == ''){
							$m = new Mensagem($dados[0], $_SESSION['login'], $dados[1], $dados[2]);
						} else {
							$m = new Convite($dados[0], $_SESSION['login'], $dados[1], $dados[2], $dados[3]);
						}
						
						for($i=0; $i<count($sistema->getUsuarios()); $i++){
							if($sistema->getUsuarios()[$i]->getCpf() == $_SESSION['login']){
								$sistema->getUsuarios()[$i]->setMensagem($m);
								break;
							}
						}
					}
				}

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $convite) {

			$arquivo = fopen($nome, 'a+') or die("Não foi possível abrir o arquivo");

			fwrite($arquivo, $convite->getEnviador() . ':' . $convite->getMensagem() . ':' . $convite->getData() . ':' . ($convite->getBolao())->getId() . PHP_EOL);

			fclose($arquivo);
		}

	}

?>