<?php

namespace BotMate;

class Scripts {

    /**
     * Scripts constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

    }

    /**
     * Admin register scripts | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function admin_enqueue_scripts() {

        wp_register_script( 'botmate-admin', BOTMATE_PLUGIN_URL . 'assets/js/admin.js', array( 'jquery' ), BOTMATE_VERSION, true );
        wp_register_style( 'botmate-admin', BOTMATE_PLUGIN_URL . 'assets/css/admin.css', false, BOTMATE_VERSION );

        /**
         * Fires after registering scripts
         *
         * @since 1.0
         */
        do_action( 'botmate_admin_register_scripts' );

    }

}

new Scripts();
