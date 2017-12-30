(function($) {
    "use strict";

    $.widget( "livestreet.lsOrderAjax", $.livestreet.lsComponent, {
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
                allow: '.js-order-ajax-allow',
                remove: '.js-order-ajax-remove',
                list: '.js-order-items',
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
                _this._load( 'allow', { order_id: $(this).attr('order_id') }, 'onAllow' );
            });
            
            $( el.contents().find(_this.option( 'selectors.remove')) ).click(function(){
                _this._load( 'remove', { order_id: $(this).attr('order_id')}, 'onRemove' );
            });
        },
        onAllow: function(res){console.log('onAllow',res)
            if(res.result){
                this.element.css('background-color', '#e0ffd9');
                this.element.hide();
                this.loadItem();          
            }
              
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
            console.log('load')
            this._load( 'load', { event: this.option('event') }, 'addLoadOrder' );
        },
        addLoadOrder: function(res){
            console.log('res', res)
            if(res.result){
                var order = $(res.sOrder);
                this.attachEvents(order);
                $('.js-order-items').append(order);
            }
        }
    });
})( jQuery );

jQuery(document).ready(function($){
    $('.fl-admin-order').lsOrderAjax({
        urls:{
            allow: aRouter.admin+'plugin/freelancer/order-allow/',
            remove: aRouter.admin+'plugin/freelancer/order-remove/',
            load: aRouter.admin+'plugin/freelancer/order-load/',
        }
    });
});