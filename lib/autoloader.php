<?php

namespace Entertainment\Lib;

spl_autoload_register(function( $filename ) {
	$file_path = explode( '\\', $filename );
	
	if ( isset( $file_path[ count( $file_path ) - 1 ] ) ) {
		$class_file = $file_path[ count( $file_path ) - 1 ];
		$class_file = str_ireplace( '_', '-', $class_file );
		$class_file = $class_file . '.php';
	}

	$fully_qualified_path = trailingslashit( dirname( dirname( __FILE__ ) ) );

	for ( $i = 1; $i < count( $file_path ) - 1; $i++ ) {
		$dir = strtolower( $file_path[ $i ] );
		$fully_qualified_path .= trailingslashit( $dir );
	}

	$fully_qualified_path .= $class_file;
	if ( file_exists( $fully_qualified_path ) ) {
		require_once( $fully_qualified_path );
	}
});