<?php
/**
 * Theme Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package carbon
 * @since 1.0.0
 */

add_action( 'after_setup_theme', function() {
	
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'carbon' ),
				'shortName' => __( 'S', 'carbon' ),
				'size'      => 19.5,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'carbon' ),
				'shortName' => __( 'M', 'carbon' ),
				'size'      => 22,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'carbon' ),
				'shortName' => __( 'L', 'carbon' ),
				'size'      => 36.5,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'carbon' ),
				'shortName' => __( 'XL', 'carbon' ),
				'size'      => 49.5,
				'slug'      => 'huge',
			),
		)
	);

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary', 'carbon' ),
				'slug'  => 'primary',
				'color' => '#0000FF',
			),
			array(
				'name'  => __( 'Secondary', 'carbon' ),
				'slug'  => 'secondary',
				'color' => '#FF0000',
			),
			array(
				'name'  => __( 'Dark Gray', 'carbon' ),
				'slug'  => 'foreground-dark',
				'color' => '#111111',
			),
			array(
				'name'  => __( 'Gray', 'carbon' ),
				'slug'  => 'foreground',
				'color' => '#444444',
			),
			array(
				'name'  => __( 'Light Gray', 'carbon' ),
				'slug'  => 'foreground-light',
				'color' => '#767676',
			),
			array(
				'name'  => __( 'White', 'carbon' ),
				'slug'  => 'background',
				'color' => '#FFFFFF',
			),
		)
	);
} );



/**
 * Set the content width in pixels, based on the child-theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
add_action( 'after_setup_theme', function() {
	// This carbonble is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'carbon_content_width', 640 );
}, 0 );


/**
 * Add Google webfonts
 */
function carbon_fonts_url() {
	       
	$font_families = array();
	$font_families[] = 'Noto+Serif:400,700';
	$font_families[] = 'Roboto+Condensed:400,700';

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

} );


/**
 * Changes comment form default fields.
 */
add_filter( 'comment_form_defaults', function( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );
	$defaults['title_reply'] = __( 'Add Comment' );
	$defaults['label_submit'] = __( 'Submit' );

	return $defaults;
} );

require get_template_directory() . '/inc/class-varia-svg-icons.php';
require get_template_directory() . '/inc/template-tags.php';
