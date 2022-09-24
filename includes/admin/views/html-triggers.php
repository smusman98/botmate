<?php

$triggers = botmate_get_triggers_classes();
$trigger_id = get_the_ID();
$sites = botmate_get_sites();

?>
    <div class="botmate">
        <div class="bm-trigger-config">
            <?php
            /**
             * Fires before trigger Configuration form
             *
             * @since 1.0
             */
            do_action( 'botmate_before_trigger_config_form' );
            ?>
            <input type="hidden" class="bm-security" value="<?php esc_attr_e( wp_create_nonce( 'bm-generate-api-key' ) ) ?>">
            <table cellpadding="10">
                <tr class="bm-trigger-row">
                    <td>
                        <label for="">Select Trigger</label>
                        <select class="bm-triggers-select" style="width: 100%;" name="bm_trigger">
                            <option value="">Select Trigger</option>
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
                        <div><sup>When trigger happen on current site.</sup></div>
                    </td>
                    <td>
                        <label for="">Select Site</label>
                        <select class="bm-triggers-site-select" style="width: 100%;" name="bm_triggers_site">
                            <option value="">Select Site</option>
                            <?php
                            if( $sites ) {
                                foreach ( $sites as $site ) {
                                    ?>
                                    <option value="<?php echo esc_attr( $site['api_key'] ) ?>" data-site="<?php echo esc_url( $site['url'] ) ?>"><?php echo esc_html( $site['title'] ) ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <div><sup>Where Action should happen.</sup></div>
                    </td>
                    <td>
                        <label for="">Select Action</label>
                        <select class="bm-triggers-action-select" style="width: 100%;" name="bm_triggers_action"></select>
                        <div><sup>What should happen to the selected site.</sup></div>
                    </td>
                </tr>
            </table>
            <?php
            /**
             * Fires after trigger Configuration form
             *
             * @since 1.0
             */
            do_action( 'botmate_after_trigger_config_form' );
            ?>
        </div>
    </div>
<?php
