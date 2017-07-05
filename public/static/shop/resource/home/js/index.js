$(function () {
    $('header nav .nav-mid .head-nav ul').hover(function () {
            $('header nav .top-hide').stop().slideToggle();
    })
    $('header nav .nav-mid .head-nav ul .hov').mouseover(function () {
        $('.menu-list').hide().eq($(this).index()).show();
        // alert(1)
        // console.log($(this).index());
    })

    var i=0;
    var timer;
    var timerOut;
    var length = $('.home-slider-items ul li').length;
    // console.log(length);
    timer = setInterval(run,3000);
    function run(){
        i++;
        if(i>4){
            i=0;
        }
        $('.home-slider-items ul li').eq(i).fadeIn(300).siblings().fadeOut();
        focus(i);
    }
    //鼠标放入图片区,图片停止
    $('homeSlider').hover(function(){
        clearInterval(timer);
    },function(){
        timer = setInterval(run,3000);
    })
    //小点变红方法
    function focus(index){
        if(index==length){
            index = 0;
        }
        $('section .homeSlider .circel ul li').eq(index).addClass('first').siblings().removeClass('first');
    }
   // 绑定点击小红点图片移动
    $('section .homeSlider .circel ul li').mouseover(function(){
        var index = $(this).index();
        // console.log(index);
        clearTimeout(timerOut);
        timerOut = setTimeout(function(){
            i=index;
            $('.home-slider-items ul li').eq(i).fadeIn(300).siblings().fadeOut();
            focus(index);
        },250)
    });
    //绑定左右按钮控制移动
    $('section .homeSlider .middle .move .moveright').click(function(){
        clearTimeout(timerOut);
        timerOut = setTimeout(function(){
            run();
        },200)
    })
    $('section .homeSlider .middle .move .moveleft').click(function(){
        clearTimeout(timerOut);
        timerOut= setTimeout(function(){
            i--;
            if(i<0){
                i=length-1;
            }
            $('.home-slider-items ul li').eq(i).fadeIn(300).siblings().fadeOut();
            focus(i);
        },200)
    })
})
