
window.onload = ()=>{
    $("#loading").remove();
	
	if(Math.ceil($('footer').offset().top+$('footer').height())<$(window).height()){
		$('footer').css({margin:"0px"}).show(0,function(){
			var margin = $(window).height() - Math.floor($('footer').offset().top+$('footer').height());
			$('footer').css({marginTop:margin});
		});
	}

    // $('.chat-box').css('height', window.innerWidth)

};
$(function(){
	$(".rightBtn").on("click",function(){
		var project = $(this).parents(".btn_box").find(".project");
		if(project.is(":animated")) return false;
		var max = project.find(".project-box").length * 384 - $(window).width();
		var margin = parseInt(project.css("margin-left").split("px")[0]);
		if(Math.abs(margin)+384<max){
			project.animate({marginLeft:margin-384},1000);
		}else{
			if(Math.abs(margin)!=max){
				project.animate({marginLeft:margin-(max-Math.abs(margin))},1000);
			}
		}
	});
	$(".leftBtn").on("click",function(){
		var project = $(this).parents(".btn_box").find(".project");
		if(project.is(":animated")) return false;
		var margin = parseInt(project.css("margin-left").split("px")[0]);
		if(Math.abs(margin)-384>=0){
			project.animate({marginLeft:margin+384},1000);
		}else{
			if(Math.abs(margin)!=0){
				project.animate({marginLeft:margin+(Math.abs(margin))},1000);
			}
		}
	});
});
window.onresize = function(){
	$(".project").css({margin:"0px"});
}