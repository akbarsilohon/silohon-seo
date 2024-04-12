// Change Logo ------------------------
// ------------------------------------
jQuery( document ).ready( function( $ ){

    // Logo -----------------
    var slsLogo;
    $('#slsChangeLogo').on( 'click', function( e ){
        e.preventDefault();

        if( slsLogo ){
            slsLogo.open();
            return;
        }

        slsLogo = wp.media.file_frame = wp.media({
            title: 'Choose a Logo',
            button: {
                text: 'Choose'
            },
            multiple: false
        });

        slsLogo.on( 'select',  function(){
            attachment = slsLogo.state().get('selection').first().toJSON();
            $( '#slsLogo' ).val( attachment.url );
        });

        slsLogo.open();
    });

    // Img Organization
    var ogImg;
    $( '#ogImgChange' ).on( 'click', function( e ){
        e.preventDefault();

        if( ogImg ){
            ogImg.open();
            return;
        }

        ogImg = wp.media.file_frame = wp.media({
            title: 'Choose a Organization Image',
            button: {
                text: 'Choose'
            },
            multiple: false
        });

        ogImg.on( 'select',  function(){
            attachment = ogImg.state().get('selection').first().toJSON();
            $( '#ogImg' ).val( attachment.url );
        });

        ogImg.open();
    });

    // Logo Organization
    var ogLogo;
    $( '#ogLogoChange' ).on( 'click', function( e ){
        e.preventDefault();

        if( ogLogo ){
            ogLogo.open();
            return;
        }

        ogLogo = wp.media.file_frame = wp.media({
            title: 'Choose a Organization Image',
            button: {
                text: 'Choose'
            },
            multiple: false
        });

        ogLogo.on( 'select',  function(){
            attachment = ogLogo.state().get('selection').first().toJSON();
            $( '#ogLogo' ).val( attachment.url );
        });

        ogLogo.open();
    });

});