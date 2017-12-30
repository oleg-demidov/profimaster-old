jQuery(function ($) {
    $('.ygeo-dropdown a').click(function(){return false;})
    $('.ygeo-dropdown').lsDropdown({
        selectable:true,
        //body: true,
        afterhide:function(_this){
            $('.ygeo-dropdown button').html('<i class="fa fa-globe  " aria-hidden="true"></i>'
                    +$('.ygeo-dropdown button').text())
            $('input[name="ygeo"]').remove();
            $('form').append('<input name="ygeo" type="hidden" value="'+$('.ygeo-dropdown li.ls-nav-item.active').attr('data-id')+'">');
            return false;
        },
        aftershow:function(e){
            var posAtUp =$(e.target).offset().top-$(window).scrollTop();
            var posAtDown = $(window).height()-posAtUp;
            if(posAtUp>posAtDown){
                var height = posAtUp;
            }else{
                var height = posAtDown;
            }
            $(e.target).find('ul').height((height-50)+'px').css('overflow','auto');
            console.log( $(e.target).find('button ul').height(height+'px'))
            console.log(posAtUp)
            console.log($(window).height()-posAtUp)
        }
    });
});


