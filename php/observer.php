<?php

	use SplSubjetc;
	use SplObserver;
	use Apostador;

	abstract class Observer implements SplObserver {

		protected $apostador;
		protected $priority = 0;
		protected $mensagens;

		public function Observer($apostador, $priority=0){
			$this->apostaor = $apostador;
			$this->priority = $priority;
			$this->mensagens = array();
		}

		public function update(SplSubject $subject){
			array_push($this->mensagens , $subject->getEvent());
		}

		public function getPriority() {
			return $this->priority;
		}

	}
?>