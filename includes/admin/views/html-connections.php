<div class="wrap">
    <div class="botmate">
        <h1>Sites Connections</h1>
        <?php
        /**
         * Fires before sites configuration
         *
         * @since 1.0
         */
        do_action( 'botmate_before_sites_connection' )
        ?>
        <div class="bm-site-configuration">
            <label>Title <input type="text" /></label>
            <label>Site URL <input type="text" /></label>
            <label>API Key <input type="text" /></label>
            <button class="button button-primary bm-connect-site">Connect</button>
            <button class="button button-primary bm-save">Save</button>
            <button class="button button-secondary bm-remove-site">Remove Site</button>
            <div>
                <p>
                    <b>Status: </b>
                    <span class="bm-site-status"></span>
                </p>
            </div>
        </div>
        <button class="button button-primary bm-add-site">Add Site</button>
    </div>
    <?php
    /**
     * Fires after sites configuration
     *
     * @since 1.0
     */
    do_action( 'botmate_after_sites_connection' )
    ?>
</div>
