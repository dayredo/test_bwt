<?php
	Class Controller_index Extends Controller{

		function index(){
			if( $_COOKIE[ 'id_user' ] ):
				View::generate( 'home.php', 'template.php', $data );
			else:
				require_once '/application/models/model_parser.php';
				View::generate( 'weater.php', 'template.php' );
			endif;
		}

		function error404() {
			View::generate( 'Error404.php', 'template.php' );
		}

	}
?>