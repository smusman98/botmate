jQuery( document ).ready( function () {

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
