<?php

	require_once 'ArquivoMensagem.php';
	require_once 'facade.php';
	require_once 'mensagem.php';

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
			$m = new Mensagem('SisBolao', $this->apostador, $subject->getEvent(), date('d/m/Y'));
			array_push($this->mensagens , $m);

			//unlink('../bd/mensagens-' . $this->apostador . '.txt');
			$mensagem = new ArquivoMensagem();
    		$facade = new Facade($mensagem);
   			$facade->escreverEm('../bd/mensagens-' . $this->apostador . '.txt', $this->mensagens);
		}

		public function getPriority() {
			return $this->priority;
		}

	}
?>