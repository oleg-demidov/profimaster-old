(function($) {
    "use strict";

    $.widget( "livestreet.YdirectAds", $.livestreet.lsComponent, {
        /**
         * Дефол
         */
        options: {
            selectors:{
                title:".yd-ads-form-title input",
                text:".yd-ads-form-text input",
                add:".yd-ads-form-add",
                body:".yd-ads",
                remove:".yd-ads-item-remove"
            },
            urls:{
                add: aRouter.admin + 'plugin/ydirect/ads/add',
                remove: aRouter.admin + 'plugin/ydirect/ads/remove'
            }
        },
        _create: function () {
            this._super();
            this.elements.add.on('click', this.addAds.bind(this));
            this.elements.remove.on('click', this.removeAds.bind(this));
        },
        addAds: function(){
            this._load( 'add', { sTitle: this.elements.title.val(), sText: this.elements.text.val() }, this.appenAds.bind(this));            
        },
        appenAds: function(res){
           
            if(res.html){ console.log(res.html)
                this.elements.body.append(res.html);
            }
            $(this.option('selectors.remove')).off('click').on('click', this.removeAds.bind(this));            
        },
        removeAds: function(e){
            console.log(2)
            this._load( 'remove', { iAdsId: $(e.target).data('adsId') }, this.removeAdsEl.bind(this, e.target));
        },
        removeAdsEl: function(el, res){
            if(res.res){
                $(el).closest('.yd-ads-item').remove();
            }
        }
    });
})( jQuery );

jQuery(document).ready(function($){
    $('.yd-ads').YdirectAds();
});