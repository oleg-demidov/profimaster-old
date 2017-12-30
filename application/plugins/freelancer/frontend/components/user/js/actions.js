
/**
 * Media
 *
 * @module ls/media
 *
 * @license   GNU General Public License, version 2
 * @copyright 2013 OOO "ЛС-СОФТ" {@link http://livestreetcms.com}
 * @author    Denis Shakhov <denis.shakhov@gmail.com>
 *
 * TODO: Фильтрация файлов по типу при переключении табов
 */

(function($) {
    "use strict";

    $.widget( "livestreet.flActions", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Редактор к которому привязано текущее окно
            editor: $(),

            // Ссылки
            urls: {
                // Вставка файла
                load: aRouter.freelancer + 'ajax/user/phone'
            },

            // Селекторы
            selectors: {
            },

            uploader_options: {},

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
            
            this._on( this.element, { click: 'loadPhone' } );

        },

        /**
         * 
         */
        loadPhone: function( event ) {
            console.log('phone')
            var _this = this
            this._load( 'load', {}, "onLoad");
        },

        /**
         * 
         */
        onLoad: function( res ) {
            if(res.phone){
                this.element.html('<i class="fa fa-phone  " aria-hidden="true"></i> '+res.phone);
            }
        }

    });
})(jQuery);

jQuery(function ($) {
    $('.fl-user-action-buttons-but-phone').flActions();
});