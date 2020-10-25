jQuery(document).ready(function($){

  $("a").bind("focus",function(){if(this.blur)this.blur();});
  $("a.target_blank").attr("target","_blank");

  //return top button
  $('#return_top a').click(function() {
    var myHref= $(this).attr("href");
    var myPos = $(myHref).offset().top;
    $("html,body").animate({scrollTop : myPos}, 1000, 'easeOutExpo');
    return false;
  });
  var topBtn = $('#return_top');
  topBtn.removeClass('active');
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      topBtn.addClass('active');
    } else {
      topBtn.removeClass('active');
    }
  });

  //fixed footer content
  var fixedFooter = $('#fixed_footer_content');
  fixedFooter.removeClass('active');
  $(window).scroll(function () {
    if ($(this).scrollTop() > 330) {
      fixedFooter.addClass('active');
    } else {
      fixedFooter.removeClass('active');
    }
  });
  $('#fixed_footer_content .close').click(function() {
    $("#fixed_footer_content").hide();
    return false;
  });

  //category widget
  $(".tcd_category_list li:has(ul)").addClass('parent_menu');
  $(".tcd_category_list li").hover(function(){
     $(">ul:not(:animated)",this).slideDown("fast");
     $(this).addClass("active");
  }, function(){
     $(">ul",this).slideUp("fast");
     $(this).removeClass("active");
  });

  //custom drop menu widget
  $(".tcdw_custom_drop_menu li:has(ul)").addClass('parent_menu');
  $(".tcdw_custom_drop_menu li").hover(function(){
     $(">ul:not(:animated)",this).slideDown("fast");
     $(this).addClass("active");
  }, function(){
     $(">ul",this).slideUp("fast");
     $(this).removeClass("active");
  });

  //archive list widget
	if ($('.p-dropdown').length) {
		$('.p-dropdown__title').click(function() {
			$(this).toggleClass('is-active');
			$('+ .p-dropdown__list:not(:animated)', this).slideToggle();
		});
	}

  //search widget
	$('.widget_search #searchsubmit').wrap('<div class="submit_button"></div>');
	$('.google_search #searchsubmit').wrap('<div class="submit_button"></div>');

  //tab post list widget
	$('.widget_tab_post_list_button').on('click', 'a.tab1', function(){
    $(this).parents('.widget_tab_post_list_button').children('a.tab2').removeClass('active');
    $(this).addClass('active');
    $(this).parents('.widget_tab_post_list_button').next().show();
    $(this).parents('.widget_tab_post_list_button').next().next().hide();
		return false;
	});
	$('.widget_tab_post_list_button').on('click', 'a.tab2', function(){
    $(this).parents('.widget_tab_post_list_button').children('a.tab1').removeClass('active');
    $(this).addClass('active');
    $(this).parents('.widget_tab_post_list_button').next().hide();
    $(this).parents('.widget_tab_post_list_button').next().next().show();
		return false;
	});

  //comment tab
  $("#trackback_switch").click(function(){
    $("#comment_switch").removeClass("comment_switch_active");
    $(this).addClass("comment_switch_active");
    $("#comment_area").animate({opacity: 'hide'}, 0);
    $("#trackback_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  $("#comment_switch").click(function(){
    $("#trackback_switch").removeClass("comment_switch_active");
    $(this).addClass("comment_switch_active");
    $("#trackback_area").animate({opacity: 'hide'}, 0);
    $("#comment_area").animate({opacity: 'show'}, 1000);
    return false;
  });

  // post list tab
  $(".post_list_tab li").click(function() {
    $(".post_list_tab li").removeClass('active');
    $(this).addClass("active");
    return false;
  });
  $('.post_list_tab li').each(function(i){
    var post_list = '#post_list' + (i+1);
    $(this).click(function () {
      $('#left_col .post_list_wrap').hide();
      $(post_list).show();
    });
  });

  // FAQ
  $('#archive_faq_list .question').click(function(){
    $(this).toggleClass("active");
    $(this).next().slideToggle(600, 'easeOutExpo');
  });

  var mobileMenu = false;

function mediaQueryClass(width) {

 if (width > 1280) { //PC

   //header slider height
   $('#header_slider .item').css('height', width*9/16);

   $("html").removeClass("mobile");
   $("html").addClass("pc");

   mobileMenu = false;

   if($("#mobile_menu").length){
     $("#mobile_menu").remove();
   }

   $("#menu_button").css("display","none");

   $("#global_menu").show();

   $("#global_menu li").hover(function(){
     $(">ul:not(:animated)",this).slideDown("fast");
     $(this).addClass("active");
   }, function(){
     $(">ul",this).slideUp("fast");
     $(this).removeClass("active");
   });

 } else { //smart phone

   //header slider height
   $('#header_slider .item').css('height', width*9/16);

   $("html").removeClass("pc");
   $("html").addClass("mobile");

   var global_menu = $('#global_menu');

   if(mobileMenu != true){
     mobileMenu = true;
     $("#container").after("<div id='mobile_menu'></div>");
     global_menu.clone().appendTo("#mobile_menu");
     $('#mobile_menu').prepend("<div class='close_button'></div>");
   }
   $('#mobile_menu .close_button').on('click', function(e){
     if($('body').hasClass('open_menu')){
       $('body').removeClass('open_menu');
     };
   });

   if (global_menu.css('display') == 'block') {
     global_menu.removeAttr('style');
   }
   if (global_menu.css('display') == 'block') {
     $("ul",global_menu).removeAttr('style');
   }
   global_menu.off('hover');

   $(".child_menu_button").remove();
   $('#global_menu li > ul').parent().prepend("<span class='child_menu_button'><span class='icon'></span></span>");
   $("#global_menu .child_menu_button").on('click',function() {
     if($(this).parent().hasClass("open")) {
       $(this).parent().removeClass("open");
       return false;
     } else {
       $(this).parent().addClass("open");
       return false;
     };
   });

   var menu_button = $('#menu_button');

   menu_button.off();
   menu_button.removeAttr('style');
   menu_button.toggleClass("active",false);

   menu_button.on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $('body').toggleClass('open_menu');

      $('#container').one('click', function(e){
        if($('body').hasClass('open_menu')){
            $('body').removeClass('open_menu');
            return false;
        };
      });
   });

 };
};

function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}

var ww = viewport().width;

//header slider height
$('#header_slider .item').css('height', ww*9/16);
$('#header_slider').css('padding', '0');

mediaQueryClass(ww);

$(window).bind("resize orientationchange", function() {
  var ww = viewport().width;
  mediaQueryClass(ww);
})

});