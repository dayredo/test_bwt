<?php
	Class Controller_about Extends Controller {

		function index(){
			View::generate( 'about.php', 'template.php' );
		}

	}
?>