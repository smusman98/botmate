<?php

namespace BotMate;

class MenuAction {

    /**
     * MenuAction constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        add_action( 'init', array( $this, 'register_actions_post' ) );
        //add_action( 'add_meta_boxes', array( $this, 'register_actions_metabox' ) );
        add_action( 'botmate_admin_register_scripts', array( $this, 'admin_enqueue_scripts' ) );

    }


    /**
     * Admin enqueue scripts | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function admin_enqueue_scripts() {

        if( get_post_type() == Init::ACTION_POST_TYPE ) {

            wp_enqueue_script( 'botmate-admin' );
            wp_enqueue_style( 'botmate-admin' );

        }

    }

    /**
     * Registers Custom Post Type | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_actions_post() {

        $labels = array(
            'name'                  => __( 'Actions', 'botmate' ),
            'singular_name'         => __( 'Action', 'botmate' ),
            'add_new'               => __( 'Add New', 'botmate' ),
            'add_new_item'          => __( 'Add New Action', 'botmate' ),
            'new_item'              => __( 'New Action', 'botmate' ),
            'edit_item'             => __( 'Edit Actions', 'botmate' ),
            'view_item'             => __( 'View Actions', 'botmate' ),
            'all_items'             => __( 'All Actions', 'botmate' ),
            'search_items'          => __( 'Search Actions', 'botmate' ),
            'not_found'             => __( 'No action found.', 'recipe' ),
            'not_found_in_trash'    => __( 'No action found in Trash.', 'recipe' ),
        );

        $args = array(
            'labels'        => $labels,
            'show_in_menu'  => false,
            'public'        => true,
            'supports'      => array( 'title' )
        );

        register_post_type(Init::ACTION_POST_TYPE, $args );

    }


    /**
     * Adds Metabox | Action call-back
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_actions_metabox() {

//        add_meta_box(
//            'sites',
//            __( 'Site Configuration', 'botmate' ),
//            array( $this, 'site_configuration' ),
//            Init::ACTION_POST_TYPE
//        );

    }

    /**
     * Site Configuration
     *
     * @since 1.0
     * @version 1.0
     */
    public function site_configuration() {

        ?>

        <?php

    }

}

new MenuAction();
