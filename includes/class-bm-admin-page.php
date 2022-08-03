<?php

namespace BotMate;

/**
 * Admin menu pages call-backs
 *
 *
 * @package BotMate
 * @since 1.0
 * @version 1.0
 */
class AdminPage {

    /**
     * AdminPage constructor.
     *
     * @since 1.0
     * @version 1.0
     */
    public function __construct() {

        $this->hooks();

    }


    /**
     * Hooks & Filters
     */
    public function hooks() {

        //Actions Page Hook
        add_action( 'init', array( $this, 'register_actions_post' ) );

    }


    /**
     * Registers Custom Post Type | Action call-back
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

        register_post_type('botmate_actions',
            array(
                'labels'        => $labels,
                'show_in_menu'  => false,
                'public'        => true,
                'supports'      => array( 'title' )
            )
        );

    }


    /**
     * call-back | Botmate
     *
     * @since 1.0
     * @version 1.0
     */
    public function botmate() {
        //Todo: docs, videos, add-ons, AutomatorWP
        ?>
        <h1>Botmate</h1>
        <?php

    }


    /**
     * call-back | Triggers
     *
     * @since 1.0
     * @version 1.0
     */
    public function triggers() {
        ?>
        <h1>Triggers</h1>
        <?php

    }

    /**
     * call-back | Logs
     *
     * @since 1.0
     * @version 1.0
     */
    public function logs() {
        ?>
        <h1>Logs</h1>
        <?php

    }

}

new AdminPage();
