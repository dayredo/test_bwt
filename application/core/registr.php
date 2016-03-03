<?php
	class Registr{
		private $vars = array();

		function set( $key, $var ){
			if( isset( self::$vars[$key] ) == true ):
				throw new Exception( 'Unable to set var [' . $key . ']. Already set' );
			endif;
			self::$vars[$key] = $var;
			return true;
		}

		function get( $key ){
			if( isset( self::$vars[$key] ) == false ):
				return null;
			endif;
			return self::$vars[$key];
		}

		function remove( $var ){
			unset( self::$vars[$key] );
		}

	}
?>