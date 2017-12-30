

(function($) {
    "use strict";

    $.widget( "livestreet.flBidEdit", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {

            // Ссылки
            urls: {
                remove: null,
                add: null,
                update: null
            },

            // Селекторы
            selectors: {
                
                confirm_master_modal:".js-master-confirm-modal",
                confirm_master_toggle:".js-master-modal-toggle",
                
                confirm_remove_modal:".js-confirm-remove-modal",
                confirm_remove_toggle:".js-confirm-remove-modal-toggle, .js-remove-button",
                remove:          '.js-remove-button',
                
                but_get_form: '.js-bid-form-toggle',
                bid_form_container:".ls-block.bid-form-hide",
                bid_form:".js-add-bid-form"
            }

            
        },

        /**
         * Конструктор
         *
         * @constructor
         * @private
         */
        _create: function () {
            this._super();
            this.init_buts();
            this._on( this.elements.remove, { click: 'removeBid' } );
            this._on( this.elements.but_get_form, { click: 'toggleForm' } );
            this.elements.bid_form.lsBidForm({
                urls: {
                    add:  aRouter['order'] + 'ajaxaddbid/',
                    update:  aRouter['order'] + 'ajaxeditbid/',
                    text: aRouter['order'] + 'ajaxtextbid/'
                }
            }); 
        },
        init_buts:function(){
            this.elements.confirm_master_modal.lsModal();
            this.elements.confirm_master_toggle.lsModalToggle();
            
            this.elements.confirm_remove_modal.lsModal();
            this.elements.confirm_remove_toggle.lsModalToggle();
        },
        toggleForm:function(){
            this.elements.bid_form_container.toggle(300); 
        },
        removeBid: function(e){
            this._load( 'remove', {idBid:$(e.target).attr('data-id')}, 'onRemove');
        },
        onRemove:function(r){
            if(r.res){
                this.element.hide(500);
                setTimeout(function(){location.reload()},3000);
            }            
        }
    });
})(jQuery);
