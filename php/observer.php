<?php

	//require_once 'splObserverInterface.php';

	class Observer implements SplObserver {

		protected $apostador;
		protected $priority = 0;
		protected $mensagens;

		public function Observer($apostador, $priority=0){
			$this->apostador = $apostador;
			$this->priority = $priority;
			$this->mensagens = array();
		}

		public function update(SplSubject $subject){
			array_push($this->mensagens , $subject->getEvent());

			if(file_exists('../bd/mensagens-' . $this->apostador . '.txt')){
				$arquivo = fopen('../bd/mensagens-' . $this->apostador . '.txt', 'a+');
				for($i = 0; $i < count($this->mensagens); $i++){
					fwrite($arquivo, 'SisBolao;' . $this->mensagens[$i] . ';' . date('d/m/Y') . ';-' . PHP_EOL);
				}
				fclose($arquivo);
			} else {
				$arquivo = fopen('../bd/mensagens-' . $this->apostador . '.txt', 'w+');
				for($i = 0; $i < count($this->mensagens); $i++){
					fwrite($arquivo,  'SisBolao;' . $this->mensagens[$i] . ';' . date('d/m/Y') . ';-' . PHP_EOL);
				}
				fclose($arquivo);
			}
		}

		public function getPriority() {
			return $this->priority;
		}

	}
?>