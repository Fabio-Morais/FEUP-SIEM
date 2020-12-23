/*!
 * jQuery lightweight Fly to
 * Author: @ElmahdiMahmoud
 * Licensed under the MIT license
 */

// self-invoking
;(function ($, window, document, undefined) {
    $.fn.flyto = function ( options ) {
        
    // Establish default settings
        
        var settings = $.extend({
            item      : '.flyto-item',
            target    : '.flyto-target',
            button    : '.flyto-btn',
            shake     : true
        }, options);
        
        
        return this.each(function () {
            var 
                $this    = $(this),
                flybtn   = $this.find(settings.button),
                target   = $(settings.target),
                itemList = $this.find(settings.item);
            
        flybtn.on('click', function () {
            var _this = $(this),
                eltoDrag = _this.parent().parent().find("img").eq(0);

        if (eltoDrag) {
            var imgclone = eltoDrag.clone()
                .offset({
                top: eltoDrag.offset().top+50,
                left: eltoDrag.offset().left+50
            })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': eltoDrag.height() /2,
                    'width': eltoDrag.width() /2,
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                    'opacity': '0.9',
                    'top': target.offset().top +10,
                    'left': target.offset().left + 20,
                    'height': eltoDrag.height() /4,
                    'width': eltoDrag.width() /4
            }, 1000, 'easeInOutExpo');
            


    
            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
        });
        });
    }
})(jQuery, window, document);