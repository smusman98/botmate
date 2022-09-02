<?php

namespace BotMate;

/**
 * Main Init Class
 *
 * @package BotMate
 * @since 1.0
 */
final class Init {

    /**
     * Holds the instance of current class
     *
     * @since 1.0
     * @version 1.0
     * @var null
     */
    private static $_instance;

    /**
     * Version of plugin
     * @var string
     *
     * @since 1.0
     * @version 1.0
     */
    private $version = BOTMATE_VERSION;

    const SLUG = 'botmate';
    const CAPABILITY = 'manage_options';
    const ACTION_POST_TYPE = 'botmate_action';
    const TRIGGER_POST_TYPE = 'botmate_trigger';

    /**
     * Returns the instance of current class
     *
     * @since 1.0
     * @version 1.0
     * @return BotMate|null
     */
    public static function get_instance() {

        if( self::$_instance == null ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    /**
     * Init constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        $this->includes();
        $this->define_constants();
        $this->hooks();

    }

    /**
     * Define constants
     *
     * @param string $name Constant name
     * @param string|Bool $value Constant value
     * @since 1.0
     * @version 1.0
     */
    private function define( $name, $value ) {

        if( !defined( $name ) ) {
            define( $name, $value );
        }

    }

    /**
     * Define constants
     *
     * @since 1.0
     * @version 1.0
     */
    private function includes() {

        require 'class-scripts.php';
        require 'class-bm-admin-menu.php';
        require 'admin/menu-actions.php';
        require 'admin/menu-triggers.php';
        require 'admin/menu-connections.php';
        require 'classes/class-bm-database.php';
        require 'rest-api/Controllers/v1/class-rest-routes.php';
        require 'rest-api/Server/v1/class-server.php';
        require BOTMATE_DIR_PATH . 'includes/abstracts/abstract-bm-trigger.php';
        require BOTMATE_DIR_PATH . 'integrations/class-bm-integrations.php';

        require 'bm-functions.php';

    }

    /**
     * Define constants
     *
     * @since 1.0
     * @version 1.0
     */
    private function define_constants() {

    }

    /**
     * Action|Filters
     *
     * @since 1.0
     * @version 1.0
     */
    private function hooks() {



    }

}
