

(function($) {
    "use strict";

    $.widget( "livestreet.flMarket", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            comments: $(),

            // Ссылки
            urls: {
                market: aRouter.pay + 'market',
                load: aRouter.pay,
                payment: aRouter.pay + 'ajax-payment',
                update: null
            },

            // Селекторы
            selectors: {
                modal:          '.fl-market-modal',
                body:".fl-market-modal .ls-modal-body",
                paybut:".fl-button-pay"
            },

            // Классы
            classes : {
                locked: 'ls-bid-form--locked'
            },


            params: {}
        },

        /**
         * Конструктор
         *
         * @constructor
         * @private
         */
        _create: function () {
            this._super();
            this.element.on('click', this.click.bind(this));
            
        },
        click: function(){
            this._load('market',{}, this.loader.bind(this));
        },
        loader: function( r ) {
            $(this.option('selectors.body')).html(r.html)
            $('.js-fl-market-index-tabs').lsTabs();
            $(this.option('selectors.paybut')).on('click', this.payclick.bind(this));
            var self = this;
            $('.fl-market-form').flMarketForm({
                aftersubmit: function(e,c){
                    self._load('payment', c, self.load_payment.bind(self));
                }
            });
            $('.fl-field-count').flFieldCount();
        },
        payclick: function(e){
            var url = $(e.target).attr('href');
            var str = location.protocol+'//'+location.host;
            this.option('urls.load_now', this.option('urls.load') + 'ajax-'+url.substring(str.length+5));
            this._load('load_now', {}, this.loader.bind(this));
            return false;
        },
        load_payment: function(r){
            $(this.option('selectors.body')).html(r.html);
        }
    });
})(jQuery);

