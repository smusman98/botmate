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


} );
