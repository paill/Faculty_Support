<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Academic Technology Services
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function ats_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'ats_jetpack_setup' );
