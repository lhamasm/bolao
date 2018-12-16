<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'usuario.php';
	require_once 'mensagem.php';

	class ArquivoMensagem implements ArquivoInterface {

		public function ler($nome) {

			if(file_exists($nome)){
				$sistema = $_SESSION['sistema'];

				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				while(!feof($arquivo)) {
					$mensagem = fgets($arquivo);

					$dados = explode(':', $mensagem);
					// remetente, mensagem, data, bolao
					$m = new Mensagem($dados[0], $_SESSION['login'], $dados[1], $dados[2]);
					
					for($i=0; $i<count($sistema->getUsuarios()); $i++){
						if($sistema->getUsuarios()[$i]->getCpf() == $_SESSION['login']){
							$sistema->getUsuarios()[$i]->setMensagem($m);
							$_SESSION['msg'] = $sistema->getUsuarios()[$i]->getMensagem();
							break;
						}
					}
				}

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $mensagens) {

			if(file_exists($nome)){
				$arquivo = fopen($nome, 'a+') or die("Não foi possível abrir o arquivo");
			} else {
				$arquivo = fopen($nome, 'w+') or die("Não foi possível abrir o arquivo");

			}

			for($i=0; $i<count($mensagens); $i++){
				fwrite($arquivo, $mensagens[$i]->getEnviador() . ':' . $mensagens[$i]->getMensagem() . ':' . $mensagens[$i]->getData() . PHP_EOL);
			}

			fclose($arquivo);
		}

	}

?>