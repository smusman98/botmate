jQuery( document ).ready( function() {

    //Add Site
    jQuery( document ).on( 'click', '.bm-add-site', function( e ) {

        e.preventDefault();
        var cloned = jQuery( '.bm-site-configuration' ).clone();
        var clonedLength = cloned.length;
        var lastDataID = jQuery( cloned[clonedLength - 1] );
        var lastDataID = jQuery( lastDataID ).data( 'id' );
        cloned = cloned[clonedLength - 1];

        jQuery( cloned ).attr( 'data-id', lastDataID + 1 );
        jQuery( cloned ).find( 'input' ).val('');
        jQuery( '.bm-site-configuration' ).last().after( cloned );

    } );

    //Save Sites
    jQuery( document ).on( 'click', '.bm-save-sites', function( e ) {

        e.preventDefault();
        var security = jQuery( '.bm-security' ).val();
        var totalSites = jQuery( '.bm-site-configuration' ).length;
        var _title = jQuery( '.bm-title' );
        var _url = jQuery( '.bm-url' );
        var _apiKey = jQuery( '.bm-api-key' );
        var sites = [];

        for( var i = 0; i < totalSites; i++ ) {

            var _sites = {};
            _sites['title'] = jQuery( _title[i] ).val();
            _sites['url'] = jQuery( _url[i] ).val();
            _sites['api_key'] = jQuery( _apiKey[i] ).val();
            sites[i] = _sites;

        }

        jQuery.ajax( {
            url: ajaxurl,
            method: 'POST',
            data: {
                action: 'bm-save-sites',
                _nonce: security,
                sites: JSON.stringify( sites )
            },
            beforeSend: function() {
                jQuery( '.bm-save-sites .bm-loader' ).css( { 'display': 'inline-block' } );
            },
            success: function( response ) {
                alert( 'Sites Saved.' );
            },
            complete: function() {
                jQuery( '.bm-save-sites .bm-loader' ).css( { 'display': 'none' } );
            },
        } );

    } );

    //Remove Site
    jQuery( document ).on( 'click', '.bm-remove-site', function ( e ) {

        e.preventDefault();
        var counts = jQuery( '.bm-site-configuration' );

        //If not last element
        if( counts.length > 1 ) {

            jQuery( this ).parent( '.bm-site-configuration' ).remove();

        }

    } );

    jQuery( document ).on( 'click', '.bm-connect-site', function ( e ) {



    } );

} )
