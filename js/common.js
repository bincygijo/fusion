function logoAnimation() {
	$("#logo-bar").animate({opacity:1},3000).animate({marginLeft:"200px"},3000);
	$("#logo-bar").animate({marginLeft:"-50px"},2000);
	$("#logo-bar2").animate({opacity:1},3000).animate({marginLeft:"200px"},2000);
	$("#logo-bar2").animate({marginLeft:"-50px"},4000);
	$("#logo").animate({opacity:1},3000);
	$("#logo").fadeTo("fast", 0.5);
	$("#logo").fadeTo("slow", 0.8);
	$("#logo").fadeTo("slow", 0.6);
	$("#logo").fadeTo("slow", 0.75);
	$("#logo").fadeTo("slow", 0.9);
	$("#logo").fadeTo("slow", 1);
	$("#logo").animate({opacity:1},3000);
	t = setTimeout("logoAnimation()", 1000);
}

function showContent(page) {
	$("#main-"+page).show();
	$("#side-"+page).show();
}


function mycarousel_initCallback(carousel) {
	
   $('#gallery-next').bind('click', function() {
		 alert("hi");
     	carousel.next();
		//alert(carousel.next);
      return false;
	});
	$('#gallery-previous').bind('click', function() {
		carousel.prev();
		return false;
	});
};


$(document).ready(function(){

	$("#header-nav a").attr("href", "#");
	$("#header-nav a").click(function() {
		$(".main").hide();
		$(".side").hide();
	});
	$("#header-nav a#home-link").click(function() {showContent("home");});
	$("#header-nav a#listings-link").click(function() {showContent("listings");});
	$("#header-nav a#tickets-link").click(function() {showContent("tickets");});
	$("#header-nav a#gallery-link").click(function() {showContent("gallery");});
	$("#header-nav a#membership-link").click(function() {showContent("membership");});
	$("#header-nav a#our-friends-link").click(function() {showContent("our-friends");});
	
	$("#header-nav img.standard").mouseover(function(){
		$(this).animate({
			height:"25px",
			marginRight:"25px"
		}, 200);
		t = $(this);
		t.attr('src', t.attr('src').replace('nav','nav_large'));
	});
	$("#header-nav img.standard").mouseout(function(){
		$(this).animate({
			height:"21px",
			marginRight:"35px"
		}, 200);
		t = $(this);
		t.attr('src', t.attr('src').replace('nav_large','nav'));
	});
	$("#header-nav img.last").mouseover(function(){
		$(this).animate({height:"25px"}, 200);
		t = $(this);
		t.attr('src', t.attr('src').replace('nav','nav_large'));
	});
	$("#header-nav img.last").mouseout(function(){
		$(this).animate({height:"21px"}, 200);
		t = $(this);
		t.attr('src', t.attr('src').replace('nav_large','nav'));
	});
	
	logoAnimation();
//	$("#main-home").show();
//	$("#side-home").show();
	
	$('.thumbs a').lightBox();
	
 	$('#slides').jcarousel({
		initCallback: mycarousel_initCallback,
		buttonNextHTML: null,
		buttonPrevHTML: null,
		scroll: 1,
		start: 1
	});
	
});