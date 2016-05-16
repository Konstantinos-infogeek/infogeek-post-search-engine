<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Filename: scripts.php
 * Date: 16/5/2016
 * Time: 10:00 μμ
 */


if (!function_exists('ips_enqueue_scripts')) {
	function ips_enqueue_scripts()
	{
		$scheme = (is_ssl()) ? 'https' : 'http';

		$localize = array(
			"admin" => admin_url('admin-ajax.php', $scheme),
		);

		wp_register_script('ips-angularjs', ips_asset('libraries/angular.min.js'), array('jquery'), '1.5.5', true );
		wp_register_script('ips-angular-sanitize', ips_asset('libraries/angular-sanitize.min.js'), array('ips-angularjs', 'jquery'), '1.5.5', true );
		wp_enqueue_script('ips-app', ips_asset('assets/javascripts/app.js'), array('ips-angular-sanitize'), '1.0', true);

		//localization data
		wp_localize_script("ips-app", "ips", $localize );
	}

	add_action('wp_enqueue_scripts', 'ips_enqueue_scripts');
}


if (!function_exists('ips_enqueue_styles')) {
	function ips_enqueue_styles()
	{
		wp_enqueue_style('ips-app-css', ips_asset('assets/css/app.css'), array(), '1.0' );
	}
	
	add_action('wp_enqueue_scripts', 'ips_enqueue_styles');
}