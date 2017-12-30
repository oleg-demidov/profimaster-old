(function($) {
    "use strict";

    $.widget( "livestreet.flSearchForm", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        startOffset:null,
        options: {
            
        },
        _create: function () {
            this._super();
            this.startOffset = this.element.offset().top + 50;
            $(document).scroll(this.scrool.bind(this));
        },
        scrool: function(){
            var iWindowOffTop = $(window).scrollTop();
            if(this.startOffset < iWindowOffTop){
                this.element
                        .css('width',$('.ls-block.fl-search-form').width())
                        .addClass('fl-search-form-scroll');
                $('.layout-container').addClass('layout-container-scroll');
            }
            if(this.startOffset > iWindowOffTop){
                this.element
                        .removeClass('fl-search-form-scroll')
                       .css('width','auto');
                $('.layout-container').removeClass('layout-container-scroll');
            }
        }
    });
})( jQuery );



