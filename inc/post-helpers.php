<?php

/**
 * Post Helpers
 *
 * @package Simple Professional
 */


/**
 * Returns a random offset for given post type
 * @param string type - Custom post type
 * @return int a random intergerget to offset post types
 */
function get_random_post_offset( $post_type ){
	$post_count_obj = wp_count_posts($post_type);
	$num_posts = $post_count_obj->publish;
	$random_offset = rand(0, $num_posts - 1);
	return $random_offset;
};