<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Filename: ajax.php
 * Date: 16/5/2016
 * Time: 9:44 μμ
 */


if (!function_exists('ips_wp_post_endpoint')) {

	/**
	 *
	 */
	function ips_wp_post_endpoint()
	{
		if ( false === ( $results = get_transient( 'infogeek_post_search_results' ) ) ) {
			// It wasn't there, so regenerate the data and save the transient
			$results = new WP_Query(array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'nopaging' => TRUE
			));
			set_transient( 'infogeek_post_search_results', $results );
		}


		$output = [];
		if($results->have_posts()){
			while ($results->have_posts()){ $results->the_post();
				array_push($output, ips_format_single_post($results->post));
			}
		}
		exit( json_encode($output) );
	}

	add_action('wp_ajax_nopriv_get_posts', 'ips_wp_post_endpoint');
	add_action('wp_ajax_get_posts', 'ips_wp_post_endpoint');
}



if (!function_exists('ips_format_single_post')) {

	/**
	 * @param $post
	 *
	 * @return array
	 */
	function ips_format_single_post($post)
	{
		return [
			"title" => $post->post_title,
			"content" => $post->post_content,
			"date" => $post->post_date,
		];
	}

}