$(document).ready(function ($) {
    $('.js-about-text').lsEditor();
    $('.fl-register-master-form').flMasterRegForm();
    $('.js-activation-details').lsDetails();
    $('.fl-smsform').flSmsForm();
    $('.js-polz-modal').lsModal({
        beforeshow:function(){
            $('.js-polz-modal .ls-modal-body').load(aRouter.info+'oferta');
        }
    });
    $('.js-polz-modal-toggle').lsModalToggle();
});



