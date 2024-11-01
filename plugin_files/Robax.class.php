<?php

class Robax
{
	// singleton pattern
	protected static $instance;

	/**
	 * Absolute path to plugin files
	 */
	protected $plugin_url = null;

	/**
	 * Robax license parameters
	 */
	protected $login = null;
	protected $license_number = null;

	/**
	 * Remembers if Robax license number is set
	 */
	protected static $license_installed = false;

	/**
	 * Starts the plugin
	 */
	protected function __construct()
	{
		add_action ('wp_footer', array($this, 'tracking_code'));
	}

	public static function get_instance()
	{
		if (!isset(self::$instance))
		{
			$c = __CLASS__;
			self::$instance = new $c;
		}

		return self::$instance;
	}

	/** 
	 * Returns plugin files absolute path
	 *
	 * @return string
	 */
	public function get_plugin_url()
	{
		if (is_null($this->plugin_url))
		{
			$this->plugin_url = WP_PLUGIN_URL.'/wp-robax-software-for-wordpress/plugin_files';
		}

		return $this->plugin_url;
	}

	/**
	 * Returns true if Robax license is set properly,
	 * false otherwise
	 *
	 * @return bool
	 */
	public function is_installed()
	{
		return ($this->get_license_number() > 0);
	}

	/**
	 * Returns Robax license number
	 *
	 * @return int
	 */
	public function get_license_number()
	{
		if (is_null($this->license_number))
		{
			$this->license_number = get_option('robax_license_number');
		}

		// license_number must be >= 0
		// also, this prevents from NaN values
		$this->license_number = max(0, $this->license_number);

		return $this->license_number;
	}

	/**
	 * Returns Robax login
	 */
	public function get_login()
	{
		if (is_null($this->login))
		{
			$this->login = get_option('login');
		}

		return $this->login;
	}

	/**
	 * Injects tracking code
	 */
	public function tracking_code()
	{
		$this->get_helper('TrackingCode');
	}

	/**
	 * Echoes given helper
	 */
	public static function get_helper($class, $echo=true)
	{
		$class .= 'Helper';

		if (class_exists($class) == false)
		{
			$path = dirname(__FILE__).'/helpers/'.$class.'.class.php';
			if (file_exists($path) !== true)
			{
				return false;
			}

			require_once($path);
		}

		$c = new $class;

		if ($echo)
		{
			echo $c->render();
			return true;
		}
		else
		{
			return $c->render();
		}
	}
}