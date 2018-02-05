(function($) {
    "use strict";

    $.widget( "livestreet.ymapsGeo", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            afterShowStatMap:null,
            afterShowJsMap:null,
            afterHideJsMap:null,
            afterInitJsMap:null,
            map:null,
            staticMap:null,
            geocoder:null,
            filter:null,
            values:{},
            selectors:{
                container:".container-ymap"
            },
            params: {}
        },
        map:null,
        clusterer:null,
        
        _create: function () {
            this._super();
            if(ymaps !== undefined){
                ymaps.ready(this.initYmaps.bind(this));
            }
        },
        /*
         * Вызывается после подгрузки всех обьектов ymaps
         */
        initYmaps:function(){
                       
               
        },
        createJsMap:function(container, options){
            options = options || {};
            if(this.option('map') === null){
                console.log('Настройки карты не переданы');
                return;
            }
            options = Object.assign(options, this.option('map'));
            
            this.addElement(container, {name:'map', selector:"#map"}, {tag:"div", id:"map"});

            this.map = new ymaps.Map('map', options); 
            
            this.map.events.add('boundschange', this.controlBounds.bind(this));
            
            this._trigger( 'afterInitJsMap', null, this );
            
        },
        /*
         * Контролирует zoom. Чтобы не уходил за границы видимости
         */
        controlBounds:function(event){
            if(this.option('map.maxZoom') && event.get('newZoom') > this.option('map.maxZoom')){
                this.map.setZoom(this.option('map.maxZoom'));
            }
        },
        /*
         * Обратный вызов кнопки Ok на карте
         */
        mapButtonHandler:function(){
            this.hideJsMap();
        },
        /*
         * Показывает статичную карту
         */
        showStaticMap:function(container, options){
            options = options || {};
            
            if(this.option('staticMap') === null){
                console.log('Настройки static карты не переданы');
                return;
            }
            var resOptions = Object.assign(this.option('staticMap'), options );
            var pt = $.map(resOptions.pt, function(value, index) {
                return [value];
            });
            var size = [resOptions.width, resOptions.height];
            var queryData = {
                l:"map",
                size:size.join(','),
                z:Math.abs(resOptions.zoom),
                ll:resOptions.ll
            };    
            if(resOptions.lat !== undefined){
                queryData.pt = [Math.abs(resOptions.lat), Math.abs(resOptions.long), pt.join('')].join(',');
                delete queryData.ll;
            }
            
            var src = "https://static-maps.yandex.ru/1.x/?"+$.param(queryData);
            
            this.addElement(container, {name:'staticMap', selector:".static-map"}, {tag:"img", src:src, class:"static-map"});
            
            this._trigger( 'afterShowStatMap', null, this );
        },
        
        hideStaticMap:function(){
            if(this.elements.staticMap === undefined){
                return;
            }
            this.elements.staticMap.remove();
            delete this.elements.staticMap;
        },
        
        clearMap:function(){
            this.map.geoObjects.removeAll();
        },
        hideJsMap:function(){
            $(this.option('selectors.map')).css('display', 'none');
            this._trigger( 'afterHideJsMap', null, this );
        },
        showJsMap:function(){
            $(this.option('selectors.map')).css('display', 'block')
                    .css('height', this.option('map.height'));
            this.map.container.fitToViewport();
            this._trigger( 'afterShowJsMap', null, this );
        },
        /*
         * Получить радиус для окружности чтобы она входила в область bounds
         */
        getRadiusByBounds:function(aBounds){
            var dist = ymaps.coordSystem.geo.getDistance(aBounds[0],aBounds[1]);
            var radius = Math.ceil(dist/4);
            if(this.option('ymapsOptions.circle.minRadius') > radius){
                radius = this.option('ymapsOptions.circle.minRadius');
            }
            return radius;
        },
        /*
         * Получить набор обьектов по запросу
         */
        geocoder:function(mQuery, call){
            if(this.option('geocoder') === null || this.option('filter') === null){
                console.log('Настройки geocoder или filter не переданы');
                return;
            }
            console.log('geocoder '+mQuery)
            var options = this.option('geocoder');
            
            var myGeocoder = ymaps.geocode(mQuery, this.option('geocoder'));
            myGeocoder.then(
                function (res) {
                    if(!this.option('filter.enable')){
                        call(res.geoObjects);
                        return;
                    }
                    var geoObjects = this.filterRes(res);
                    call(geoObjects);
                }.bind(this),
                function (err) {
                    console.log('Ошибка поиска гео обьекта');
                }
            );
        },
        /*
         * Фильтр обьектов по запросу
         */
        filterRes:function(res){
            var newGeoObjects = new ymaps.GeoObjectCollection({}, {});

            res.geoObjects.each(function(oGeo){
                if(newGeoObjects.getLength() >= this.option('filter.results')){
                    return;
                }                
                if(!this.option('filter.code')){
                    results.push( oGeo );
                }
                if(oGeo.getCountryCode().localeCompare(this.option('filter.code')) == 0){
                    newGeoObjects.add(oGeo);
                }                                
            }.bind(this)); 
            
            return newGeoObjects;
        },
        /*
         * Добавить обьекты на карту используя кластеризацию(Можно добавить 1000 и больше не боясь торможения карты)
         */
        addObjectsClusterer:function(aObjects){
            if(this.clusterer !== null){
                this.clusterer.removeAll();
            }else{
                this.clusterer = new ymaps.Clusterer(this.option('cluster'));
            }
            this.clusterer.add(aObjects);
            this.map.geoObjects.add(this.clusterer);
        },
        /*
         * Получить регионы и их геометрию
         */
        regionsLoad:function(sCode, call){
            ymaps.regions.load(sCode, {
                lang: 'ru',
                quality: 1
            }).then(function (result) {
                this.regions = result.geoObjects;
                call(this.regions);
            }.bind(this),
            function (err) {
                console.log('Ошибка загрузки регионов');
            });
        },
        /*
         * Добавляет кнопку Ок на карту
         */
        _addButton:function(){
            var _this = this;
            var layout = ymaps.templateLayoutFactory.createClass(
                    '<button type="button" id="butOk" value="" class="ls-button ls-button--primary map-ok ">{{ data.content }}</button>',
                {
                    build:function(){
                        layout.superclass.build.call(this);
                        $('#butOk').on('click', function(){
                            _this.buttonHandler();
                        })
                    }
                }
            );
            
            var button = new ymaps.control.Button({
                data:{
                    content:'Ок',
                    float:"right"
                },
                options: {
                    layout: layout
                }
            });
            
            this.map.controls.add(button, {float: 'right'});
        },
        /*
         * Вспомогательный метод для добавления элемента в this.elements
         */
        addElement:function(container, opt,  attr, html){
            if(this.elements[opt.name] !== undefined){
                return;
            }
            html = html || '';            
            var element = $(document.createElement(attr.tag));
            delete attr.tag;
            element.attr(attr).html(html);
            container.append(element);
            this.option( 'selectors.'+opt.name, opt.selector );
            this.elements[opt.name] = element;
            this.option( 'elements', this.elements );
        }
    });
})(jQuery);

