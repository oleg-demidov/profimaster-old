jQuery(function ($) {
    Array.prototype.pushIfNoEx = function(aPush){
        aPush.forEach(function(el){
            if(!this.includes(el)){
                this.push(el);
            }
        }.bind(this));
    }
    $('.fl-specialization-tree .ls-dropdown').lsDropdown();
    $('.fl-specialization-tree-root').flSpecializationTree();
    $('.fl-specialization-tree-reset').lsTooltip();
    
});

(function($) {
    "use strict";

    $.widget( "livestreet.flSpecializationTree", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            // Ссылки
            urls: {
                
            },
            
            icons: {
            },
            
            titles: {
            },

            selectors: {
                checkboxes: 'input[type="checkbox"]',
                nav_items:".ls-nav-item",
                reset:".fl-specialization-tree-reset",
                inputs:".fl-specialization-tree-inputs",
                count:".fl-specialization-tree-count button",
                checks:".ls-dropdown--count .ls-nav--dropdown"
            },
            // Локализация
            i18n: {
                title: null
            },

            params : {}
        },
        _create: function () {
            this._super(); 
            this.changeCheckbox();
            this._on( this.elements.checkboxes, { change: 'changeCheckbox' } );
            this._on( this.elements.reset, { click: 'clearAll' } );
        },
        changeCheckbox: function(){
            var aSpec = [];
            var aPids = [];
            var iSpec = 0;
            
            this.clear();
            
            this.elements.checkboxes.each(function(i,ch){
                var oFieldCh = $(ch).closest('.ls-field');                
                
                if($(ch).prop('checked')){  
                    iSpec++;
                    oFieldCh.addClass('fl-st-item-selected');
                    var sParentIds = oFieldCh.data('parent-ids');
                    var aPidsNew = (''+sParentIds).split(',');
                    aSpec[$(ch).val()] = oFieldCh.find('label').html();
                    aPids.pushIfNoEx(aPidsNew);                    
                }else{
                    oFieldCh.removeClass('fl-st-item-selected');     
                }
                
            }.bind(this));      
            
            
            this.updCount(iSpec);           
            this.updItems(aPids); 
            this.updChecks(aSpec);
            this.updInput(aSpec);
        },
        updItems: function(aPids){
            this.elements.nav_items.each(function(i,item){
                if(aPids.includes($(item).data('id')+'')){
                    $(item).addClass('fl-st-item-selected')
                }
            });
        },
        updCount: function(count){
            this.elements.count.html('Выбрано <b>'+count+'</b>');
        },
        updChecks: function(aSpec){
            aSpec.forEach(function(val, key){
                var el = $('<div data-value="'+key+'" class="fl-specialization-count">'+val+'</div>')
                        .click(this.clearItem.bind(this));
                this.elements.checks.append(el);
            }.bind(this));
        },
        updInput: function(aSpec){
            aSpec.forEach(function(el, key){
                this.elements.inputs.append('<input type="hidden" value="'+key+'" name="specialization[]">');
            }.bind(this));
        },
        clearItem: function(e){
            console.log(e.target)
            this.element.find('input[value="'+$(e.target).data('value')+'"]').prop('checked',false);
            this.changeCheckbox();
        },
        clear: function(){
            this.elements.nav_items.removeClass('fl-st-item-selected');
            this.elements.checkboxes.closest('.ls-field').removeClass('fl-st-item-selected');
            this.elements.count.html('Выбрано <b>0</b>');
            this.elements.checks.find('div,li').remove();
            this.elements.inputs.find('input').remove();
        },
        clearAll: function(){
            this.clear();
            this.elements.checkboxes.prop('checked',0);
        }
    });
})( jQuery );



