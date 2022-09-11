<?php

namespace BotMate;

class MenuTrigger {

    /**
     * MenuAction constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        add_action( 'init', array( $this, 'register_trigger_post' ) );
        add_action( 'add_meta_boxes', array( $this, 'register_trigger_config_metabox' ) );
        add_action( 'botmate_admin_register_scripts', array( $this, 'admin_enqueue_scripts' ) );
        add_action( 'wp_ajax_bm-generate-api-key', array( $this, 'generate_api_key' ) );
        add_action( 'save_post_' . Init::TRIGGER_POST_TYPE, array( $this, 'save_trigger' ) );

    }


    /**
     * Admin enqueue scripts | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function admin_enqueue_scripts() {

        if( get_post_type() == Init::TRIGGER_POST_TYPE ) {

            wp_enqueue_style( 'botmate-select2' );
            wp_enqueue_style( 'botmate-admin' );
            wp_enqueue_script( 'botmate-select2' );
            wp_enqueue_script( 'botmate-admin' );

        }

    }

    /**
     * Registers Custom Post Type | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_trigger_post() {

        $labels = array(
            'name'                  => __( 'Triggers', 'botmate' ),
            'singular_name'         => __( 'Trigger', 'botmate' ),
            'add_new'               => __( 'Add New', 'botmate' ),
            'add_new_item'          => __( 'Add New Trigger', 'botmate' ),
            'new_item'              => __( 'New Trigger', 'botmate' ),
            'edit_item'             => __( 'Edit Triggers', 'botmate' ),
            'view_item'             => __( 'View Triggers', 'botmate' ),
            'all_items'             => __( 'All Triggers', 'botmate' ),
            'search_items'          => __( 'Search Triggers', 'botmate' ),
            'not_found'             => __( 'No trigger found.', 'recipe' ),
            'not_found_in_trash'    => __( 'No trigger found in Trash.', 'recipe' ),
        );

        $args = array(
            'labels'        => $labels,
            'show_in_menu'  => false,
            'public'        => true,
            'supports'      => array( 'title' )
        );

        register_post_type( Init::TRIGGER_POST_TYPE, $args );

    }


    /**
     * Adds Metabox | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_trigger_config_metabox() {

       add_meta_box(
           'trigger_config',
           __( 'Trigger Configuration', 'botmate' ),
           array( $this, 'trigger_configuration' ),
           Init::TRIGGER_POST_TYPE
       );

    }


    /**
     * Renders Trigger configuration HTML
     *
     * @since 1.0
     * @version 1.0
     */
    public function trigger_configuration() {

        require 'views/html-triggers.php';

    }


    /**
     * Generates API Key | AJAX 
     * 
     * @since 1.0
     * @version 1.0
     */
    public function generate_api_key() {

        if( !current_user_can( Init::CAPABILITY ) ) {
            wp_send_json_error( 
                array(
                    'code'      =>  'not_authorized',
                    'message'   =>  'User can not generate.',
                    'status'    =>  403
                ),
                403
            );
        }
        
        wp_verify_nonce( $_POST['_nonce'], 'bm-security' );
        
        $api_key = wp_generate_password( 20, true, false );

        /**
         * Fires before returning API Key
         * 
         * @param string $api_key API Key 
         * 
         * @since 1.0
         */
        $api_key = apply_filters( 'botmate_trigger_config_api_key', $api_key );

        wp_send_json_success(
            $api_key,
            200
        );

    }
    
    /**
     * Saves the Triggers | Action Callback
     * 
     * @since 1.0
     * @version 1.0
     */
    public function save_trigger( $post_id ) {

        $api_key = !empty( $_POST['bm_api_key'] ) ? sanitize_text_field( sanitize_text_field( $_POST['bm_api_key'] ) ) : '';
        $triggers = !empty( $_POST['bm_triggers'] ) ? botmate_sanitize_array( $_POST['bm_triggers'] ) : array();

        update_post_meta( $post_id, 'api_key', $api_key );
        update_post_meta( $post_id, 'triggers', $triggers );

    }

}

new MenuTrigger();
