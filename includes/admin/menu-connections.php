<?php

namespace BotMate;

class MenuConnection {

    private static $_instance;

    public static function get_instance() {

        if( self::$_instance == null ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

    /**
     * MenuConnection constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        add_action( 'botmate_add_menu', array( $this, 'add_submenu' ) );
        add_action( 'wp_ajax_bm-save-sites', array( $this, 'save_sites' ) );

        if ( isset( $_GET['page'] ) && $_GET['page'] == 'botmate-connections' ) {

            add_action( 'botmate_admin_register_scripts', array( $this, 'admin_enqueue_scripts' ) );

        }

    }


    /**
     * Adds sub-menu | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function add_submenu() {

        add_submenu_page(
            Init::SLUG,
            __( 'Connections', 'botmate' ),
            __( 'Connections', 'botmate' ),
            Init::CAPABILITY,
            Init::SLUG . '-connections',
            array( $this, 'page' ),
            3
        );

    }

    /**
     * Admin enqueue scripts | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function admin_enqueue_scripts() {

        wp_enqueue_style( 'botmate-admin' );
        wp_enqueue_script( 'botmate-connections' );

    }


    /**
     * Html page
     *
     * @since 1.0
     * @version 1.0
     */
    public function page() {

        require 'views/html-connections.php';

    }

    /**
     * Adds Site | AJAX
     *
     * @since 1.0
     * @version 1.0
     */
    public function save_sites() {

        wp_verify_nonce( $_POST['_nonce'], 'bm-security' );

        $sites = sanitize_text_field( $_POST['sites'] );
        $sites = stripslashes( $sites );
        $sites = json_decode( $sites, true );

        /**
         * Filter sites
         *
         * @param array $sites
         *
         * @since 1.0
         */
        $sites = apply_filters( 'botmate_save_sites', $sites );

        botmate_save_sites( $sites );

    }

}

MenuConnection::get_instance();
