$(document).ready(function ($) {
    $('.js-add-bid-form').lsBidForm({
        urls: {
            add:  aRouter['order'] + 'ajaxaddbid/',
            update:  aRouter['order'] + 'ajaxeditbid/',
            text: aRouter['order'] + 'ajaxtextbid/'
        }
    });
    
    $('.fl-bid-item').flBidEdit({
        urls: {
            remove:  aRouter['order'] + 'ajaxbidremove',
            get_form:  aRouter['order'] + 'ajaxbidform'
        }
    });
});