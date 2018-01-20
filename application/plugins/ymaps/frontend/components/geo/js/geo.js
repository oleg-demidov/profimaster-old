jQuery(function($) { 
    $('.ymaps-geo-field').ymapsGeo();
});



(function($) {
    "use strict";

    $.widget( "livestreet.ymapsGeo", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            ymapsOptions:{
                code:false,
                geocoder:null
            },
            aftersubmit:null,
            selectors:{
                input:"input",
                holder:".ls-field-holder",
                map:"#map",
                li:"li"
            },
            urls:{
                geo_list: aRouter.ymaps + 'ajax-list'
            },
            params: {}
        },
        map:null,
        geoObjects:null,
        circle:null,
        point:null,
        
        _create: function () {
            this._super();
            this.option('ymapsOptions', ls.registry.get('ymapsOptions'));
            
            ymaps.ready(this.initYmaps.bind(this));
        },
        initYmaps:function(){
            console.log('initY');
            this._on(this.elements.input,{ keyup: 'keyup_handler' });
            
            this.map = new ymaps.Map("map", {
                center: this.option('ymapsOptions.center'),
                zoom: this.option('ymapsOptions.zoom'),
                controls:['zoomControl'],
                restrictMapArea:true
            });
            
            /*if(this.option('ymapsOptions.code') !== false){
                this.regions_load(this.option('ymapsOptions.code'), function(regions){
                    //this.map.geoObjects.add(regions);

                    var myPolygon = new ymaps.geometry.Polygon(regions.properties.get('geometry').coordinates);
                    myPolygon.options.setParent(this.map.options);
                    myPolygon.setMap(this.map);

                    this.regionsPolygon = myPolygon;
                }.bind(this));
            }   */         
        },
        keyup_handler:function(){
            this._off(this.elements.input, 'keyup');
            setTimeout(function(){
                this._on(this.elements.input,{ keyup: 'keyup_handler' });
            }.bind(this), 200);
            setTimeout(function(){
                this.change();
            }.bind(this), 200);
        },
        change:function(){  
            this.geocoder(this.elements.input.val(),this.showRes.bind(this));
        },
        clearField:function(){
            if(this.option('menu')){
                this.elements.holder.find('.ls-nav--dropdown').remove();
            } 
        },
        clearMap:function(){
            this.map.geoObjects.removeAll();
        },
        hideMap:function(){
            this.elements.map.css('display', 'none');
        },
        showMap:function(){
            this.elements.map.css('display', 'block');
            this.map.container.fitToViewport();
        },
        showRes:function(geoObjects){
            
            if(this.loadList(geoObjects)){
                this.clearField();
                //this.clearMap();
                this.showMap();
            }
            
        },    
        loadList:function(geoObjects){
            this.geoObjects = geoObjects.toArray();
            var dataForList = [];
            geoObjects.each(function(oGeo){
                dataForList.push({name:oGeo.properties.get('name'), loc:oGeo.getAdministrativeAreas()});
            }.bind(this));

            if(dataForList.length){
                this._load('geo_list',{data:encodeURIComponent(JSON.stringify(dataForList))}, this.showList.bind(this));
                return true;
            }
            
            return false;
        },
        showList:function(response){    
            var menu = $(response.sHtml);
            this.option('menu', 1);
            menu.css('display','block');
            this.elements.holder.append(menu);
            this._on(this.element.find('li'),{click:"chooseGeo"});
        },
        chooseGeo:function(e){
            var oGeo = this.geoObjects[$(e.currentTarget).data('index')];
            
            this.addCircle(oGeo.geometry.getCoordinates(), oGeo.properties.get('boundedBy'));
            
            this.map.setBounds(oGeo.properties.get('boundedBy'));
            
            return false;
        },
        addCircle:function(aCenter, aBounds, radius){
            this.clearMap();
            if(radius === undefined){
                radius = this.getRadiusByBounds(aBounds)
                if(radius < 0){
                    radius = this.option('ymapsOptions.circle.radius');
                }
            }

            this.circle = new ymaps.Circle([
                    aCenter,
                    radius
                ], 
                this.option('ymapsOptions.circle.properties'), 
                this.option('ymapsOptions.circle.options')
            );
            this.point = new ymaps.Placemark(
                    aCenter, 
                this.option('ymapsOptions.point.properties'),
                this.option('ymapsOptions.point.options')
            );
            
            this.map.geoObjects.add(this.circle).add(this.point);
            this.map.setBounds(this.circle.geometry.getBounds());
                        
            this.circle.events.add('click', this.click.bind(this));
            this.map.events.add('click', this.click.bind(this));
        },
        getRadiusByBounds:function(aBounds){
            var dist = ymaps.coordSystem.geo.getDistance(aBounds[0],aBounds[1]);
            var radius = Math.ceil(dist/3);
            if(this.option('ymapsOptions.circle.minRadius') > radius){
                radius = this.option('ymapsOptions.circle.minRadius');
            }
            return radius;
        },
        click:function(event){
            var aCoord = event.get('coords');
            if(this.circle === null){
                this.addCircle(aCoord, this.map.getBounds());
            }else{
                this.circle.geometry.setCoordinates(aCoord);
                this.point.geometry.setCoordinates(aCoord);
            }
            
            var mapBounds = this.map.getBounds();
            this.circle.geometry.setRadius(this.getRadiusByBounds(mapBounds));
            
            this.map.setBounds(this.circle.geometry.getBounds());
            
            this.geocoder(aCoord, this.showClickResults.bind(this));            
        },
        showClickResults:function(geoObjects){
            if(this.loadList(geoObjects)){
                this.clearField();
            }
        },
        geocoder:function(mQuery, call){
            console.log('geocoder')
            var options = this.option('ymapsOptions.geocoder');
            
            var myGeocoder = ymaps.geocode(mQuery, options);
            myGeocoder.then(
                function (res) {
                    var geoObjects = this.filterRes(res);
                    call(geoObjects);
                }.bind(this),
                function (err) {
                    console.log('Ошибка поиска гео обьекта');
                }
            );
        },
        filterRes:function(res){
            if(!this.option('ymapsOptions.code')){
                return res.geoObjects;
            }
            
            var newGeoObjects = new ymaps.GeoObjectCollection({}, {});

            res.geoObjects.each(function(oGeo){
                if(newGeoObjects.getLength() >= this.option('ymapsOptions.results')){
                    return;
                }                
                if(!this.option('ymapsOptions.code')){
                    results.push( oGeo );
                }
                if(oGeo.getCountryCode().localeCompare(this.option('ymapsOptions.code')) == 0){
                    newGeoObjects.add(oGeo);
                }                                
            }.bind(this)); 
            
            return newGeoObjects;
        },
        in_regions:function(aCoord){
            return this.regionsPolygon.contains(aCoord);
        },
        regions_load:function(sCode, call){
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
        }
    });
})(jQuery);

