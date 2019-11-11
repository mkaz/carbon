<?php
/**
 * functions.php
 * @package carbon
 * @since 1.0.0
 */


/**
 * Add Google webfonts
 */
function carbon_fonts_url() {

	$font_families = array();
	$font_families[] = 'Noto+Serif:400,700';

	$query_args = array(
			'family' => implode( '|', $font_families ),
			'subset' => 'latin,latin-ext',
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {

    // enqueue Google fonts, if necessary
    wp_enqueue_style( 'carbon-fonts', carbon_fonts_url(), array(), null );

	wp_enqueue_style(
		'carbon-style',
		get_stylesheet_uri(),
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	wp_enqueue_script(
		'carbon-script',
		get_stylesheet_directory_uri() . '/dist/index.js',
		array(),
		filemtime( get_stylesheet_directory() . '/dist/index.js' ),
		true // in footer
	);

} );

require_once( __DIR__ . '/utils.php' );
