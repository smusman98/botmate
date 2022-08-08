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
     * Trigger Configuration
     *
     * @since 1.0
     * @version 1.0
     */
    public function trigger_configuration() {
        ?>
        <div class="botmate">
            <div class="bm-trigger-config">
                <div class="bm-mr-tb-15">
                    <label>API Key: <input type="text" /></label>
                    <button class="button button-primary bm-generate-api-key">Generate Key</button>
                </div>
                <div class="bm-mr-tb-15">
                    <label>
                        Allowed Triggers: 
                        <select class="bm-triggers-select" multiple="multiple">
                            <option>One</option>
                            <option>One</option>
                            <option>One</option>
                            <option>One</option>
                            <option>One</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>
        <?php
    }

}

new MenuTrigger();
