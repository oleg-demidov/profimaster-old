
$.widget( "livestreet.flDropdownSelect", $.livestreet.lsDropdown, {
    /**
     * Дефолтные опции
     */
    options: {
        selectable:true,
        now_active:null,
        afterselect:null
    },
    _create: function() {
        var _this = this;
        this._super();
        var activeItem = this.getActiveItem();
        this.option('now_active',activeItem.data('value') );
    },
    setText: function ( text ) {
        this.elements[ this.elements.text.length ? 'text' : 'toggle' ].text( text );
        var activeItem = this.getActiveItem();
        var sItemHtml = activeItem.html();
        this.elements.toggle.html(sItemHtml);
        if(this.option('now_active')){
            this.option('now_active',activeItem.data('value') );
            this._trigger('afterselect',null, activeItem, this);
        }
    }
});