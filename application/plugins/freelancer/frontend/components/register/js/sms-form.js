(function($) {
    "use strict";

    $.widget( "livestreet.flSmsForm", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Ссылки
            urls:{
                number: aRouter.freelancer+'ajax-valid-number',
                kod: aRouter.freelancer+'ajax-valid-number-kod'
            },
            selectors: {
                send: '.fl-smsform-send',
                number: '[name="number"]',
                kod:'[name="kod"]',
                submit:'.fl-smsform-submit'
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
            this.elements.send.on('click', this.send.bind(this));
            this.elements.submit.on('click', this.submit.bind(this));
        },
        send: function(event){
            this.elements.send.off('click');
            this.elements.send.addClass('disabled');
            var _this = this;
            this.goTimer(function(_this){
                _this.elements.send.on('click', _this.send.bind(_this));
                _this.elements.send.removeClass('disabled');
                _this.elements.send.text('Получить смс');
            });
            this._load( 'number',{number: this.elements.number.val()}, function(r){console.log(r)} );
        },
        goTimer:function(call){
            var _this = this;
            var time = 60;
            var interval = setInterval(function(){
                _this.elements.send.text('Получить смс через '+time);
                time--;
                if(time<0){
                    clearInterval(interval);
                    call(_this);
                }
            }, 1000);
        },
        submit: function(){
            this._load( 'kod',{kod: this.elements.kod.val()}, this.subres.bind(this) );
        },
        subres:function(r){
            if(r.activate){
                setTimeout(function(){window.location.href = r.url},2000);
            }
        }
    });
})( jQuery );




