<?php

namespace Akash\WpVueKit\Settings;

/**
 * Settings static helper methods.
 *
 * @since 0.0.1
 */
class Settings {

	/**
	 * Get default settings.
	 *
	 * @return array
	 */
	public static function get_default_settings() {
		return array(
			'numrows'   => 5,
			'humandate' => true,
			'emails'    => array(
				get_option( 'admin_email' ),
			),
		);
	}
}
