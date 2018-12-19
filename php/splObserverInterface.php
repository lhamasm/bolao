<?php

	require_once 'splSubjectInterface.php';

	interface SplObserver {

		public function update(SplSubject $subject);

	}

?>