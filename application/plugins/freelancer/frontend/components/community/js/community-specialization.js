jQuery(function ($) {
    $('.js-community-specialization').flDropdownSelect({
        afterselect:function(t,el, _ds){
            document.location.href = aRouter['community'] + '?branch=' + el.data('value');
        }
    });
});
