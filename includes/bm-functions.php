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

    $classes = apply_filters( 'botmate_register_trigger', array() );

    return $classes;

}
endif;
