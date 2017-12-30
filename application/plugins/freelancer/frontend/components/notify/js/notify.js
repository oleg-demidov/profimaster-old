(function($) {
    "use strict";

    $.widget( "livestreet.flNotify", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Ссылки
            urls: {
                allow: null,
                hide: aRouter.freelancer + 'ajax/notify/hide',
                load: aRouter.freelancer + 'ajax/notify'
            },

            selectors: {
                badge: '.js-fl-notify-bell-toggle .ls-nav-item-badge',
                list: '.fl-notify-modal .ls-modal-body .fl-notify-list',
                button_hide: '.fl-notify-buttons-hide',
                button_load: '.js-fl-notify-bell-toggle'
            },
            // Локализация
            i18n: {
                title: null
            },

            // Парметры передаваемый при аякс запросе
            params : {}
        },
        _create: function () {
            this._super();
            this.loadItems();
        },
        loadItems: function(){
            this._load( 'load', {  }, 'onLoadItems' );
        },
        
        onLoadItems: function(res){
            $(this.option( 'selectors.list')).append(res.sNotify);
            var elButHide = this.element.find(this.option( 'selectors.button_hide'));
            elButHide.off('click')
            this._on(elButHide,{click: 'hideNotif'});
            if(res.iCount){
                $(this.option( 'selectors.badge')).html(res.iCount);
            }
        },
        hideNotif:function(e){
            var iNotId = $(e.target).parent().data('iNotifyId')
            this._load( 'hide', { iNotifyId:iNotId }, this.onHIdeNotify.bind(this, iNotId));
        },        
        onHIdeNotify:function(iNotId, res ){ 
            if(res.iRes){
                $('#notify'+iNotId).hide(300, function(){$(this).remove()});
            }
            if(res.iCount){
                $(this.option( 'selectors.badge')).html(res.iCount);
            }
            if(res.iCount>=5){
                this._load( 'load', { limit:[4,1] }, 'onLoadItems' );
            }
        }
    });
})( jQuery );
