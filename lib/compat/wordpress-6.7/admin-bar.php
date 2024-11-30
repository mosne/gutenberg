<?php
/**
 * Changes to the WordPress admin bar.
 *
 * @package gutenberg
 */

/**
 * Adds the "Design" link to the Toolbar.
 *
 * @since 6.7.0
 *
 * @param WP_Admin_Bar $wp_admin_bar The WP_Admin_Bar instance.
 */
function gutenberg_admin_bar_design_menu( $wp_admin_bar ) {

	// Don't show if a block theme is not activated.
	if ( ! wp_is_block_theme() ) {
		return;
	}

	// Don't show for users who can't edit theme options.
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	$wp_admin_bar->add_node(
		array(
			'id'    => 'site-editor',
			'title' => __( 'Edit site' ),
			'href'  => admin_url( 'site-editor.php' ),
		)
	);
}
remove_action( 'admin_bar_menu', 'wp_admin_bar_edit_site_menu', 42 );
add_action( 'admin_bar_menu', 'gutenberg_admin_bar_design_menu', 43 );
