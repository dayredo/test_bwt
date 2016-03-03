<?php
	
	require_once '/core/model.php';
	require_once '/core/controller.php';
	require_once '/core/route.php';
	require_once '/core/view.php';
	
	//error_reporting(E_WARNING);

	define( 'DIRSEP', DIRECTORY_SEPARATOR );
	$site_path = realpath( dirname(__FILE__). DIRSEP. '..' .DIRSEP ) . DIRSEP;
	define( 'site_path', $site_path );

	function __autoload($class_name){
		$filename = strtolower($class_name) .'.php';
		$file = site_path . 'application' . DIRSEP . 'core'. DIRSEP .'' .$filename;
		
		if( file_exists( $file ) ):
			require $file;
			// echo $file;
		else:
			return false;
		endif;
	}

	$registr = new Registr;

	
	


		
	Router::set_path( site_path .'application\controllers' );
	
	Router::delegate();
	


?>