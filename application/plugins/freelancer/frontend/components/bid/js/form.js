

(function($) {
    "use strict";

    $.widget( "livestreet.lsBidForm", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            comments: $(),

            // Ссылки
            urls: {
                text: null,
                add: null,
                update: null
            },

            // Селекторы
            selectors: {
                text:          '.js-bid-form-text',
                submit:        '.js-bid-form-submit',
                show_preview:  '.js-bid-form-preview',
                update_submit: '.js-bid-form-update-submit',
                cancel:        '.js-bid-form-update-cancel',
                bid_id:        '.js-bid-form-id'
            },

            // Классы
            classes : {
                locked: 'ls-bid-form--locked'
            },

            html: {
                preview: '<div class="ls-comment-preview ls-text"></div>'
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

            // ID комментария к которому прикреплена форма
            this._targetId = 0;

            // Заблокирована форма или нет
            this._locked = false;

            //this.setModeAdd();

            // Иниц-ия редактора
            this.elements.text.lsEditor({
                submitted: function () {
                    this.element.submit();
                }.bind(this)
            });
            //
            // СОБЫТИЯ
            //

            // Отправка формы
            this._on({ submit: 'submit' });

            // Скрытие формы
            //this._on( this.elements.cancel, { click: 'hide' } );

            // Превью текста
            //this._on( this.elements.show_preview, { click: 'previewShow' } );
        },

        /**
         * Отправляет форму
         */
        submit: function( event ) {
            event.preventDefault();

            // Получаем данные формы до ее блокировки
            var data = this.element.serializeJSON();
            this.lock();
            if(!data.bid_id){
                this.add(data);
                
            }else{
                this.update(data);
            }
        },

        /**
         * Добавляет комментарий
         */
        add: function( data ) {
            this._load( 'add', data, 'onAdd', { onComplete: this.unlock.bind( this ) });
        },

        /**
         * Обновляет комментарий
         */
        update: function( data ) {console.log(3)
            this._load( 'update', data, 'onUpdate', { onComplete: this.unlock.bind( this ) });
        },

        /**
         * Коллбэк вызываемый после успешного добавления комментария
         */
        onAdd: function( response ) {
            if(response.res){
                setTimeout(function(){location.reload()},3000);
            }
        },

        /**
         * Коллбэк вызываемый после успешного обновления комментария
         */
        onUpdate: function( response ) {
            if(response.res){
                setTimeout(function(){location.reload()},3000);
            }
        },

                 

        /**
         * Очищает текстовое поле
         */
        emptyText: function() {
            this.setText( '' );
        },

        /**
         * Получает текст из текстового поля
         */
        getText: function() {
            return this.elements.text.lsEditor( 'getText' );
        },

        /**
         * Устанавливает текст
         */
        setText: function( text ) {
            this.elements.text.lsEditor( 'setText', text );
        },

        lock: function() {
            this._locked = true;
            this._addClass( 'locked' );
            ls.utils.formLock( this.element );
        },

        /**
         * Разблокировывает форму
         */
        unlock: function() {
            this._locked = false;
            this._removeClass( 'locked' );
            ls.utils.formUnlock( this.element );
        },

        /**
         * Проверяет заблокирована форма или нет
         */
        isLocked: function() {
            return this._locked;
        },
        
        getMode: function() {
            return this._mode;
        },

        /**
         * Устанавливает режим
         */
        setMode: function( mode ) {
            this._mode = mode;
        },

        /**
         * Получает ID комментария к которому прикреплена форма
         */
        getTargetId: function() {
            return this._targetId;
        },

        /**
         * Устанавливает ID комментария к которому прикреплена форма
         */
        setTargetId: function( id ) {
            this.elements.comment_id.val( id );
            this._targetId = id;
        },

        /**
         * Режимы
         *
         * @readonly
         * @enum {String}
         */
        MODE: {
            EDIT: 'EDIT',
            ADD: 'ADD'
        }
    });
})(jQuery);

