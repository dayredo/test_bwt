<?php
	
	Abstract Class Model {

		protected $registr;

		function  __construct($registr) {
			$this->registr = $registr;
		}

		abstract function index();

		public function connect_db() {
			mysql_connect("localhost", "root", "") or die ( "Invalid connect mysql!" . mysql_error() );
			mysql_select_db( "test_bwt" ) or die ( "Invalid connect db" . mysql_error() );
			mysql_query( "SET NAMES 'utf8'" );
		}

		public function sign_user( $f_name, $l_name, $birthday, $phone, $sex, $email, $imgupload, $password ) {
			self::connect_db();
			mysql_query( "INSERT INTO users SET f_name = '$f_name', l_name = '$l_name', birthday = '$birthday', phone = '$phone', email = '$email', avatar = '$imgupload', password = '$password', " );
		}

		public function check_user( $auth_mail, $auth_pass ) {
			self::connect_db();
			$result = mysql_fetch_assoc( mysql_query( "SELECT user_id, mail, pass FROM users WHERE mail ='" .mysql_real_escape_string( $authmail ) . "'  LIMIT 1" ) );
			if( $result[ 'pass' ] === $auth_pass ):
				setcookie( "mail", $auth_mail, time()+60*60*24*30 );
				setcookie( "pass", $auth_pass, time()+60*60*24*30 );
				setcookie( "user_id", $user_id, time()+60*60*24*30 );
				return true;
			else:
				return false;
			endif;
		}

		public function logout() {
			if( isset( $_POST[ 'exit' ] ) ):
				setcookie("mail", "");
				setcookie("pass", "");
				setcookie("user_id", "");
			endif;
		}

		function logined() {
			self::connect_db();
			if( isset($_COOKIE['user_id'] ) ):
				$result = mysql_fetch_assoc( mysql_query( "SELECT f_name, l_name FROM users WHERE user_id = '" . $_COOKIE[ 'id_user' ] .  "' " ) );
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
						<form action="" method="post">
						
							<a href="login">Log in</a>
							<a href="signup">Sign up</a>
						</form>
					</div>
				<?php
			endif;

		}

		function menu_items() {
			Router::getController( $file, $controller, $action, $args );
			echo '<a href="/test_bwt">home</a>';
			if( $controller != 'index' ):
				if( file_exists( 'Controller_' . $controller ) ):
					echo ' > <a href=" ' . $controller  . ' "> ' . $controller . ' </a>';
				endif;
			endif;
		}

		public function send_message( $name_user, $user_mail, $text_feed ) {
			self::connect_db();
			$date_mess = date("d.m.Y h:m");
			mysql_query( "INSERT INTO feedback SET name_user = '$name_user', user_mail = '$user_mail', text_feed = '$text_feed', date_feed = '" . date( "d.m.Y" ) . date( "h:M" ) .  "' " );	
		}

		public function view_form_feedback() {
			if( isset( $_POST[ 'leave' ] ) ):
				if( isset( $_COOKIE[ 'user_id' ] ) ):
					$name_user = $_COOKIE[ 'f_name' ];
					$user_mail = $_COOKIE[ 'mail' ];
				else:
					if( $name_user != '' ):
						$name_user = $_POST[ 'name_user' ];
					endif;
					if( $user_mail != '' ):
						$user_mail = $_POST[ 'user_mail' ];
					endif;
				endif;
				$text_feed = $_POST[ 'text_feed' ];
				self::send_message( $name_user, $user_mail, $text_feed );
			endif;
			echo '<form action="" method="post">';
			if( !isset( $_COOKIE[ 'user_id' ] ) ):
				echo 'cookie: ' . $_COOKIE[ 'user_id' ];
				echo '
				<div>
					<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" name="feed_name" class="form-control" id="name" placeholder="Your name">
  					</div>
  <div class="form-group">
    <label for="email">Email: </label>
    <input type="email" name="feed_mail" class="form-control" id="email" pattern="^[-a-z0-9!#$%&amp;*+/=?^_&#96;{|}~]+(\.[-a-z0-9!#$%&amp;*+/=?^_&#96;{|}~]+)*@([a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)* (aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$" required="" placeholder="example@email.com">
  </div>
   <div class="form-group">
    <label for="phone">Phone : </label>
    <input type="phone" name="feed_phone" class="form-control" id="phone" pattern="[0-9_-]{10}" required="" placeholder="(___) ___ __ __">
  </div>
  </div>';
			endif;
			echo '<textarea class="form-control" required="" placeholder="Text message" ></textarea>
			 <div class="form-group" id="cap">
    				<label class="sr-only" for="check_capcha"></label>
    				<div class="input-group">
     					 <input class="input-group-addon" id="capcha" disabled="disabled" value="' . self::capcha() . '" />	
      					<input type="text" name="check_capcha" class="form-control" id="check_capcha" placeholder="Input capcha text">
      					<div class="input-group-addon" id="indication"></div> 
    				</div>
				<button type="button" class="btn btn-primary" id="check">I`m not robot</button>
  			</div>
			</form>';
		}

		public function capcha(){
			$char = "abcdefghijklmnopqrstuvwxyz123456789";
			$numChar = strlen($char);
			$str = "";
			for( $i=0; $i<=5; $i++ ):
				$str .= substr( $char, rand( 1, $numChar ) - 1, 1 );
			endfor;
			return $str;
		}

		public function view_feedback() {
			self::connect_db();
			@$result = mysql_fetch_assoc( mysql_query( "SELECT * FROM feetback" ) );
			if( !empty( $result ) ):
				while( count( $result ) ): ?>
					<section id="'<?php echo $result[ 'feet_id' ] ?> ">
						<header>
							<h4 class="title-feet"><?php echo $result[ 'name_user' ] ?> </h4>
						</header>
						<div class="content-feet">
							<?php echo $result[ 'feet_text' ]  ?>
						</div>
						<footer>
							<?php $result[ 'feet_date' ] ?>
						</footer>
					</section>
				<?php endwhile; 
			else: ?>
				<div class="alert alert-info" role="alert">Sorry, but for now no entries existed</div>
			<?php endif;

		}

	}

?>