<?php
/**
 * Plugin Name: BotMate
 * Plugin URI: https://botmate.com/
 * Description: Allows you to connect your sites together, and Automate/ Sync workflows with no code.
 * Version: 1.0
 * Author: CoderPress
 * Author URI: https://coderpress.io
 * Text Domain: botmate
 * Domain Path: /i18n/languages/
 * Requires at least: 5.8
 * Requires PHP: 7.2
 *
 * @package BotMate
 */

use BotMate\Init;

defined( 'ABSPATH' ) || exit;
define( 'BOTMATE_VERSION', '1.0' );
define( 'BOTMATE_PLUGIN_FILE', __FILE__ );

require_once dirname( BOTMATE_PLUGIN_FILE ) . '/includes/class-botmate.php';

/**
 * Returns the main instance of OC
 *
 * @since 1.0
 * @version 1.0
 * @return mixed
 */
function BotMate_loader() {

    Init::get_instance();

    do_action( 'botmate_init' );

}

BotMate_loader();
