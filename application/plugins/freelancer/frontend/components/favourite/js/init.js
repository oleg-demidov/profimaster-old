
jQuery(document).ready(function ($) {


    $('.fl-favourite').lsFavourite({
        urls:{
            toggle: aRouter.freelancer+"ajax/favourite/toggle"
        }
    });
    
});