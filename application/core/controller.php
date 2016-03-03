<?php
	Abstract Class Controller{
		protected $registr;

		function  __construct($registr){
			$this->registr = $registr;
		}

		abstract function index();

	}
?>