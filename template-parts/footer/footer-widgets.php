<?php
/**
 * Displays the footer widget area
 *
 * @package carbon
 * 
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<aside class="widget-area responsive-max-width" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'carbon' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
		}
		?>
	</aside><!-- .widget-area -->

<?php endif; ?>
