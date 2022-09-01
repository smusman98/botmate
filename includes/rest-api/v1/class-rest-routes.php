<?php

namespace BotMate;

/**
 * RestRoutes Class
 *
 *
 * @package BotMate
 * @since 1.0
 * @version 1.0
 */
class RestRoutes {

    private $namespace = 'botmate/v1';

     /**
     * RestRoutes constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        add_action( 'rest_api_init', array( $this, 'register_rest_routes' ) );

    }

    /**
     * Register Rest Routes | Action Callback
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_rest_routes() {


        /**
         * Fires before rest route register
         * 
         * @since 1.0
         * @version 1.0 
         */
        do_action( 'botmate_before_register_rest_route' );


        register_rest_route( $this->namespace, '/connect', array(
            'methods'   =>  \WP_REST_Server::READABLE,
            'callback'  =>  array( $this, 'connect' )
        ) );


         /**
         * Fires after rest route register
         * 
         * @since 1.0
         * @version 1.0 
         */
        do_action( 'botmate_after_register_rest_route' );

    }

    /**
     * Returns the status of connection | Rest Route Callback
     * 
     * @since 1.0
     * @version 1.0
     */
    public function connect( \WP_REST_Request $request ) {

        $headers = $request->get_headers();

        if( !isset( $headers['x_api_key'][0] ) || empty( $headers['x_api_key'][0] ) ) {

            wp_send_json_error( 
                array( 
                    'Message'    =>  'API Key Required.' 
                ),
                401
            );

        }

        $api_key = $headers['x_api_key'][0];

        var_dump( $api_key );
        die;

    }

}

new RestRoutes;