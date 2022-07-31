<?php

namespace BotMate;

/**
 * Class Trigger
 * @package BotMate
 * @since 1.0
 * @version 1.0
 */
abstract class Trigger {

    /**
     * Unique ID
     *
     *
     * @var bool
     * @since 1.0
     * @version 1.0
     */
    public $id = false;


    /**
     * Title of Trigger
     *
     *
     * @var bool
     * @since 1.0
     * @version 1.0
     */
    public $title = false;


    /**
     * Trigger constructor.
     *
     *
     * @param array $args
     * @since 1.0
     * @version 1.0
     */
    public function __construct( $args = array() ) {

        $this->id = $args['id'];
        $this->title = $args['title'];

    }

    /**
     * Registers Trigger
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_trigger() {



    }



}
