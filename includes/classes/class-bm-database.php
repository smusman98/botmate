<?php

namespace BotMate\Classes;

class Database {

    const LOGS_TABLE = 'botmate_logs';
    const SITE_OPTION = 'botmate_sites';

    private $site_option = '';

    /**
     * Database constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        /**
         * Filters the option name
         *
         * @param string SITE_OPTION Site Option
         *
         * @since 1.0
         */
        $this->site_option = apply_filters( 'botmate_sites_option', self::SITE_OPTION );

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
     * @param array $sites Sites
     * @since 1.0
     * @version 1.0
     */
    public function save_sites( $sites ) {

        update_option( $this->site_option, $sites );

    }

    /**
     * Get Sites
     *
     * @since 1.0
     * @version 1.0
     */
    public function get_sites() {

        return get_option( $this->site_option );

    }

    /**
     * Checks does API key exist
     * 
     * @param string $api_key API key
     * @since 1.0
     * @version 1.0
     */
    public static function api_key_exists( $api_key ) {

        global $wpdb;

        $result = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->postmeta} WHERE meta_value = %s",
                $api_key
            )
        );
        
        if( !empty( $result ) ) {
            return true;
        }

        return false;

    }

    /**
     * Gets Postmeta by Key
     *
     * @param $trigger_id
     * @param $key
     * @return mixed
     * @since 1.0
     * @version 1.0
     */
    public static function get_meta( $trigger_id, $key ) {

        return get_post_meta( $trigger_id, $key, true );

    }

    /**
     * Get actions by API Key
     * 
     * @param $api_key
     * @since 1.0
     * @version 1.0
     */
    public static function get_actions_by_api_key( $api_key ) {

        global $wpdb;
        $result = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value = %s",
                $api_key
            )
        );

        $all_actions = botmate_get_actions_classes();
        $stored_actions = self::get_meta( $result->post_id,  'actions' );
        $organized_actions = array();

        foreach ( $all_actions as $action ) {

            $class = new $action;
            
            if( in_array( $class->id, $stored_actions ) ) {

                $organized_actions[$class->id] = $class;

            }

        }

        return $organized_actions;

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
