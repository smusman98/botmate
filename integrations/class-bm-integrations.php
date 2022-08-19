<?php

namespace BotMate\Integrations;

class Integrations {

    /**
     * Integrations constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        $this->includes();
        $this->define();
        $this->hooks();

    }


    /**
     * Include files
     *
     * @since 1.0
     * @version 1.0
     */
    public function includes() {

        //WordPress Core integration
        require_once 'wordpress/wordpress.php';

    }

    /**
     * Define constants
     *
     * @since 1.0
     * @version 1.0
     */
    public function define() {

        define( 'BOTMATE_INTEGRATIONS_URL', BOTMATE_PLUGIN_URL . 'integrations/' );

    }

    /**
     * Action, Filters
     *
     * @since 1.0
     * @version 1.0
     */
    public function hooks() {

        add_filter( 'botmate_register_trigger', array( $this, 'botmate_register_triggers' ) );

    }

    /**
     * Register builtin triggers | Filter call-back
     *
     * @param $triggers
     * @return string[]
     * @since 1.0
     * @version 1.0
     */
    public function botmate_register_triggers( $triggers ) {

        $new_triggers = array(
            'BotMate\Integrations\WordPress\WP_Insert_User'
        );

        $triggers = array_merge( $new_triggers, $triggers );

        return $triggers;

    }

}

new Integrations();
