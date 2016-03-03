<?php 
	
	Class View {

		protected $registr;

		function __construct( $registr ) {
			$this->registr = $registr;
		}

		function generate( $content, $template, $data = null ){
			
				
				
				include_once '/application/views/' . $template;
			
		}

	}

?>