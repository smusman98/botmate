<?php

namespace BotMate;

/**
 * Admin menu pages call-backs
 *
 *
 * @package BotMate
 * @since 1.0
 * @version 1.0
 */
class AdminPage {


    /**
     * AdminPage constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        $this->hooks();

    }


    /**
     * Hooks & Filters
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
            Init::CAPABILITY,
            Init::SLUG,
            array( AdminPage::class, 'botmate' ),
            'dashicons-rest-api'
        );

        add_submenu_page(
            Init::SLUG,
            '',
            __( 'Dashboard', 'botmate' ),
            Init::CAPABILITY,
            Init::SLUG,
            '',
            1
        );

        add_submenu_page(
            Init::SLUG,
            __( 'Actions', 'botmate' ),
            __( 'Actions', 'botmate' ),
            Init::CAPABILITY,
            'edit.php?post_type=botmate_actions',
            false,
            1
        );

        add_submenu_page(
            Init::SLUG,
            __( 'Triggers', 'botmate' ),
            __( 'Triggers', 'botmate' ),
            Init::CAPABILITY,
            Init::SLUG . '-triggers',
            array( AdminPage::class, 'triggers' ),
            2
        );

        add_submenu_page(
            Init::SLUG,
            __( 'Logs', 'botmate' ),
            __( 'Logs', 'botmate' ),
            Init::CAPABILITY,
            Init::SLUG . '-logs',
            array( AdminPage::class, 'logs' ),
            3
        );

        /**
         * Fires when menu is loaded
         *
         * @param object $this class.
         *
         * @since 1.0
         */
        do_action( 'botmate_add_menu', $this );

    }


    /**
     * call-back | Botmate
     *
     * @since 1.0
     * @version 1.0
     */
    public function botmate() {
        //Todo: docs, videos, add-ons, AutomatorWP
        ?>
        <h1>Botmate</h1>
        <?php

    }


    /**
     * call-back | Triggers
     *
     * @since 1.0
     * @version 1.0
     */
    public function triggers() {
        ?>
        <h1>Triggers</h1>
        <?php

    }

    /**
     * call-back | Logs
     *
     * @since 1.0
     * @version 1.0
     */
    public function logs() {
        ?>
        <h1>Logs</h1>
        <?php

    }

}

new AdminPage();
