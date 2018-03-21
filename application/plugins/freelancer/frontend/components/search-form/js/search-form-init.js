jQuery(function ($) {
    $('.fl-modal-map').flModalMap(ls.registry.get('ymapsOptionsStat'))
    
    $('.js-category-tree').flFieldCategoryTree({
        selectors:{
            form:"form.fl-search-form"
        },
         afterchange:function(){
            $( 'body' ).flSearchAjax('setParam', 'categories[]', undefined);
            $( 'body' ).flSearchAjax('setParam', 'category_url_full', undefined);
            $( 'body' ).flSearchAjax('update');
        }
    });
    
    $('.js-search-form-geo').lsFieldAjaxGeo({
        urls: {
            geo: aRouter.ymaps + 'ajax-geo',
            countries: aRouter.ymaps + 'ajax-countries',
            regions: aRouter.ymaps + 'ajax-regions',
            cities: aRouter.ymaps + 'ajax-cities'
        },
        selectors:{
            form:'form'
        },
        afterchange:function(){
            $( 'body' ).flSearchAjax('setParam', 'country', null);
            $( 'body' ).flSearchAjax('setParam', 'region', null);
            $( 'body' ).flSearchAjax('setParam', 'city', null);
            $( 'body' ).flSearchAjax('update');
        }
    });
    
    $('.fl-search-form-but-submit').click(function(){
        $('form.fl-search-form').submit();
    });
    
    var searchToggleOpt = Object.assign(ls.registry.get('ymapsOptions'), {
        selectors:{
            resultList:".js-search-ajax-masters"
        }
    })

    $( 'body' ).flSearchAjax({
        urls: {
            search: aRouter.masters + 'ajax-search/'
        },
        i18n: {
            title: ls.lang.get( 'user.search.result_title' )
        },
        selectors: {
            list: '.js-search-ajax-masters',
            submit: '.fl-search-form-but-submit',
            title: '@.js-user-list-search-title',
            result_count:".search-results-count b",
            breadcrumbs_container:".layout-content",
            showList:".js-show-list",
            showMap:".js-show-map"
        },
        filters : [
            {
                type: 'text',
                name: 'query',
                selector: '.js-query-input input'
            },
            {
                type: 'text',
                name: 'categories[]',
                selector: '.appended-category-id'
            },
            {
                type: 'text',
                name: 'category_url_full',
                selector: '.appended-category-url'
            },
            {
                type: 'sort',
                name: 'sort_by',
                selector: '.js-search-sort-menu li'
            },
            {
                type: 'text',
                name: 'country',
                selector: '.js-field-geo-country'
            },
            {
                type: 'text',
                name: 'region',
                selector: '.js-field-geo-region'
            },
            {
                type: 'text',
                name: 'city',
                selector: '.js-field-geo-city'
            }
        ],
        afterupdate: function ( event, data ) {
            $('.fl-portfolio-work-small-list').lsLightbox();
            $('.fl-modal-map').flModalMap(ls.registry.get('ymapsOptionsStat'))
        }
    }).searchToggleMap(searchToggleOpt);
});