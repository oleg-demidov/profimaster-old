jQuery(function($) {
    $('.js-portfolio-work-form-text').lsEditor();
    $('.js-confirm-work-remove').lsModal();
    $('.js-work-remove-button-toggle').lsModalToggle();
    if(window.Masonry !== undefined){
        $('.fl-portfolio-work-list').masonry({
            // options
            itemSelector: '.fl-portfolio-work-item',
            columnWidth: 30
          });
    }
    $('.js-fl-portfolio-work-item-slider').lsSlider();
    $('.js-fl-portfolio-work-small-item-lightbox').lsLightbox();
});