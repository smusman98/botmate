<?php

namespace BotMate;

abstract class Action {

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
     * Gets the fields for the setup
     *
     * @since 1.0
     * @version 1.0
     */
    public function test_fields() {



    }

    /**
     * Registers Trigger
     *
     * @since 1.0
     * @version 1.0
     */
    public function register_action() {



    }

    /**
     * Action accepting fields
     *
     * Key (receiver variable), Value (associative array())
     * @example array( 
     *      'user_name'  => array( 
     *          'label'     =>  'User Name',
     *          'required'  =>  'required' 
     *      ) 
     * )
     * @return array 
     * @since 1.0
     * @version 1.0
     */
    public function fields() {

        return array();

    }

}
