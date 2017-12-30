jQuery(function($) { 
    $('.fl-notify-modal').lsModal({
        aftershow:function(e){
            var offset = $('.js-fl-notify-bell-toggle').offset()
            $(e.target).offset({
                top:offset.top+60, left: offset.left-350
            });  
            //$('.js-ls-modal-overlay').css('overflow','hidden');
        }
    });
    
    $('.fl-notify-modal').flNotify();
    $('.js-fl-notify-bell-toggle').lsModalToggle();
});