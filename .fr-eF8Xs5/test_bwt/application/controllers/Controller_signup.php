<?php
	Class Controller_signup Extends Controller {

		function index(){
			View::generate( 'signup.php', 'template.php' );
		}

		function entry() {
			if( isset( $_POST[ 'signup' ] ) ):
				$f_name = $_POST[ 'f_name' ];
				$l_name = $_POST[ 'l_name' ];
				$birthday = $_POST[ 'birthday' ];
				$phone = $_POST[ 'phone' ];
				$sex = $_POST[ 'sex' ];
				$email = $_POST[ 'email' ];
				$imgupload = $_POST[ 'imgupload' ];
				$password = $_POST[ 'password' ];
				Model::sign_user( $f_name, $l_name, $birthday, $phone, $sex, $email, $imgupload, $password );
				$data = array(
					$f_name, $l_name, $birthday, $phone, $sex, $email, $imgupload, $password
				);
				View::generate( 'none.php', 'template.php', $data );
			endif;
		}

	}
?>