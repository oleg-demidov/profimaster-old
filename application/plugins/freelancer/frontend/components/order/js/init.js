jQuery(function($) { 
    $('.js-my-slider').lsSlider();
    $('.js-confirm-remove-order, .js-order-confirm-end-modal').lsModal();
    $('.js-order-remove-button-toggle, .js-order-confirm-end-toggle').lsModalToggle();
    $('.js-order-works-lightbox').lsLightbox();
    $('.js-order-status').lsTooltip();
    $('.js-accept-master-confirm').lsConfirm({
            message: "Вы уверены, что хотите принять заказ?"
        });
    $('.js-remove-order-confirm').lsConfirm({
            message: "Вы уверены, что хотите удалить заказ?"
        });
});