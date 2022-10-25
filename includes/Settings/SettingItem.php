<?php

namespace Akash\WpVueKit\Settings;

/**
 * SettingItem class.
 *
 * Handle settings.
 */
class SettingItem {
	/**
	 * Numrows.
	 *
	 * @var integer
	 */
	private int $numrows;

	/**
	 * Is human date
	 *
	 * @var boolean
	 */
	private bool $humandate;

	/**
	 * Emails.
	 *
	 * @var array
	 */
	private array $emails;

	/**
	 * Class constructor.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {
		$defaults        = Settings::get_default_settings();
		$this->numrows   = $defaults['numrows'];
		$this->humandate = $defaults['humandate'];
		$this->emails    = $defaults['emails'];
	}

	/**
	 * Get the value of numrows.
	 *
	 * @return int
	 */
	public function get_numrows(): int {
		return $this->numrows;
	}

	/**
	 * Set the value of numrows.
	 *
	 * @param int $numrows Number of rows.
	 *
	 * @return self
	 */
	public function set_numrows( int $numrows ): self {
		$this->numrows = $numrows;

		return $this;
	}

	/**
	 * Get the value of human date.
	 *
	 * @return bool
	 */
	public function get_human_date(): bool {
		return $this->humandate;
	}

	/**
	 * Set the value of humandate.
	 *
	 * @param bool $humandate Is the date would be human readable date.
	 *
	 * @return self
	 */
	public function set_human_date( bool $humandate ): self {
		$this->humandate = $humandate;

		return $this;
	}

	/**
	 * Get the value of emails.
	 *
	 * @return array
	 */
	public function get_emails(): array {
		return $this->emails;
	}

	/**
	 * Set the value of emails.
	 *
	 * @param array $emails Email lists.
	 *
	 * @return self
	 */
	public function set_emails( array $emails ): self {
		$this->emails = $emails;

		return $this;
	}
}
