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
     * Officing_Plus constructor.
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

        require 'class-bm-admin-page.php';
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

        add_action( 'admin_menu', array( $this, 'add_menu_page' ) );

    }

    /**
     * Registers menu
     *
     * @since 1.0
     * @version 1.0
     */
    public function add_menu_page() {

        add_menu_page(
            __( 'BotMate', 'botmate' ),
            __( 'BotMate', 'botmate' ),
            self::CAPABILITY,
            self::SLUG,
            array( AdminPage::class, 'botmate' ),
            'dashicons-rest-api'
        );

        add_submenu_page(
            self::SLUG,
            '',
            __( 'Dashboard', 'botmate' ),
            self::CAPABILITY,
            self::SLUG,
            '',
            1
        );

        add_submenu_page(
            self::SLUG,
            __( 'Actions', 'botmate' ),
            __( 'Actions', 'botmate' ),
            self::CAPABILITY,
            'edit.php?post_type=botmate_actions',
            false,
            1
        );

        add_submenu_page(
            self::SLUG,
            __( 'Triggers', 'botmate' ),
            __( 'Triggers', 'botmate' ),
            self::CAPABILITY,
            self::SLUG . '-triggers',
            array( AdminPage::class, 'triggers' ),
            2
        );

        add_submenu_page(
            self::SLUG,
            __( 'Logs', 'botmate' ),
            __( 'Logs', 'botmate' ),
            self::CAPABILITY,
            self::SLUG . '-logs',
            array( AdminPage::class, 'logs' ),
            3
        );

        do_action( 'botmate_add_menu', $this );

    }

}
