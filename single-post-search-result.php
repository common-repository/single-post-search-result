<?php
/**
 * Plugin Name: Single Post Search Result
 * Plugin URI: https://wordpress.org/plugins/single-post-search-result/
 * Description: This Plugin will redirect any search results that only have a single post to the single post that was returned in the search.
 * Author: Stuart Duff
 * Version: 1.0.1
 * Author URI: http://stuartduff.com/
 * Requires at least: 4.6
 * Tested up to:      4.6.1
 *
 * @author Stuart Duff
 * @since 1.0
 */
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * This function will redirect any search results that only have a single post
 * to the single post page that was returned in the search.
 *
 * @since 1.0.0
 */
function wp_single_post_search_result() {

    if ( is_search() ) {

        global $wp_query;

        if ( $wp_query->post_count == 1 ) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
        }

    }

}

/**
 * This fires the template_redirect action for the wpskeleton_single_post_search_result() function.
 *
 * @since 1.0.0
 */
add_action( 'template_redirect', 'skeleton_single_post_search_result' );
