<?php
/**
 * single.php
 * @package carbon
 * @since 1.0.0
 */

get_header();

// write posts data to javascript variable
echo '<script>';
echo 'const post = ' . json_encode( $posts[0] );
echo '</script>';

// post component attachs here
echo '<main><div id="post"></div></main>';

get_footer();