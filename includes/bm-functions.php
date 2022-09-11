<?php

/**
 * Get list of registered triggers
 *
 * @return mixed|void
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_get_triggers_classes' ) ):
    function botmate_get_triggers_classes() {

    /**
     * Filters the triggers | Register triggers
     *
     * @param array array() Trigger(s)
     *
     * @since 1.0
     */
    $classes = apply_filters( 'botmate_register_trigger', array() );

    return $classes;

}
endif;

/**
 * Get list of registered actions
 *
 * @return mixed|void
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_get_actions_classes' ) ):
    function botmate_get_actions_classes() {

        /**
         * Filters the actions | Register actions
         *
         * @param array array() Actions(s)
         *
         * @since 1.0
         */
        $classes = apply_filters( 'botmate_register_action', array() );

        return $classes;

    }
endif;

/**
 * Adds Site
 * 
 * @param array $site Site
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_save_sites' ) ):
function botmate_save_sites( $sites ) {
    
    $database = new \BotMate\Classes\Database();

    $database->save_sites( $sites );
    
}
endif;

/**
 * Get Sites
 *
 * @param array $site Site
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_get_sites' ) ):
    function botmate_get_sites() {

        $database = new \BotMate\Classes\Database();

        return $database->get_sites();

    }
endif;

/**
 * Sanitizes Array | Associative  Array | Multi-dimensional Array
 *
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_sanitize_array' ) ):
function botmate_sanitize_array( $_array ) {

    foreach( $_array as $key => $value )  {

        $key = sanitize_text_field( $key );

        if( is_array( $value ) ) {
            $value = mycred_sanitize_array( $value );
        }
        else {
            $_array[$key] = sanitize_text_field( $value );
        }

    }

    return $_array;

}
endif;

/**
 * Checks does API key exist
 * 
 * @param string $api_key API key
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_api_key_exists' ) ):
function botmate_api_key_exists( $api_key ) {

    return  \BotMate\Classes\Database::api_key_exists( $api_key );

}
endif;

/**
 * Gets saved Triggers
 *
 * @param $trigger_id
 * @return mixed
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_get_saved_triggers' ) ):
    function botmate_get_saved_triggers( $trigger_id ) {

        return  \BotMate\Classes\Database::get_meta( $trigger_id, 'triggers' );

    }
endif;

/**
 * Gets API Key by Trigger ID
 *
 * @param $trigger_id
 * @return mixed
 * @since 1.0
 * @version 1.0
 */
if( !function_exists( 'botmate_get_api_key' ) ):
function botmate_get_api_key( $trigger_id ) {

    return  \BotMate\Classes\Database::get_meta( $trigger_id, 'api_key' );

}
endif;
