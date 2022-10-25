<?php

namespace Akash\WpVueKit;

/**
 * Menu generator class.
 *
 * Ensure admin menu registrations.
 *
 * @since 0.0.1
 */
class Menu {

	/**
	 * Constructor.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'init_menu' ) );
	}

	/**
	 * Init Menu.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function init_menu() {
		global $submenu;

		$slug          = WP_VUE_KIT_SLUG;
		$menu_position = 50;
		$capability    = 'manage_options';

		add_menu_page( esc_attr__( 'WP Vue Kit', 'wp-vue-kit' ), esc_attr__( 'WP Vue Kit', 'wp-vue-kit' ), $capability, $slug, array( $this, 'plugin_page' ), 'dashicons-screenoptions', $menu_position );

		// Register this only for Administrator user.
		if ( current_user_can( $capability ) ) {
			$submenu[ $slug ][] = array( esc_attr__( 'Settings', 'wp-vue-kit' ), $capability, 'http://localhost/wpvue/wp-admin/admin.php?page=wp-vue-kit#/' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			$submenu[ $slug ][] = array( esc_attr__( 'List', 'wp-vue-kit' ), $capability, 'http://localhost/wpvue/wp-admin/admin.php?page=wp-vue-kit#/list' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			$submenu[ $slug ][] = array( esc_attr__( 'Another', 'wp-vue-kit' ), $capability, 'http://localhost/wpvue/wp-admin/admin.php?page=wp-vue-kit#/another' ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		}
	}

	/**
	 * Render the plugin page.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function plugin_page() {
		require_once WP_VUE_KIT_TEMPLATE_PATH . '/app.php';
	}
}
