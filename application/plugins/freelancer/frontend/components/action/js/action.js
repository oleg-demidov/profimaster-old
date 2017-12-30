$(document).ready(function(){
    $('.js-action-datepicker').lsDate({ language: LANGUAGE });
    $('.js-action-delete-confirm').lsConfirm({
            message: "Вы уверены?"
        });
});
