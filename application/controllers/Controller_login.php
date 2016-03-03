<?php
	Class Controller_login Extends Controller {
		

		function index() {
			View::generate( 'login.php', 'template.php' );
		}

		function entry() {
			if( isset( $_POST[ 'login' ] ) ):
				Model::check_user( $auth_mail, $auth_pass );
			endif;
		}

	}
?>