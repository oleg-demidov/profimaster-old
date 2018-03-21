
(function($) {
    "use strict";

    $.widget( "livestreet.flModalMap", $.livestreet.ymapsGeo, {
        /**
         * Дефолтные опции
         */
        options: {
            
        },
        
        _create: function () {
            this._super(); 
            
            var url =this.getStaticMapUrl( this.element.data());
            
            this.element.attr('href', url);
            
            this.element.colorbox({
                photo:true,
                title:this.element.attr('title')
            });
        }        
        
    });
})(jQuery);

