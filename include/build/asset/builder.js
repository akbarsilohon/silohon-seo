jQuery( document ).ready( function( $ ){
    $('#is_call_builder').click( function(){
        if($(this).hasClass('button-primary builder-active')){
            $(this).removeClass('button-primary builder-active');
            $('#postdivrich, #pageparentdiv, #postimagediv, #edit-slug-box').fadeIn();
            $('#sls_page_builderss').val('');
            $('#slsHomeBuilder').hide();
            $(this).text('Use Builder');
        } else{
            $(this).addClass('button-primary builder-active');
            $('#sls_page_builderss').val('true');
            $('#slsHomeBuilder').fadeIn();
            $('#postdivrich, #pageparentdiv, #postimagediv, #edit-slug-box').hide();
            $(this).text('Remove Builder');
        }

        return false;
    });

    $('#btnhero').click( function(){
        if($('#openhero').is(':hidden')){
            $('#closehero').hide();
            $('#openhero').fadeIn();
            $('.hero_body').slideUp('slow');
        } else{
            $('#closehero').fadeIn();
            $('#openhero').hide();
            $('.hero_body').slideDown('slow');
        }
    });
});
if( jQuery('#sls_page_builderss').val() == 'true' ){
    jQuery('#postdivrich, #pageparentdiv, #postimagediv, #edit-slug-box').hide();
}