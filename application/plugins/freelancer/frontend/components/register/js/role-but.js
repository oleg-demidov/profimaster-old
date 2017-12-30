$(document).ready(function(){
    var butActive = $('.role-buttons button.ls-button--primary')
    butActive.after('<input type="hidden" name="role" value="'+butActive.val()+'">')
    $('.role-buttons button').click(function(){
        $('.role-buttons button').removeClass('ls-button--primary');
        $(this).addClass('ls-button--primary');
        $('input[name="role"]').remove();
        $(this).after('<input type="hidden" name="role" value="'+$(this).val()+'">')
    });
});