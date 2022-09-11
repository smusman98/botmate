<?php

$triggers = botmate_get_triggers_classes();
$trigger_id = get_the_ID();

?>
    <div class="botmate">
        <div class="bm-trigger-config">
            <?php
            /**
             * Fires before Trigger Configuration form
             *
             * @since 1.0
             */
            do_action( 'botmate_before_trigger_config_form' );
            ?>
            <input type="hidden" class="bm-security" value="<?php esc_attr_e( wp_create_nonce( 'bm-generate-api-key' ) ) ?>">
            <table cellpadding="10">
                <tr>
                    <td>API Key:</td>
                    <td><input type="text" class="bm-api-key" value="<?php echo esc_attr( botmate_get_api_key( $trigger_id ) ); ?>" name="bm_api_key" /><button class="button button-primary bm-generate-api-key">Generate Key <div class="bm-loader"></div></button></td>
                </tr>
                <tr>
                    <td>Allowed Triggers: </td>
                    <td>
                        <select class="bm-triggers-select" style="width: 40%;" multiple="multiple" name="bm_triggers[]">
                            <?php
                            $saved_triggers = botmate_get_saved_triggers( $trigger_id );

                            foreach ( $triggers as $trigger ) {

                                $class = new $trigger;
                                $selected = ( is_array( $saved_triggers ) && in_array( $class->id, $saved_triggers ) ) ? 'selected' : '';
                                ?>
                                <option value="<?php echo esc_attr( $class->id ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_html( $class->title ); ?></option>
                                <?php

                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Site URL:</td>
                    <td><?php echo esc_attr( get_site_url() ) . '/'; ?></td>
                </tr>
            </table>
            <?php
            /**
             * Fires after Trigger Configuration form
             *
             * @since 1.0
             */
            do_action( 'botmate_after_trigger_config_form' );
            ?>
        </div>
    </div>
<?php
