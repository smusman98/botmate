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
     * Logo url of the Integration
     * 
     * @var string
     * @since 1.0
     * @version 1.0
     */
    public $logo = false;

    /**
     * Description of the Integration
     *
     * @var string
     * @since 1.0
     * @version 1.0
     */
    public $description = false;


    /**
     * Trigger constructor.
     *
     *
     * @param array $args
     * @since 1.0
     * @version 1.0
     */
    public function __construct( $args = array() ) {

        if( !empty( $args ) ) {

            foreach ( $args as $key => $value ) {

                $this->$key =  $value;

            }

        }

    }

    /**
     * Registers Trigger
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_trigger() {



    }

    /**
     * Trigger returning fields
     *
     * @return array Key (returning variable), Value (Definition of Variable aka PHPDoc)
     * @since 1.0
     * @version 1.0
     */
    public function fields() {

        return array();

    }

}
