<?php
/**
 * index.php
 * @package carbon
 * @since 1.0.0
 */

get_header();

// write posts data to javascript variable
echo '<script>';
echo 'const posts = ' . json_encode( $posts );
echo '</script>';

// posts component attachs here
echo '<main><div id="posts"></div></main>';

get_footer();
