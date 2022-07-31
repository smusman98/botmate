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

        $this->includes();

    }

    /**
     * Include pages
     *
     * @since 1.0
     * @version 1.0
     */
    public function includes() {

        require_once 'admin-pages/botmate.php';
        require_once 'admin-pages/actions.php';
        require_once 'admin-pages/triggers.php';
        require_once 'admin-pages/logs.php';

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
     * call-back | Actions
     *
     * @since 1.0
     * @version 1.0
     */
    public function actions() {
        ?>
        <h1>Actions</h1>
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
