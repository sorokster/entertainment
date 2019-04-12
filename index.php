<?php
/**
 * Plugin Name:       Vegas Shows & Hotels
 * Description:       Import to database Las Vegas Shows and Hotels. Create new shows & hotels and update if they're exist.
 * Version:           1.0.0
 * Author:            Yevgen Sorokin
 * GitHub Plugin URI: https://gicker.co/boosta/unicorn-seo/sites/best-vegas.com/tree/master/wp-content/plugins/vegas-shows
 */

namespace Entertainment;
use Entertainment\Src\Tabs\CreateTab;
use Entertainment\Src\Pages\PageSettings;

define('PLUGIN_PATH', WP_PLUGIN_DIR.'/'.basename(dirname(__FILE__)));
define('PLUGIN_URL', WP_PLUGIN_URL.'/'.basename(dirname(__FILE__)));

require_once( 'lib/autoloader.php' );

add_action( 'plugins_loaded', __NAMESPACE__ . '\\entertainment_load' );

function entertainment_load() {
	$data = [
		'tab_menu'		=> 'menu',
		'parent_slug'	=> null,
		'page_title'	=> 'Import Shows & Hotels',
		'menu_title'	=> 'Import Shows & Hotels',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'entertainment'
	];
	$file_reader = new CreateTab( new PageSettings(), $data );
	$file_reader->init();
}