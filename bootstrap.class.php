<?php
defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name:  (WCM) Filterama
 * Plugin URI:   https://plus.google.com/b/109907580576615571040/109907580576615571040/posts
 * Description:  Adds one taxonomy filter/drop-down/select box for each taxonomy attached to a (custom) post types list in the admin post list page.
 * Version:      1.2
 * Author:       Franz Josef Kaiser <wecodemore@gmail.com>
 * Author URI:   http://unserkaiser.com
 * Contributors: userabuser, kai-ser
 * License:      MIT
 *
 * Copyright © 2012-2013 Franz Josef Kaiser
 */

add_action( 'plugins_loaded', array( 'WCMF_bootstrap', 'init' ), 5 );
/**
 * @package    WCM Filterama
 * @subpackage Bootstrap
 */
class WCMF_bootstrap
{
	private static $instance;

	static function init()
	{
		null === self::$instance AND self :: $instance = new self;
		return self::$instance;
	}

	public function __construct()
	{
		add_action( 'load-edit.php', array( $this, 'load_files' ), 0 );
		add_action( 'load-edit.php', array( $this, 'load_l18n' ), 0 );
	}

	public function load_files()
	{
		foreach ( glob( plugin_dir_path( __FILE__ ).'inc/*.php' ) as $file )
			include_once $file;
	}

	public function load_l18n()
	{
		load_plugin_textdomain(
			'filterama',
			false,
			plugin_basename( dirname( __FILE__ ) ).'/lang'
		);
	}
}