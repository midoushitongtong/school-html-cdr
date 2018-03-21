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
window.onload = function () {
		$("#left li").click(function(){
			cutItm=$("#left li").index(this);
			$("#left li").removeClass("bg");$(this).addClass("bg");
		});
		$("#top li").click(function(){
			cutItm=$("#top li").index(this);
			$("#top li").removeClass("bg");$(this).addClass("bg");
		});
		$(".page li a").click(function(){
			cutItm=$(".page li a").index(this);
			$(".page li a").removeClass("bgg");$(this).addClass("bgg");
		});
		var ret = document.getElementById('return');
			ret.onclick = function(){
				history.back();
			};
}