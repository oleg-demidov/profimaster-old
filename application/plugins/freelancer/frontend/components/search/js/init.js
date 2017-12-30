jQuery(function ($) {
    $('.fl-search-sort-buttons').flSortButtons();
    $('.fl-search-form-but-submit').click(function(){$('.fl-search-form').submit();});
    
    $('.ls-block.fl-search-form').flSearchForm();
});