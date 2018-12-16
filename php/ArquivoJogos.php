<?php

	require_once 'ArquivoInterface.php';
	require_once 'sistema.php';
	require_once 'jogo.php';


	class ArquivoJogo implements ArquivoInterface {

		public function ler($nome) {

			if(file_exists($nome)){
				$sistema = $_SESSION['sistema'];
				
				$arquivo = fopen($nome, 'r') or die("Não foi possível abrir o arquivo");

				while(!feof($arquivo)){
					$jogo = fgets($arquivo);

					$dados = explode(':', $jogo);
					$j = new Jogo($dados[0], $dados[1], $dados[2]);

	        		$sistema->setJogos($j);
				}

				fclose($arquivo);

				$_SESSION['sistema'] = $sistema;
			}

		}

		public function escrever($nome, $jogo) {

			$sistema = $_SESSION['sistema'];

			$cadastro = $jogo->getId() . $jogo->getResultado() . $jogo->getData() . PHP_EOL;

			$arquivo = fopen($nome, 'a+') or die("Não foi possível abrir o arquivo");
			fwrite($arquivo, $cadastro);
			fclose($arquivo);

			$sistema->setJogos($jogo);
			
			$_SESSION['sistema'] = $sistema;

		}

	}

?>