<?php
/*
Plugin Name: Infogeek Post Search Engine
Plugin URI:
Description: Post search engine
Version: 1.0
Author: Konstantinos Tsatsarounos
Author URI: http://www.ketchupthemes.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Network: false
Text Domain:
Domain Path: /language
*/

if(!defined("IPS_PLUGIN")){
	define("IPS_PLUGIN", "1.0" );
}

//Define contants
define("IPS_FILE", __FILE__);
define("IPS_DIR", __DIR__ );



if (!function_exists('ips_include_file')) {

	/**
	 * @param $path
	 * @param string $extension
	 */
	function ips_include_file($path, $extension = "php")
	{
		include_once plugin_dir_path(IPS_FILE) . $path . ".{$extension}";
	}
}

if (!function_exists('ips_asset')) {
	function ips_asset($path)
	{
		return plugin_dir_url(IPS_FILE) . $path;
	}
}



//Requires files
ips_include_file('app/ajax');
ips_include_file('app/scripts');
ips_include_file('app/search-shortcode');


