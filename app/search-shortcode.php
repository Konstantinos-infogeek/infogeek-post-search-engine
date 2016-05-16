<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name:
 * Filename: search-shortcode.php
 * Date: 16/5/2016
 * Time: 10:11 μμ
 */

if (!function_exists('ips_search_shortcode')) {
	function ips_search_shortcode($atts, $content)
	{
		$atts = shortcode_atts(array(
			'extra_classes' => ''
		), $atts);

		//extract vars
		list($classes) = $atts;
		
		return sprintf("
		<section ng-app='IpsSearchEngine'>
			<div ng-controller='SearchController as Search'>
				<form>
					<fieldset>
						<label>Search Posts</label>
						<input type='text' ng-model='search.title' ng-change='Search.init()'>
					</fieldset>
				</form>
				<div class='search-results'>
					<div ng-repeat='post in posts | filter: search.title'>
						<h4 class='name'><a ng-href='{{post.link}}'>{{post.title}}</a></h4>
						<p ng-bind-html='post.content'></p>
					</div>
				</div>
			</div>
		</section>
		");
	}
	add_shortcode("search_post", "ips_search_shortcode");
}