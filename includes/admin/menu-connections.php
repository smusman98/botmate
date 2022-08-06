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

        wp_enqueue_script( 'botmate-admin' );
        wp_enqueue_style( 'botmate-admin' );

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

}

MenuConnection::get_instance();
