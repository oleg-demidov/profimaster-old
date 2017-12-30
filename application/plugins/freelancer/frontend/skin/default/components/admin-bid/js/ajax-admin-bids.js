(function($) {
    "use strict";

    $.widget( "livestreet.lsBidAjax", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Ссылки
            urls: {
                allow: null,
                remove: null,
                load: null
            },

            selectors: {
                allow: '.js-bid-ajax-allow',
                remove: '.js-bid-ajax-remove',
                list: '.js-bid-items',
            },
            // Локализация
            i18n: {
                title: null
            },

            event:'new',
            // Фильтры
            filters : [],

            // Парметры передаваемый при аякс запросе
            params : {}
        },
        _create: function () {
            this._super();
            var _this = this;
            this.attachEvents(this.element);            
            this.option('event', this.element.attr('event'));
        },
        attachEvents: function(el){
            var _this = this;
            
            $( el.contents().find(_this.option( 'selectors.allow')) ).click(function(){
                _this._load( 'allow', { bid_id: $(this).attr('bid_id') }, 'onAllow' );
            });
            
            $( el.contents().find(_this.option( 'selectors.remove')) ).click(function(){
                _this._load( 'remove', { bid_id: $(this).attr('bid_id') }, 'onRemove' );
            });
        },
        onAllow: function(res){
            if(res.result){
                this.element.css('background-color', '#e0ffd9');
                this.element.hide();
            }
            this.loadItem();
          console.log('onAllow',res)  
        },
        onRemove: function(res){
            if(res.result){
                this.element.css('background-color', '#ffe4e4');
                this.element.hide();
            }
            this.loadItem();
          console.log('onRemove',res)  
        },
        loadItem: function(){
            this._load( 'load', { event: this.option('event') }, 'addLoadOrder' );
        },
        addLoadOrder: function(res){
            console.log('onLoad',res)
            if(res.result){
                var bid = $(res.sBid);
                this.attachEvents(bid);
                $('.js-bid-items').append(bid);
            }
        }
    });
})( jQuery );

jQuery(document).ready(function($){
    $('.fl-admin-bid').lsBidAjax({
        urls:{
            allow: aRouter.admin+'plugin/freelancer/bid-allow/',
            remove: aRouter.admin+'plugin/freelancer/bid-remove/',
            load: aRouter.admin+'plugin/freelancer/bid-load/'
        }
    });
});