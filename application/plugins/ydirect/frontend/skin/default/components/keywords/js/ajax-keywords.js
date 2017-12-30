(function($) {
    "use strict";

    $.widget( "livestreet.YdirectKeywords", $.livestreet.lsComponent, {
        /**
         * Дефол
         */
        options: {
            selectors:{
                add:".yd-keyword-form-add",
                new_keyword: ".yd-keyword-form-field input",
                body:".yd-keywords",
                remove:".yd-keyword-remove"
            },
            urls:{
                add: aRouter.admin + 'plugin/ydirect/keyword/add',
                remove: aRouter.admin + 'plugin/ydirect/keyword/remove'
            }
        },
        _create: function () {
            this._super();
            this.elements.add.on('click', this.addKeyword.bind(this));
            this.elements.remove.on('click', this.removeKeyword.bind(this));
        },
        addKeyword: function(){
            this._load( 'add', { sKeyword: this.elements.new_keyword.val() }, this.appenKeyword.bind(this));            
        },
        appenKeyword: function(res){
            if(res.html){
                this.elements.body.append(res.html);
            }
            $(this.option('selectors.remove')).off('click').on('click', this.removeKeyword.bind(this));            
        },
        removeKeyword: function(e){
            this._load( 'remove', { iKeywordId: $(e.target).data('keywordId') }, this.removeKeywordEl.bind(this, e.target));
        },
        removeKeywordEl: function(el, res){
            if(res.res){
                $(el).closest('.yd-keyword').remove();
            }
        }
    });
})( jQuery );

jQuery(document).ready(function($){
    $('.yd-keywords').YdirectKeywords();
});