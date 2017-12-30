

(function($) {
    "use strict";

    $.widget( "livestreet.flMarketForm", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            aftersubmit:null,
            selectors:{
                count:".fl-field-count input",
                price:".fl-market-form-price",
                role_price:"[name='role-price']"
            },
            urls:{
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
            this._on({ submit: 'submit' });
            this.elements.count.on('change',this.changeCount.bind(this));
            this.changeCount();
        },
        changeCount: function(){
            var cof = ls.registry.get('market_price_cof');
            var cofLimit = ls.registry.get('market_price_cof_limit');
            var price = parseInt( this.elements.role_price.val() );
            var countDays = parseInt( this.elements.count.val() );
            if(countDays>cofLimit){
                var countDaysCof = cofLimit;
            }else{
                var countDaysCof = countDays;
            }

            this.elements.price.html( Math.ceil((price*countDays)-(price*countDays*(countDaysCof*cof))) );
        },
        submit: function(event){
            event.preventDefault();    
            var data = this.element.serializeJSON();
            this._trigger('aftersubmit', null, data);
            return false;
        }
    });
})(jQuery);

