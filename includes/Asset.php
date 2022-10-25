<?php

namespace Akash\WpVueKit;

/**
 * Asset Manager class.
 *
 * Responsible for managing all of the assets (CSS, JS, Images, Locales).
 */
class Asset {

	/**
	 * Constructor.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ), 11 );
	}

	/**
	 * Register all scripts and styles.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function register_all_scripts() {
		$this->register_styles( $this->get_styles() );
		$this->register_scripts( $this->get_scripts() );
	}

	/**
	 * Get all styles.
	 *
	 * @since 0.0.1
	 *
	 * @return array
	 */
	public function get_styles(): array {
		return array(
			'wp-vue-kit-css' => array(
				'src'     => WP_VUE_KIT_ASSETS . '/css/main.css',
				'version' => filemtime( WP_VUE_KIT_DIR . '/assets/css/main.css' ),
				'deps'    => array(),
			),
		);
	}

	/**
	 * Get all scripts.
	 *
	 * @since 0.0.1
	 *
	 * @return array
	 */
	public function get_scripts(): array {
		return array(
			'wp-vue-kit-js' => array(
				'src'       => WP_VUE_KIT_ASSETS . '/js/main.js',
				'version'   => filemtime( WP_VUE_KIT_DIR . '/assets/js/main.js' ),
				'deps'      => array(),
				'in_footer' => true,
			),
		);
	}

	/**
	 * Register styles.
	 *
	 * @since 0.0.1
	 *
	 * @param array $styles Array of styles.
	 *
	 * @return void
	 */
	public function register_styles( array $styles ) {
		foreach ( $styles as $handle => $style ) {
			wp_register_style( $handle, $style['src'], $style['deps'], $style['version'] );
		}
	}

	/**
	 * Register scripts.
	 *
	 * @since 0.0.1
	 *
	 * @param array $scripts Array of scripts.
	 *
	 * @return void
	 */
	public function register_scripts( array $scripts ) {
		foreach ( $scripts as $handle => $script ) {
			wp_register_script( $handle, $script['src'], $script['deps'], $script['version'], $script['in_footer'] );
		}
	}

	/**
	 * Enqueue admin styles and scripts.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function enqueue_admin_assets() {
		// Check if we are on the admin page and page=wp-vue-kit.
		if ( ! is_admin() || ! isset( $_GET['page'] ) || sanitize_text_field( wp_unslash( $_GET['page'] ) ) !== 'wp-vue-kit' ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		wp_enqueue_style( 'wp-vue-kit-css' );
		wp_enqueue_script( 'wp-vue-kit-js' );
	}

	/**
	 * Localize scripts.
	 *
	 * @return void
	 */
	public function localize_scripts() {
		$user = wp_get_current_user();

		wp_localize_script(
			'wp-vue-kit-js',
			'wpEmailer',
			array(
				'user' => array(
					'id'        => $user->ID,
					'name'      => $user->display_name,
					'username'  => $user->user_login,
					'email'     => $user->user_email,
					'avatar'    => get_avatar_url( $user->ID ),
					'adminUrl'  => admin_url( 'profile.php' ),
					'logoutUrl' => wp_logout_url(),
				),
				'site' => array(
					'admin_url' => admin_url( 'admin.php' ),
					'name'      => get_bloginfo( 'name' ),
					'url'       => get_site_url(),
					'logo'      => get_site_icon_url(),
					'base_url'  => $this->get_router_base_url( admin_url( 'admin.php' ) . '?page = wp-vue-kit' ),
				),
			)
		);
	}

	/**
	 * Get router base url.
	 *
	 * @since 0.0.1
	 *
	 * @param string $admin_page_url Admin page URL.
	 *
	 * @return string
	 */
	public function get_router_base_url( $admin_page_url ) {
		$url_with_domain = substr( $admin_page_url, strpos( $admin_page_url, '//' ) + 2 );
		return substr( $url_with_domain, strpos( $url_with_domain, '/' ) + 1 ) . '#';
	}
}
