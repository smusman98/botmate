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

    //Get actions from API
    jQuery( document ).on( 'change', '.bm-triggers-site-select', function () {

        var selectedSite = jQuery( this ).find( ':selected' );
        var apiKey = jQuery( selectedSite ).val();
        var baseURL = jQuery( selectedSite ).data( 'site' );
        var security = jQuery( '.bm-security' ).val();

        jQuery.ajax( {
            url: ajaxurl,
            method: 'POST',
            data: {
                action: 'bm-get-actions',
                api_key: apiKey,
                base_url: baseURL,
                _nonce: security
            },
            beforeSend: function() {

                jQuery( '.bm-triggers-action-select' ).html( '<option>Fetching Actions...</option>' );

            },
            success: function( response ) {

                jQuery( '.bm-triggers-action-select' ).html( `<option>Select Action</option>` );
                jQuery.each( response.data, function ( index, value ){
                    jQuery( '.bm-triggers-action-select' ).append( `<option value="${value['id']}" data-api="${apiKey}" data-site="${baseURL}">${value['title']}</option>` );
                } )

            },
            error: function( response ) {

                jQuery( '.bm-triggers-action-select' ).html( 'Check Console by pressing F12' );
                console.log( response );

            },
        } );

    } );

    //Get action fields from API
    jQuery( document ).on( 'change', '.bm-triggers-action-select', function() {

        var selectedTrigger = jQuery( this ).find( ':selected' );
        var apiKey = jQuery( selectedTrigger ).data( 'api' );
        var baseURL = jQuery( selectedTrigger ).data( 'site' );
        var bmAction = jQuery( selectedTrigger ).val();
        var security = jQuery( '.bm-security' ).val();

        jQuery.ajax( {
            url: ajaxurl,
            method: 'POST',
            data: {
                action: 'bm-get-action-fields',
                api_key: apiKey,
                base_url: baseURL,
                bm_action: bmAction,
                _nonce: security
            }
        } );

    } );

    //Select Action
    jQuery('.bm-triggers-action-select').select2({
        placeholder: "Select Site to get Actions"
    });

} );
