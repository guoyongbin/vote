function tanchuceng(width,height,wtop,wleft,url,zindex){
//	$("select").each(function(){
//		if($(this).css("display") != "none"){
//			$(this).addClass("zselecthidecl");
//			$(this).hide();
//		}
//	});
	url=jsroot+url;
	//alert(url);//return;
	if(!zindex)
	{
		if($("body").find(".tanChu").length > 0){
		return;
	}
	}
	if(zindex =='new')
	{
		var winWinth = $(window).width(),winHeight = $(document).height();
		  var winbodyHeight = $(window).height();
		  var tanChunewLeft = $(window).width()/2 - width/2;
		  var tanChunewTop = $(window).height()/2 - height/2 + $(window).scrollTop();
		  var tcwidth,tcheight,tctop,tcleft;
		  if(width == "twidth"){
		    tcwidth = winWinth - 20;
		  }else{
		    tcwidth = width;
		  }
		  if(height == "theight"){
		    tcheight = winbodyHeight - 20;
		  }else{
		    tcheight = height;
		  }
		  if(wtop == "wtop"){
		    tctop = tanChunewTop;
		  }else{
		    tctop = wtop;
		  }
		  if(wtop == "wtop2"){
		    tctop = 10 + $(window).scrollTop();;
		  }
		  if(wleft == "wleft"){
		    tcleft = tanChunewLeft;
		  }else{
		    tcleft = wleft;
		  }
		  $(".tanChu").append("<div class='winbjnew'></div>");
		  $(".winbjnew").css("width",winWinth);
		  $(".winbjnew").css("height",winHeight);
		  $(".winbjnew").css("background","#000");
		  $(".winbjnew").css("position","absolute");
		  $(".winbjnew").css("left","0");
		  $(".winbjnew").css("top","0");
		  $(".winbjnew").css("top","0");
		  $(".winbjnew").css("z-index","2");
		  $(".winbjnew").css("opacity","0.5");
		  $(".winbjnew").css("filter","alpha(opacity=50)");
		 // $(".winbjnew").css({width:winWinth,height:winHeight,background:"#000",position:"absolute",left:"0",top:"0"});
		 // $(".winbjnew").fadeTo(0, 0.7);
		  
		  $("body").append("<div class='tanChunew'></div>");
		  $(".tanChunew").css("width",tcwidth);
		  $(".tanChunew").css("height",tcheight);
		  $(".tanChunew").css("position","absolute");
		  $(".tanChunew").css("left",tcleft);
		  if(tctop < 0){tctop = 0;}
		  $(".tanChunew").css("top",tctop);
		  $(".tanChunew").css("z-index","4");
		  //$(".tanChunew").css({width:tcwidth,height:tcheight,left:tcleft,top:tctop,position:"absolute"});
		  $(".tanChunew").load(url,function(){
			  $(".tanchuiframebacknew").show();
		  });
		  if(width == "twidth"){
		    var winWinth2 = winWinth + 20;
		    var winWinth3 = $(".tanChunew").width() + 16;
		    $("body").css("overflow","hidden");
		    $(".winbjnew").css("width",winWinth2);
		    $(".tanChunew").css("width",winWinth3);
		  }
//		  $(".winbjnew").click(function(){
//			  if($(".tanChunew").length == 1){
//			    	$(".winbjnew").remove();
//				 }
//			    $(".tanChunew").remove();
//		  })
		  return;
	}

  
  var winWinth = $(window).width(),winHeight = $(document).height();
  var winbodyHeight = $(window).height();
  var tanchuLeft = $(window).width()/2 - width/2;
  var tanchuTop = $(window).height()/2 - height/2 + $(window).scrollTop();
  var tcwidth,tcheight,tctop,tcleft;
  if(width == "twidth"){
    tcwidth = winWinth - 20;
  }else{
    tcwidth = width;
  }
  if(height == "theight"){
    tcheight = winbodyHeight - 20;
  }else{
    tcheight = height;
  }
  if(wtop == "wtop"){
    tctop = tanchuTop;
  }else{
    tctop = wtop;
  }
  if(wtop == "wtop2"){
    tctop = 10 + $(window).scrollTop();;
  }
  if(wleft == "wleft"){
    tcleft = tanchuLeft;
  }else{
    tcleft = wleft;
  }
  $("body").append("<div class='winbj'></div>");
  $(".winbj").css("width",winWinth);
  $(".winbj").css("height",winHeight);
  $(".winbj").css("background","#000");
  $(".winbj").css("position","absolute");
  $(".winbj").css("left","0");
  $(".winbj").css("top","0");
  $(".winbj").css("top","0");
  $(".winbj").css("z-index","2");
  $(".winbj").css("opacity","0.5");
  $(".winbj").css("filter","alpha(opacity=50)");
 // $(".winbj").css({width:winWinth,height:winHeight,background:"#000",position:"absolute",left:"0",top:"0"});
 // $(".winbj").fadeTo(0, 0.7);
  
  $("body").append("<div class='tanChu'></div>");
  $(".tanChu").css("width",tcwidth);
  $(".tanChu").css("height",tcheight);
  $(".tanChu").css("position","absolute");
  $(".tanChu").css("left",tcleft);
  if(tctop < 0){tctop = 0;}
  $(".tanChu").css("top",tctop);
  $(".tanChu").css("z-index","4");
  //$(".tanChu").css({width:tcwidth,height:tcheight,left:tcleft,top:tctop,position:"absolute"});
  $(".tanChu").load(url,function(){
	  $(".tanchuiframebacknew").show();
  });
  if(width == "twidth"){
    var winWinth2 = winWinth + 20;
    var winWinth3 = $(".tanChu").width() + 16;
    $("body").css("overflow","hidden");
    $(".winbj").css("width",winWinth2);
    $(".tanChu").css("width",winWinth3);
  }
//  $(".winbj").click(function(){
//	  if($(".tanChu").length == 1){
//	    	$(".winbj").remove();
//		 }
//	    $(".tanChu").remove();
//  })
 }
function tanchuclose(th){
	 if($(".tanChu").length == 1){
    	$(".winbj").remove();
	 }
    $(th).parents(".tanChu").remove();
    $(".zselecthidecl").each(function(){
    	$(this).show();
    });
}
function tanchuclosenew(th){
	$(".winbjnew").remove();
	 if($(".tanChunew").length == 1){
   	$(".winbjnew").remove();
	 }
	 $(th).parents(".tanChunew").remove();
   $(".zselecthidecl").each(function(){
   	$(this).show();
   });
}
$(window).resize(function() {
	if($(".winbj").length > 0){
	  var winWinth = $(window).width(),winHeight = $(document).height();
	  $(".winbj").css("width",winWinth);
	  $(".winbj").css("height",winHeight);
	};
	if($(".tanChu").length > 0){
	  var tctop = $(window).height()/2 - parseInt($(".tanChu").height())/2 + $(window).scrollTop();
	  if(tctop < 0){tctop = 0;}
	  $(".tanChu").css("top",tctop);
	};
	if($(".winbjnew").length > 0){
		  var winWinth = $(window).width(),winHeight = $(document).height();
		  $(".winbjnew").css("width",winWinth);
		  $(".winbjnew").css("height",winHeight);
	};
	if($(".tanChunew").length > 0){
	  var tctop = $(window).height()/2 - parseInt($(".tanChunew").height())/2 + $(window).scrollTop();
	  if(tctop < 0){tctop = 0;}
	  $(".tanChunew").css("top",tctop);
	};
}); 
//tanchuceng(330,335,"wtop","wleft","login.php");