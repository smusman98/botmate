<?php

namespace BotMate\Classes;

class Logger {

    /**
     * Insert Successful Log Entry
     *
     * @param $site_title
     * @param $action
     * @param $trigger
     * @param $response_code
     * @param $response_body
     * @param $status
     * @param $time
     * @param $session_transcript
     * @param $transaction_type
     * @return void
     * @since 1.0
     * @version 1.0
     */
    public function success_log( $site_title, $action, $trigger, $response_code, $response_body, $status, $time, $session_transcript, $transaction_type ) {

        return  $this->log( $site_title, $action, $trigger, $response_code, $response_body, $status, $time, $session_transcript, $transaction_type );

    }


    /**
     * Insert Failed Log Entry
     *
     * @param $site_title
     * @param $action
     * @param $trigger
     * @param $response_code
     * @param $response_body
     * @param $status
     * @param $time
     * @param $session_transcript
     * @return void
     * @since 1.0
     * @version 1.0
     */
    public function failed_log( $site_title, $action, $trigger, $response_code, $response_body, $status, $time, $session_transcript, $transaction_type ) {

       return  $this->log( $site_title, $action, $trigger, $response_code, $response_body, $status, $time, $session_transcript, $transaction_type );

    }


    /**
     * Log Entry
     *
     * @param $site_title
     * @param $action
     * @param $trigger
     * @param $response_code
     * @param $response_body
     * @param $status
     * @param $time
     * @param $session_transcript
     * @param $transaction_type
     * @return void
     * @since 1.0
     * @version 1.0
     */
    public function log( $site_title, $action, $trigger, $response_code, $response_body, $status, $time, $session_transcript, $transaction_type ) {

        return Database::insert_log_entry( $site_title, $action, $trigger, $response_code, $response_body, $status, $time, $session_transcript, $transaction_type );

    }

}