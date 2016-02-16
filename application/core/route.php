<?php
	
	Class Router {
		private $registr;
		private $path;
		private $args;

		function __construct( $registr ) {
			self::$registr = $registr;
			$router = new Router( $registr );
			$registr::set( 'router', $router );
		}

		function set_path( $path ) {
			$path = trim( $path, '/\\' );
			$path .= DIRSEP;
			if( is_dir( $path ) == false ):
				throw new Exception ( 'Invalid controller path' . $path . '' );
			endif;
			$router->path = $path;
		}

		private function getController( &$file, &controller, &$action, &$args ) {
			if( !empty( $_GET[ 'route' ] ) ):
				$route = $_GET[ 'route' ];
			else:
				$route = 'index';
			endif;

			$route = trim( $route, '/\\' );
			$parts = explode( '/', $route );
			if( empty( $parts[0] ) ):
				$controller = 'index';
			else:
				$controller = $parts[0];
			endif;

			if( empty( $parts[1] ) ):
				$action = 'index';
			else:
				$action = $parts[1];
			endif;

			$file = 'Controller_' . $controller . '.php';
			$args = $parts;
		}

		function delegate() {
			self::getController( $file, $controller, $action, $args );
			$full_uri = site_path . 'application' . DIRSEP . 'controllers' . DIRSEP . $file;
			if( is_readable( $full_uri ) == true ):
				include $full_uri;
			else:
				die( 'file dont readable or not found' );
			endif;

			$class 'Controller_' . $controller;
			$controller = new $class( part );
			if( is_callable( $controller, $cation ) ==true ):
				$controller->$action();
			else:
				die( 'action not found' );
			endif;
		}
	}

?>