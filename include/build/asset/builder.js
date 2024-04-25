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


// Create item data
var defCat = jQuery('#cats_default').html();
jQuery('.add_data').click( function(){
    var style = jQuery(this).data('style');

    jQuery('#item_list').append('\
        <li id="data_item_'+ nextCell +'" class="data_item">\
            <div class="data_head">\
                <span class="heading">Style: '+style+'</span>\
                <div id="btnDatas">\
                    <i id="openDATAs" class="bx bx-plus-circle"></i>\
                    <i id="closeDATAs" class="bx bx-minus-circle"></i>\
                </div>\
            </div>\
            <div class="body_item">\
                <label for="">Category:</label>\
                <select name="sls_builder_data['+ nextCell +'][cat]" id="">\
                    '+defCat+'\
                </select>\
            </div>\
            <div class="body_item">\
                <label for="">Post Count:</label>\
                <input type="number" name="sls_builder_data['+ nextCell +'][count]" value="5">\
            </div>\
            <div class="body_item">\
                <label for="">Random Post:</label>\
                <input type="checkbox" name="sls_builder_data['+ nextCell +'][rand]" value="rand">\
            </div>\
            <input type="hidden" name="sls_builder_data['+ nextCell +'][style]" value="'+style+'">\
            <i id="removed_list" class="bx bx-trash"></i>\
        </li>\
    ');

    nextCell++;
});


// Delete list
jQuery(document).on('click', '#removed_list', function(){
    jQuery(this).parent().addClass('removered').fadeOut( function(){
        jQuery(this).remove();
    });
});