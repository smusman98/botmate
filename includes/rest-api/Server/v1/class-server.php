<?php

namespace BotMate\Server\v1;

/**
 * Server Class
 *
 *
 * @package BotMate\Server\v1
 * @since 1.0
 * @version 1.0
 */
class Server {


    /**
     * Namespace of routes
     * 
     * @since 1.0
     * @version 1.0
     */
    private $namespace = 'botmate/v1';

    /**
     * Base URL
     * 
     * @since 1.0
     * @version 1.0
     */
    private $base_url = '';

    /**
     * API Key
     * 
     * @since 1.0
     * @version 1.0
     */
    private $api_key = '';

    /**
     * Server constructor.
     *
     * @param string $base_url Base URL
     * @param string $endpoint EndPoint
     * @since 1.0
     * @version 1.0
     */
    public function __constructor( $base_url, $api_key ) {

        $this->base_url = $base_url;
        $this->api_key = $api_key;
        
    }

    /**
     * Request Header
     *
     * @param string $api_key API Key
     * @param array $additional_header Additional Header 
     * @since 1.0
     * @version 1.0
     */
    private function header( $api_key = '', $additional_header = array() ) {

        $api_key = empty( $api_key ) ? $this->api_key : $api_key;

        $header = array(
            'X-Api-Key' =>  $api_key
        );

        $header = array_merge( $header, $additional_header );

        /**
         * Filters the header of Remote Request 
         * 
         * @param array $header Header
         * 
         * @since 1.0
         */
        $header = apply_filters( 'botmate_server_request_header', $header );

        return $header;

    }

    /**
     * Request Body
     *
     * @param array $body Body args
     * @since 1.0
     * @version 1.0
     */
    private function body( $body = array() ) {

        /**
         * Filters the body of Remote Request 
         * 
         * @param array $header Header
         * 
         * @since 1.0
         */
        $body = apply_filters( 'botmate_server_request_body', $body );

        return $body;

    }


    /**
     * Request
     *
     * @param string $method Request Method 
     * @param string $endpoint End Point
     * @since 1.0
     * @version 1.0
     */
    public function request( $method, $endpoint ) {

        $url = $this->base_url . $endpoint;
        $args = array(
            'method'    =>  $method,
            $header     =>  $this->header(),
            $body       =>  $this->body
        );

        /**
         * Filters args of Remote Request
         * 
         * @param array $args Arguments
         * 
         * @since 1.0
         */
        $args = apply_filters( 'botmate_server_request_args', $args );

        wp_remote_post(
            $url,
            $args
        );

    }

}

new Server;