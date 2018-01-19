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
                zoom: this.option('ymapsOptions.zoom')
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
            }.bind(this), 500);
            setTimeout(function(){
                this.change();
            }.bind(this), 300);
        },
        change:function(){  
            console.log('change');
            this.geocoder(this.elements.input.val(),this.showRes.bind(this));
        },
        clear_field:function(){
            if(this.option('menu')){
                this.elements.holder.find('.ls-nav--dropdown').remove();
            } 
        },
        clear_map:function(){
            this.map.geoObjects.removeAll();
            this.elements.map.css('display', 'none');
        },
        show_map:function(){
            this.elements.map.css('display', 'block');
        },
        showRes:function(geoObjects){
            this.geoObjects = geoObjects;
            var dataForList = [];
            
            this.clear_map();
            this.clear_field();
            
            //console.log('geos',this.geoObjects.getLength())
            geoObjects.each(function(oGeo){
                //this.map.geoObjects.add(oGeo);
                //console.log(oGeo)
                dataForList.push({name:oGeo.properties.get('name'), loc:oGeo.getAdministrativeAreas()});
            }.bind(this));
            //console.log('data',dataForList.length)
            if(dataForList.length){
                this._load('geo_list',{data:encodeURIComponent(JSON.stringify(dataForList))}, this.showList.bind(this));
            }
            
        },
        showList:function(response){    
            var menu = $(response.sHtml);
            this.option('menu', 1);
            menu.css('display','block');
            this.elements.holder.append(menu);
            this._on(this.element.find('li'),{click:"choose_geo"});
            //console.log(response);
        },
        choose_geo:function(e){
            this.clear_map();
            console.log(this.geoObjects.getLength())
            console.log(oGeo);
            var oGeo = this.geoObjects.get($(e.currentTarget).data('index'));
            console.log(oGeo);
            this.map.geoObjects.add(oGeo);
            this.show_map();
            
            return false;
        },
        geocoder:function(sQuery, call){
            console.log('geocoder');
            var myGeocoder = ymaps.geocode(sQuery, this.option('ymapsOptions.geocoder'));
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

