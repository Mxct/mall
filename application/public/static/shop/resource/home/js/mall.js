$(function () {
    $('header nav .nav-mid .head-nav ul').hover(function () {
            $('header nav .top-hide').stop().slideToggle();
    })
    $('header nav .nav-mid .head-nav ul li').mouseover(function () {
        $('.menu-list').hide().eq($(this).index()).show();
        // alert(1)
        // console.log($(this).index());
    })
    $(".ming").hover(function(){
    	$(this).find(".category-nav-children").css("display","block");
    	$(this).find(".category-nav-link").css("background","white");
    },function(){
    	$(this).find(".category-nav-children").css("display","none");
    	$(this).find(".category-nav-link").css("background","#f8f7f7");
    })
})