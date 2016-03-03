<?php
	
	Class Controller_weater Extends Controller {

		protected $registr;

		function  __construct($registr){
			$this->registr = $registr;
		}



		

		function index(){
			require_once '/application/models/model_parser.php';
			echo $registr;
			View::generate('weater.php', 'template.php');
		}

	}

?>