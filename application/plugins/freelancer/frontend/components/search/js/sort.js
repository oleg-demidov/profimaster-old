(function($) {
    "use strict";

    $.widget( "livestreet.flSortButtons", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Ссылки
            urls: {
                
            },
            
            icons: {
                random : 'fa-random',
                asc : 'fa-sort-amount-asc',
                desc : 'fa-sort-amount-desc'
            },
            
            titles: {
                random : 'Случайно',
                asc : 'По возрастанию',
                desc : 'По убыванию'
            },

            selectors: {
                button: '.fl-search-sort-button'
            },
            // Локализация
            i18n: {
                title: null
            },

            params : {}
        },
        _create: function () {
            this._super();
            this._on( this.elements.button, { click: 'clickSort' } );
        },
        clickSort: function(e){
            var el = $(e.target);
            var val = el.val();
            if( val == 'desc'){
                this.changeSort(el, 'random');
                return;
            }
            if(val == 'asc'){
                this.changeSort(el, 'desc');
                return
            }
            if(val == '' || val == 'random'){
                this.changeSort(el, 'asc');
                return
            }
        },
        changeSort: function(el, value){
            el.val(value);
            var titles = this.option( 'titles' );
            el.attr('title',titles[value]);
            //el.lsTooltip();
            
            $('input[name="'+el.attr('name_hid')+'"]').remove();
            if(value != 'random'){
                el.after('<input type="hidden" value="'+value+'" name="'+el.attr('name_hid')+'">');
            }
            
            var icons = this.option( 'icons' );
            $(el.find('i')).removeClass().addClass('fa '+icons[value]);
        }
    });
})( jQuery );



