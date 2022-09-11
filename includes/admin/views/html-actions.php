<?php

$actions = botmate_get_actions_classes();
$post_id = get_the_ID();
$sites = botmate_get_sites();

?>
    <div class="botmate">
        <div class="bm-action-config">
            <?php
            /**
             * Fires before Action Configuration form
             *
             * @since 1.0
             */
            do_action( 'botmate_before_action_config_form' );
            ?>
            <input type="hidden" class="bm-security" value="<?php esc_attr_e( wp_create_nonce( 'bm-generate-api-key' ) ) ?>">
            <table cellpadding="10">
                <tr class="bm-action-row">
                    <td>
                        <label for="">Select Action</label>
                        <select class="bm-actions-select" style="width: 100%;" name="bm_action">
                            <option value="">Select Action</option>
                            <?php
                            $saved_actions = get_post_meta( $post_id, 'triggers', true );

                            foreach ( $actions as $action ) {

                                $class = new $action;
                                $selected = ( is_array( $saved_actions ) && in_array( $class->id, $saved_actions ) ) ? 'selected' : '';
                                ?>
                                <option value="<?php echo esc_attr( $class->id ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_html( $class->title ); ?></option>
                                <?php

                            }
                            ?>
                        </select>
                        <div><sup>When Action happen on current site.</sup></div>
                    </td>
                    <td>
                        <label for="">Select Site</label>
                        <select class="bm-actions-site-select" style="width: 100%;" name="bm_actions_site">
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
                        <div><sup>Where Trigger should happen.</sup></div>
                    </td>
                    <td>
                        <label for="">Select Trigger</label>
                        <select class="bm-actions-trigger-select" style="width: 100%;" name="bm_actions_trigger">
                            <option value="">Select Trigger</option>
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
                        <div><sup>What should happen to the selected site.</sup></div>
                    </td>
                </tr>
            </table>
            <?php
            /**
             * Fires after Action Configuration form
             *
             * @since 1.0
             */
            do_action( 'botmate_after_action_config_form' );
            ?>
        </div>
    </div>
<?php
