jQuery(function($) {
    $('.order_buttons button').click(function(){
        $('form').append('<input value="'+$(this).val()+'" type="hidden" name="order">').submit();      
    });
});