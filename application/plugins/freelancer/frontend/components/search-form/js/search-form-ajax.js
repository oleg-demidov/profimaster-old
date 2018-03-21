(function($){
    "use strict";
    $.widget('freelancer.flSearchAjax', $.livestreet.lsSearchAjax, {
        options: {
            // Ссылки
            urls: {
                search: null
            },

            // Селекторы
            selectors: {
                submit: '.fl-search-form-but-submit',
                title: null,
                pages:".ls-pagination-item-link"
            },

            // Локализация
            i18n: {
                title: null
            },

            // Фильтры
            filters : [],

            // Парметры передаваемый при аякс запросе
            params : {}
        },
        
        _create: function () {
            
            this._super();
            
            this.elements.submit = $(this.option('selectors.submit'));
            this.elements.submit.off('click');
            this.elements.submit.on('click', function(){ this.update(1) }.bind(this));
            
            this.elements.breadcrumbs_container = $(this.option('selectors.breadcrumbs_container'));
            
            this.elements.showMap.on('click', this.showYMap.bind(this));
            this.elements.showList.on('click', this.showList.bind(this));
            
            this.listenPages();
            
        },
        showYMap:function(){
            this.elements.showMap.prop('disabled', true);
            this.elements.showList.prop('disabled', false);
        },
        showList:function(){
            this.elements.showMap.prop('disabled', false);
            this.elements.showList.prop('disabled', true);
        },
        listenPages:function(){
            var _this = this;
            $(this.option('selectors.pages')).click(function(){
                _this.update($(this).html());
                return false;
            });
        },
        update: function(nPage) { 
            for (var i = 0; i < this.option( 'filters' ).length; i++) {
                this.updateFilter( this.option( 'filters' )[i] );
            };
            
            this.option('params.page', nPage);

            this._trigger( 'beforeupdate', null, this );

            this._load( 'search', 'onUpdate' );
        },
        
        onUpdate: function ( response ) {
            
            if(response.html){
                this.elements.list.html( $.trim( response.html ) );
            }
            
            this.elements.result_count.html(response.iMastersCount)
            
            this.listenPages();
            
            window.history.pushState("", response.sTitle, response.sBaseUrl);
            
            this.elements.breadcrumbs_container.find('.fl-search-breadcrumbs').remove();
            this.elements.breadcrumbs_container.prepend(response.breadcrumbs);

            this._trigger( 'afterupdate', null, { context: this, response: response } );
        }
    })
    
})(jQuery);