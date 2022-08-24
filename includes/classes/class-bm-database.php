<?php

namespace BotMate\Classes;

class Database {

    const LOGS_TABLE = 'botmate_logs';
    const SITE_OPTION = 'botmate_sites';

    /**
     * Database constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {


    }

    /**
     * Creates log table
     *
     * @since 1.0
     * @version 1.0
     */
    public function create_logs_table() {


    }

    /**
     * Save sites
     *
     * @param $sites
     * @since 1.0
     * @version 1.0
     */
    public function save_sites( $sites ) {

        /**
         * Filters the option name
         *
         * @param string SITE_OPTION Site Option
         *
         * @since 1.0
         */
        $option_name = apply_filters( 'botmate_sites_option', self::SITE_OPTION );
        update_option( $option_name, $sites );

    }

    /**
     * Get Sites
     *
     * @since 1.0
     * @version 1.0
     */
    public function get_sites() {

        /**
         * Filters the option name
         *
         * @param string SITE_OPTION Site Option
         *
         * @since 1.0
         */
        $option_name = apply_filters( 'botmate_sites_option', self::SITE_OPTION );

        return get_option( $option_name );

    }

    /**
     * Runs on Plugin activation :)
     *
     * @since 1.0
     * @version 1.0
     */
    public function activate_plugin() {


    }

    /**
     * Runs on Plugin deactivate :(
     *
     * @since 1.0
     * @version 1.0
     */
    public function deactivate_plugin() {


    }


    /**
     * Runs on Plugin uninstall :(
     *
     * @since 1.0
     * @version 1.0
     */
    public function uninstall_plugin() {


    }

}
