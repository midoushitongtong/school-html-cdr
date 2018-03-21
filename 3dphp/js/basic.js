function show() {
  var i,p,v,obj,args=show.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

	var first = document.getElementById('first');
	var first_w = document.getElementById('first_w');
	var first_e = document.getElementById('first_e');
	var first_u = document.getElementById('first_u');
	var first_b = document.getElementById('first_b');
	var first_c = document.getElementById('first_c');
	var first_eeeeee = document.getElementById('first_eeeeee');
	var first_h = document.getElementById('first_h');	var first_hhhhhh = document.getElementById('first_hhhhhh');
	first.onclick = function () {
		show('produce','','show');show('produce_1','','hide');show('produce_2','','hide');show('produce_3','','hide')
	};
	first_w.onclick = function () {
		show('produce_1','','show');show('produce','','hide');show('produce_2','','hide');show('produce_3','','hide')
	};
	first_e.onclick = function () {
		show('produce_2','','show');show('produce','','hide');show('produce_1','','hide');show('produce_3','','hide')
	};
	first_u.onclick = function () {
		show('produce_3','','show');show('produce','','hide');show('produce_1','','hide');show('produce_2','','hide')
	};
	first_b.onclick = function () {
		show('d_right','','show');show('d_right_1','','hide');show('d_right_2','','hide');show('d_right_3','','hide');show('d_right_4','','hide')
	};
	first_c.onclick = function () {
		show('d_right_1','','show');show('d_right','','hide');show('d_right_2','','hide');show('d_right_3','','hide');show('d_right_4','','hide')
	};
	first_eeeeee.onclick = function () {
		show('d_right_2','','show');show('d_right','','hide');show('d_right_1','','hide');show('d_right_3','','hide');show('d_right_4','','hide')
	};
	first_h.onclick = function () {
		show('d_right_3','','show');show('d_right','','hide');show('d_right_1','','hide');show('d_right_2','','hide');show('d_right_4','','hide')
	};
	first_hhhhhh.onclick = function () {
		show('d_right_4','','show');show('d_right','','hide');show('d_right_1','','hide');show('d_right_2','','hide');show('d_right_3','','hide')
	};


