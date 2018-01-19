(function($) {
    "use strict";

    $.widget( "livestreet.flSTabs", $.livestreet.lsComponent, {
        /**
         * Дефолтные опции
         */
        options: {
            
            selectors: {
                tree_input: '.specializations-checkbox.title>.ls-field-holder input',
                inputs: '.select_subtree input',
                tab_list:".ls-tab-list"
            },

            params : {}
        },
        _create: function () {
            this._super();
            this.element.lsTabs();
            this.onMasonry();
            this.parseInputs(this.element.find('input:checked'));
            this._on( this.elements.inputs, { change: 'changeInput' } );
            this._on( this.elements.tree_input, { change: 'changeTree' } );
            this._on( this.elements.tab_list, { click: 'onMasonry' } );
        },
        parseInputs: function(elements){
            var _this = this;
            elements.each(function(){
                _this.addDataForm(this);
            })
        },
        onMasonry: function(){
            this.element.find('.ls-tab-pane-content').masonry({
                // options
                itemSelector: '.select_tree',
                columnWidth: 330,
                transitionDuration: '0.1s',
                gutter: 5
            });
        },
        addDataForm: function(el){
            $('form').append('<input name="specialization[]" class="input_hidden" value="'+$(el).attr('value')+'">');
        },
        changeInput: function(e){//console.log(e)
            var  target = $(e.target);
            target.parent().parent().removeClass('checked');
            $('input.input_hidden[value="'+target.attr('value')+'"]').remove();
                
            if(target.prop("checked")){
                target.parent().parent().addClass('checked');
                this.addDataForm(target);
            }
        },
        changeTree: function(e){
            var target = $(e.target);
            if(target.prop("checked")){
                target.parent().parent().addClass('checked');
                target.closest('.select_tree').find('.select_subtree input').prop('checked', true).change();
            }else{
                target.parent().parent().removeClass('checked');
                target.closest('.select_tree').find('.select_subtree input').prop('checked', false).change();
            }
        }
    });
})( jQuery );



