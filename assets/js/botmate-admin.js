jQuery( document ).ready( function () {

    //html-actions
    //Action
    jQuery('.bm-actions-select').select2({
        placeholder: "Select Actions"
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

    //html-triggers
    //Actions
    jQuery('.bm-triggers-select').select2({
        placeholder: "Select Trigger"
    });

    //Select Site
    jQuery('.bm-triggers-site-select').select2({
        placeholder: "Select Site"
    });

    jQuery( document ).on( 'change', '.bm-triggers-site-select', function () {
        console.log( 'Changed' );
    } )

    //Select Action
    jQuery('.bm-triggers-action-select').select2({
        placeholder: "Select Site"
    });

} );
