jQuery( document ).ready( function () {

    //Add Site
    jQuery( document ).on( 'click', '.bm-add-site', function( e ) {

        e.preventDefault();
        var cloned = jQuery( '.bm-site-configuration' ).clone();
        cloned = cloned[0];
        jQuery( cloned ).find( 'input' ).val('');
        jQuery( '.bm-site-configuration' ).last().after( cloned );

    } );

    //Remove Site
    jQuery( document ).on( 'click', '.bm-remove-site', function ( e ) {

        e.preventDefault();
        counts = jQuery( '.bm-site-configuration' );

        //If not last element
        if( counts.length > 1 ) {

            jQuery( this ).parent( '.bm-site-configuration' ).remove();

        }

    } );

    jQuery( document ).on( 'click', '.bm-connect-site', function ( e ) {

        e.preventDefault();

    } );

    //Triggers 
    jQuery('.bm-triggers-select').select2({
        placeholder: "Select Triggers"
    });

    //Generate API Key
    jQuery( document ).on( 'click', '.bm-generate-api-key', function( e ) {
        
        e.preventDefault();
        security = jQuery( '.bm-security' ).val();
        jQuery.ajax( {
            url: ajaxurl,
            method: 'POST',
            data: {
                action: 'bm-generate-api-key',
                _nonce: security
            },
            beforeSend: function() {
                jQuery( '.bm-generate-api-key .bm-loader' ).css( { 'display': 'inline-block' } );
            },
            success: function( response ) {
                jQuery( '.bm-api-key' ).val( response.data );
            },
            complete: function() {
                jQuery( '.bm-generate-api-key .bm-loader' ).css( { 'display': 'none' } );
            },
        } );

    } );


} );
