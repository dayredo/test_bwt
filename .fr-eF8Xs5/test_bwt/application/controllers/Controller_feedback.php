<?php

	Class Controller_feedback Extends Controller {

		function index() {
			if( !isset( $_COOKIE[ 'id_user' ] ) ):
				View::generate( 'feedback.php', 'template.php' );
			else:
				VIew::generate( 'none.php', 'template.php' );
			endif;
		}

	}

?>