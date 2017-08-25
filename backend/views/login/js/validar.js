function prepareList() {
    jQuery('#expList').find('li:has(ul)') 
    .addClass('el_collapsed')
    .children('ul').hide();
    jQuery('#expList').find('.expandIcon')
    .click( function(evt) {
        if (this == evt.target) {
            jQuery(this).toggleClass('el_expanded');
            jQuery(this).children('ul').toggle('medium');
        }
        // Impedir la propagación de eventos
        if (!evt) var evt = window.event;
        evt.cancelBubble = true; // in IE
        if (evt.stopPropagation) evt.stopPropagation(); 
    });
};

jQuery(document).ready( function() {
    prepareList()
});