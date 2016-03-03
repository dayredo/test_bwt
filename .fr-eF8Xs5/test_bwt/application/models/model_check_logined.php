<?php
	Class Model_checking_logined {
		
		// private $registr;
		// function __construct($registr){
		// 	$this->registr = $registr;
		// 	$mcl = new Model_checking_logined($registr);
		// 	$registr = $mcl;
		// }	

		function logined() {
			if( !isset($_COOKIE['id_user'] ) ):
				$result = mysql_query( "SELECT f_name, l_name FROM users WHERE user_id = '" . $_COOKIE[ 'id_user' ] .  "' " );
				?>
					<div class="user_info">
						<form action="" method="post">
						<span>Hallo <?php $result[ 'f_name' ]  ?></span>
						<input type="submit" neme="logout" value="Log out" />
						</form>
					</div>
				<?php
			else:
				?>
					<div class="user_info">
						<form action="index.php" method="post">
						</span>
						<a href="login">Log in</a>
						<a href="signup">Sign up</a>
					</div>
				<?php
			endif;

		}

		function menu_item() {
			if( $_COOKIE[ 'id_user' ] ):
				echo '<li></li>';
			endif;
			return;
		}
	}