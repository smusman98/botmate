<?php

namespace BotMate\Integrations\WordPress\Actions;

use BotMate\Action;

/**
 * User_Register Class
 *
 * @since 1.0
 * @version 1.0
 */
class WP_Insert_User extends Action {

    /**
     * User_Register constructor
     *
     * @param array $args
     * @version 1.0
     * @since 1.0
     */
    public function __construct( $args = array() )
    {
        $args = array(
            'id'            =>  'wp_insert_user',
            'title'         =>  'WordPress Insert User',
            'description'   =>  'Inserts a user into the database.',
            'logo'          =>  BOTMATE_INTEGRATIONS_URL . 'wordpress/assets/logo.png'
        );

        parent::__construct( $args );
    }


    /**
     * Gets the fields for the setup
     *
     * @since 1.0
     * @version 1.0
     */
    public function test_fields() {

        return array(

        );

    }


    /**
     * Registers Trigger
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_action() {

        parent::register_action(); // TODO: Change the autogenerated stub

    }

}
