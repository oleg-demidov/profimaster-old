jQuery(function($) {
    $('.js-response-form-text').lsEditor({
        /*submitted: function () {
            this.element.submit();
        }.bind(this)*/
    });
    $('.js-confirm-response-remove').lsModal();
    $('.js-response-remove-button-toggle').lsModalToggle();
});