/**
 * Lightbox
 *
 * @module ls/lightbox
 *
 * @license   GNU General Public License, version 2
 * @copyright 2013 OOO "ЛС-СОФТ" {@link http://livestreetcms.com}
 * @author    Denis Shakhov <denis.shakhov@gmail.com>
 */

$.widget( "livestreet.lsLightbox", {
    /**
     * Дефолтные опции
     */
    options: {},

    /**
     * Конструктор
     *
     * @constructor
     * @private
     */
    _create: function() { 
        var sGroup = this.element.data('group');
        this.element.find('a').colorbox( Object.assign(this.options, {
            rel:sGroup
        }) );
    }
});