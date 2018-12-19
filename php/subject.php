<?php

	//require_once 'splSubjectInterface.php';

	class Subject implements SplSubject {

		protected $linkedList = array();
		protected $observers = array();
		protected $event;

		public function attach(SplObserver $observer){
			$observerKey = spl_object_hash($observer);
			$this->observers[$observerKey] = $observer;
			$this->linkedList[$observerKey] = $observer->getPriority();
			arsort($this->linkedList);
		}

		public function detach(SplObserver $observer){
			$observerKey = spl_object_hash($observer);
			unset($this->observers[$observerKey]);
			unset($this->linkedList[$observerKey]);
		}

		public function notify(){
			foreach ($this->linkedList as $key => $value) {
				$this->observers[$key]->update($this);
			}
		}

		// resultado do bolão, excluir participante do bolão, excluir bolão...
		public function setEvent($event){
			$this->event = $event;
			$this->notify();
		}

		public function getEvent(){
			return $this->event;
		}

		public function getObservers(){
			return $this->getObservers();
		}
	}

?>