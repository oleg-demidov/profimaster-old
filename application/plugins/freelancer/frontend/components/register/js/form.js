(function($) {
    "use strict";

    $.widget( "livestreet.flMasterRegForm", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Ссылки
            urls:{
                login: aRouter.freelancer+'ajax-generate-login',
            },
            selectors: {
                name: '[name="name"]',
                login: '[name="login"]',
                pass: '[type="password"]',
                label: ".pass_field .ls-field-holder"
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
            this.elements.name.on('focusout', this.focusout.bind(this));            
            this.elements.label.append('<div class="eye" title="Показать/Скрыть пароль"><i class="fa fa-eye-slash  "></i></div>');
            var eye = this.elements.label.find('.eye i');
            eye.on('click', this.showHidePass.bind(this));
            //this._on({ submit: 'submit' });            
        },
        focusout: function(event){
            //this.lock();
            this._load( 'login',{name: this.elements.name.val()}, this.loadSuccess );
        },
        showHidePass: function(event){
            var eye = $(event.target);
            if(eye.hasClass('fa-eye')){
                eye.removeClass('fa-eye').addClass('fa-eye-slash');
                this.elements.pass.attr('type', "password");
                eye.parent().attr('title', "Показать пароль");
            }else{
                eye.removeClass('fa-eye-slash').addClass('fa-eye');
                this.elements.pass.attr('type', "text");
                eye.parent().attr('title', "Скрыть пароль");
            }

        },
        loadSuccess:function(r){
            this.elements.login.val(r.login);
        } 
    });
})( jQuery );




