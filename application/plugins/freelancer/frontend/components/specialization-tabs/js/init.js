$(document).ready(function(){
    $('.js-specializations-tabs').flSTabs();
    $('.specializations-master input').change(function(){
        if($(this).prop('checked')){
            $(this).closest('.specializations-checkbox').addClass('checked');
        }else{
            $(this).closest('.specializations-checkbox').removeClass('checked');
        }
    });
});