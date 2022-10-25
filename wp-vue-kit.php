<?php
/**
 * WpVueKit.
 *
 * @package Akash\Wp_Vue_Kit
 * @author ManiruzzamanAkash <manirujjamanakash@gmail.com>
 * @license GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Wp Vue Kit
 * Description:       A Vue JS Starter Kit for WordPress plugin development - Webpack, Sass, Vue, Vuex, Vue-router.
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Version:           0.0.1
 * Author:            Maniruzzaman Akash<manirujjamanakash@gmail.com>
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-vue-kit
 */

defined( 'ABSPATH' ) || exit;

/**
 * Wp_Vue_Kit App class.
 *
 * @class Wp_Vue_Kit The class that holds the entire WpVueKit App plugin
 */
final class Wp_Vue_Kit {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '0.0.1';

	/**
	 * Plugin slug.
	 *
	 * @var string
	 *
	 * @since 0.0.1
	 */
	const SLUG = 'wp-vue-kit';

	/**
	 * Holds various class instances.
	 *
	 * @var array
	 *
	 * @since 0.0.1
	 */
	private $container = array();

	/**
	 * Constructor for the wp_vue_kit class.
	 *
	 * Sets up all the appropriate hooks and actions within our plugin.
	 *
	 * @since 0.0.1
	 */
	private function __construct() {
		require_once __DIR__ . '/vendor/autoload.php';

		$this->define_constants();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		$this->init_plugin();
	}

	/**
	 * Initializes the Wp_Vue_Kit() class.
	 *
	 * Checks for an existing Wp_Vue_Kit() instance
	 * and if it doesn't find one, creates it.
	 *
	 * @since 0.0.1
	 *
	 * @return Wp_Vue_Kit|bool
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new Wp_Vue_Kit();
		}

		return $instance;
	}

	/**
	 * Magic getter to bypass referencing plugin.
	 *
	 * @since 0.0.1
	 *
	 * @param string $prop class name.
	 *
	 * @return mixed
	 */
	public function __get( $prop ) {
		if ( array_key_exists( $prop, $this->container ) ) {
			return $this->container[ $prop ];
		}

		return $this->{$prop};
	}

	/**
	 * Magic isset to bypass referencing plugin.
	 *
	 * @since 0.0.1
	 *
	 * @param string $prop class name to access from container.
	 *
	 * @return mixed
	 */
	public function __isset( $prop ) {
		return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
	}

	/**
	 * Define the constants.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'WP_VUE_KIT_VERSION', self::VERSION );
		define( 'WP_VUE_KIT_SLUG', self::SLUG );
		define( 'WP_VUE_KIT_FILE', __FILE__ );
		define( 'WP_VUE_KIT_DIR', __DIR__ );
		define( 'WP_VUE_KIT_PATH', dirname( WP_VUE_KIT_FILE ) );
		define( 'WP_VUE_KIT_INCLUDES', WP_VUE_KIT_PATH . '/includes' );
		define( 'WP_VUE_KIT_TEMPLATE_PATH', WP_VUE_KIT_PATH . '/templates' );
		define( 'WP_VUE_KIT_URL', plugins_url( '', WP_VUE_KIT_FILE ) );
		define( 'WP_VUE_KIT_BUILD', WP_VUE_KIT_URL . '/build' );
		define( 'WP_VUE_KIT_ASSETS', WP_VUE_KIT_URL . '/assets' );
	}

	/**
	 * Load the plugin after all plugins are loaded.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function init_plugin() {
		$this->includes();
		$this->init_hooks();

		/**
		 * Fires after the plugin is loaded.
		 *
		 * @since 0.0.1
		 */
		do_action( 'wp_vue_kit_loaded' );
	}

	/**
	 * Activating the plugin.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function activate() {
		// Run the installer to create necessary migrations and seeders.
		$this->install();
	}

	/**
	 * Placeholder for deactivation function.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function deactivate() {
	}

	/**
	 * Run the installer to create necessary migrations and seeders.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	private function install() {
		$installer = new \Akash\WpVueKit\Setup\Installer();
		$installer->run();
	}

	/**
	 * Include the required files.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function includes() {
		if ( $this->is_request( 'admin' ) ) {
			// Show this only if administrator role is enabled.
			$this->container['menu'] = new Akash\WpVueKit\Menu();
		}
	}

	/**
	 * Initialize the hooks.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function init_hooks() {
		// Init classes.
		add_action( 'init', array( $this, 'init_classes' ) );

		// Localize our plugin.
		add_action( 'init', array( $this, 'localization_setup' ) );

		// Register styles and scripts.
		add_action( 'init', array( $this, 'register_asset' ) );

		// Add the plugin page links.
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );
	}

	/**
	 * Instantiate the required classes.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function init_classes() {
		$this->container['assets'] = new Akash\WpVueKit\Asset();
	}

	/**
	 * Initialize plugin for localization.
	 *
	 * @uses load_plugin_textdomain()
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function localization_setup() {
		load_plugin_textdomain( 'wp-vue-kit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Register all styles and scripts.
	 *
	 * @since 0.0.1
	 *
	 * @return void
	 */
	public function register_asset() {
		wp_vue_kit()->assets->register_all_scripts();
		wp_vue_kit()->assets->localize_scripts();
	}

	/**
	 * What type of request is this.
	 *
	 * @since 0.0.1
	 *
	 * @param string $type admin, ajax, cron or frontend.
	 *
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin':
				return is_admin();

			case 'ajax':
				return defined( 'DOING_AJAX' );

			case 'rest':
				return defined( 'REST_REQUEST' );

			case 'cron':
				return defined( 'DOING_CRON' );

			case 'frontend':
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}

	/**
	 * Plugin action links
	 *
	 * @param array $links necessary links in plugin list page.
	 *
	 * @since 0.0.1
	 *
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		$links[] = '<a href="' . admin_url( 'admin.php?page=wp-vue-kit#/settings' ) . '">' . __( 'Settings', 'wp-vue-kit' ) . '</a>';
		$links[] = '<a href="https://github.com/ManiruzzamanAkash/wp-vue-kit" target="_blank">' . __( 'Documentation', 'wp-vue-kit' ) . '</a>';

		return $links;
	}
}

/**
 * Initialize the main plugin.
 *
 * @since 0.0.1
 *
 * @return \Wp_Vue_Kit|bool
 */
function wp_vue_kit() {
	return Wp_Vue_Kit::init();
}

/*
 * Kick-off the plugin.
 *
 * @since 0.0.1
 */
wp_vue_kit();
