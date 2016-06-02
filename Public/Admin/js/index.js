function resize_window(){
    //alert($(window).height());
	$("#left").height($(window).height()-102);
	//$("#right").height($(window).height()-82).width($(window).width()-201);
    $("#right").height($(window).height()-82).width($(window).width()-204);
}


$(function(){
	resize_window();
	$(window).resize(function(){
		resize_window();
	})
})
