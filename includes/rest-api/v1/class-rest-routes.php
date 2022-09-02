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
         */
        do_action( 'botmate_before_register_rest_route' );


        register_rest_route( $this->namespace, '/test-connection', array(
            'methods'   =>  \WP_REST_Server::READABLE,
            'callback'  =>  array( $this, 'test_connection' )
        ) );


         /**
         * Fires after rest route register
         * 
         * @since 1.0
         */
        do_action( 'botmate_after_register_rest_route' );

    }

    /**
     * Returns the status of connection | Rest Route Callback
     * 
     * @since 1.0
     * @version 1.0
     */
    public function test_connection( \WP_REST_Request $request ) {

        $headers = $request->get_headers();

        if( !isset( $headers['x_api_key'][0] ) || empty( $headers['x_api_key'][0] ) ) {

            wp_send_json_error( 
                array( 
                    'code'      =>  'api_key_required',
                    'message'   =>  'API key required.',
                    'status'    =>  401    
                ),
                401
            );

        }

        $api_key = sanitize_text_field( $headers['x_api_key'][0] );

        $api_key_exists = botmate_api_key_exists( $api_key );

        if( $api_key_exists ) {

            wp_send_json_success( 
                array(
                    'code'      =>  'connected',
                    'message'   =>  'Successfully connected.',
                    'status'    =>  200    
                ),
                200
            );

        }

        wp_send_json_error( 
            array( 
                'code'      =>  'api_key_not_exists',
                'message'   =>  'API key does not exist.',
                'status'    =>  404    
            ),
            404
        );

    }

}

new RestRoutes;