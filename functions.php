<?php
/**
 * Theme Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jots
 * @since 1.0.0
 */

add_action( 'init', function() {

	wp_register_style(
		'jots-style-variables',
		get_template_directory_uri() . 'style-variables.css',
		array()
	);

	wp_register_style(
		'jots-style',
		get_stylesheet_uri(),
		array( 'jots-style-variables' )
	);

} );

add_action( 'after_setup_theme', function() {
	
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'jots' ),
				'shortName' => __( 'S', 'jots' ),
				'size'      => 19.5,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'jots' ),
				'shortName' => __( 'M', 'jots' ),
				'size'      => 22,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'jots' ),
				'shortName' => __( 'L', 'jots' ),
				'size'      => 36.5,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'jots' ),
				'shortName' => __( 'XL', 'jots' ),
				'size'      => 49.5,
				'slug'      => 'huge',
			),
		)
	);

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary', 'jots' ),
				'slug'  => 'primary',
				'color' => '#0000FF',
			),
			array(
				'name'  => __( 'Secondary', 'jots' ),
				'slug'  => 'secondary',
				'color' => '#FF0000',
			),
			array(
				'name'  => __( 'Dark Gray', 'jots' ),
				'slug'  => 'foreground-dark',
				'color' => '#111111',
			),
			array(
				'name'  => __( 'Gray', 'jots' ),
				'slug'  => 'foreground',
				'color' => '#444444',
			),
			array(
				'name'  => __( 'Light Gray', 'jots' ),
				'slug'  => 'foreground-light',
				'color' => '#767676',
			),
			array(
				'name'  => __( 'White', 'jots' ),
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
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'jots_content_width', 640 );
}, 0 );


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'jots-style' );
} );
