<?php
/**
 * index.php
 * @package carbon
 * @since 1.0.0
 */

get_header();

// gets data and writes to js variable
carbon_get_postlist();

// posts component attachs here
echo '<main><div id="posts"></div></main>';

get_footer();
