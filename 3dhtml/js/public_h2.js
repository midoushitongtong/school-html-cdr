(function ($) {
    $.extend({
        'nicenav': function (con) {
            con = typeof con === 'number' ? con : 400;
            var $lis = $('.nav ul li'), $h = $('#buoy')
            $lis.hover(function () {
                $h.stop().animate({
                    'left': $(this).offsetParent().context.offsetLeft
                }, con);
            }, function () {
                $h.stop().animate({
                    'left': '-90px'
                }, con);
            })
        }
    });
}(jQuery));