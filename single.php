<?php
/**
 * single.php
 * @package carbon
 * @since 1.0.0
 */

get_header();

// gets data and writes to js variable
carbon_get_post();

// post component attachs here
echo '<main><div id="post"></div></main>';

get_footer();
