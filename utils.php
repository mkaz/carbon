<?php

/**
 * WordPress operates using filters to process data
 * The data from wp_query is straight from the database
 * you must use the `get_the_` functions to apply the
 * filters to the data. For example, the "excerpt" does
 * not exist in the database, but generated on the fly.
 */
function carbon_wpquery_to_js( $excerpt_only = false ) {
	global $wp_query;
	$postList = array();
	if ( have_posts() ) {
		foreach ( $wp_query->posts as $post ) {
			$p = array();
			$p["id"] = $post->ID;
			$p["permalink"] = get_the_permalink( $post );
			$p["title"] = get_the_title( $post );
			$p["date"] = $post->post_date;
			$p["content"] = ( $excerpt_only ) ? get_the_excerpt( $post ) : get_the_content( null, null, $post );
			$postList[] = $p;
		}
	}
	return $postList;
}

function carbon_get_postlist() {
	$postList = carbon_wpquery_to_js( $excerpt_only=true );
	echo '<script>';
	echo 'const posts = ' . json_encode( $postList ) . ';';
	echo '</script>';
}

function carbon_get_post() {
	$postList = carbon_wpquery_to_js();
	echo '<script>';
	echo 'const post = ' . json_encode( $postList[0] ) . ';';
	echo '</script>';
}
