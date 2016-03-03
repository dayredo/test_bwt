<?php

	class Router {
		private $registr;
		private $path;
		private $args;

		function __construct($registr){
			self::$registr = $registr;
			$router = new Router($registr);
			$registr::set('router', $router);
		}

		function set_path($path){
			$path =trim( $path, '/\\' );

			$path .= DIRSEP;
			if( is_dir( $path ) == false ):
				throw new Exception ( 'Invalid controller path [' . $path . ']' );
			endif;
			$router->path = $path;
		}

		function  getController(&$file, &$controller, &$action, &$args){
			# Get data from adress line and checking it null
			if( isset( $_GET['route'] ) ):
				$route = $_GET[ 'route' ];
				// echo $route .'<br>';
			else:
				$route = 'index';
				// echo '[' .$route .'] query return null<br>';
			endif;

			# If var = null, given var is assigned value `index` 
			//if( empty( $route ) ) $route = 'index';

			$route = trim( $route, '/\\' );
			$parts = explode( '/', $route );
			// echo '#32 > Controller level patrs [' . $parts[0] . ']<br>';
			// echo '#33 > Action level parts [' . $parts[1] . ']<br>';
			foreach( $parts as $path ):
				// echo 'part: [' . $path .'] : [' . $parts[1] . '] <br>' ;
			endforeach;
			if( empty( $parts[0] ) ):
				$controller = 'index';
				// echo '#37 > this controller: [' . $controller . '] var empty<br>';
			else:
				$controller = $parts[0];
				// echo '#40 > this controller: [' . $controller . '] var not empty<br>';
			endif;
			if( empty( $parts[1] ) ):
				$action = 'index';
				// echo '#44 > this action: [' . $action . '] var empty <br>';
			else:
				$action = $parts[1];
				// echo '#47 > this action: [' . $action . '] var not empty <br>';
			endif;
			$file = 'Controller_' . $controller . '.php';
			// echo '#50 > file controller name [' .$file . ']<br>';
			# Full uri form directory controllers
			$full_dir_uri = site_path .'application\controllers' . DIRSEP . $file;
			// echo '#37 > Full uri from directory controlles file [' . $full_dir_uri . ']<br>';
			
			// if( file_exists( $file ) ):
			// 	echo '#56 > File real exists [' . $file . ']<br>';
			// 	// if( is_readable(filename) )
				
			// 	break;
			// else:
			// 	echo '#42 > fullpath not file<br>';
			// 	endif;
			
			
			// $file =  $cmd_path . $controller .'.php';
			// echo '#64 > file [' . $file . ']<br>';
			// echo '#65 > controller [' . $controller . ']<br>';
			// echo '#66 > cmd_path [' . $cmd_path . ']<br>';
			$args = $parts;
		}

		function delegate(){
			self::getController( $file, $controller, $action, $args );
			// echo $file;
			$full_dir_uri = site_path .'application\controllers' . DIRSEP . $file;
			if( is_readable( $full_dir_uri ) == true ):
				// echo 'file [' . $full_dir_uri . ']<br>';
				include( $full_dir_uri );
				
			else:
				// echo 'file [' . $full_dir_uri . ']<br>';
				View::generate( '404.php', 'template.php' );
			endif;
			$class = 'Controller_'. $controller;
			@$controller = new $class(part);
			// echo 'class: [' . $class .']<br>';
			if( is_callable( array( $controller, $action ) ) == true ):
				$controller->$action();
			endif;
			// echo '#93 > action: [' . $action .'] run';
			 
		}
	}