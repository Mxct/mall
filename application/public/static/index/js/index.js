/**
 * Created by pc on 2016/12/23.
 */
$(function () {


    var ws_box = document.getElementById("ws_box");//外层大盒子
    var ws_slide = document.getElementById("ws_slide");//轮播图第一父盒子
    var ws_slide_img = document.getElementById("ws_slide_img");//轮播图第二父盒子
    var divs = ws_slide_img.children;//轮播图
    var arrow = document.getElementById("i");//小按钮父盒子
    var imgWidth = ws_slide.offsetWidth;
    var time = null;//初始化一个定时器

    var hc_nav_bg = document.getElementById("hc_nav_bg");//鼠标移入才显示的导航盒子
    var ws_meizu_header = document.getElementById("ws_meizu_header");

    //动态创建小按钮
    var arr = [];
    for (var i = 0; i < divs.length; i++) {
        var str = " <i></i>";
        arr.push(str);
    }
    arrow.innerHTML = arr.join("");
    var btn = arrow.children;//获取所有的小按钮
    btn[0].className = "current";
    /*设置小方块的鼠标移入样式*/
    for (var j = 0; j < btn.length; j++) {
        btn[j].index = j;
        btn[j].onmouseover = function () {
            if (btn[j] == 5 || btn[j] == 3) {
                $('.hc_nav_a').css({
                    color: "#ffffff"
                })
                $('#ws_logo').attr("src",'images/logo-new_774b3e9.png');
            } else {
                $('.hc_nav_a').css({
                    color: "#666666"
                })
                $('#ws_logo').attr("src",'images/logo-new_294da7f.png');
            }
            remove();
            this.className = "current";
            var index = this.index;
            var target = index * -imgWidth;
            startMove(ws_slide_img, target);
        }
    }
    /*克隆图片*/
    var firstimg = divs[0].cloneNode(true);
    ws_slide_img.appendChild(firstimg);
    /*自动轮播函数*/
    var square = 0;
    var pic = 0;
    var ws_logo = $('#ws_logo').attr("src");
    console.log(ws_logo);
    function playNext() {
        if (pic == divs.length - 1) {
            pic = 0;
            ws_slide_img.style.left = '0px';
        }
        pic++;
        startMove(ws_slide_img, -imgWidth * pic);
        if (square < btn.length - 1) {
            square++;
        } else {
            square = 0;
        }
        if (square == 5 || square == 3) {
            $('.hc_nav_a').css({
                color: "#ffffff"
            })
            $('#ws_logo').attr("src",'images/logo-new_774b3e9.png');
        } else {

            $('.hc_nav_a').css({
                color: "#666666"
            })
            $('#ws_logo').attr("src",'images/logo-new_294da7f.png');
        }
        remove();
        btn[square].className = 'current';
    }

    /*开启一个定时器*/
    time = setInterval(playNext, 2000);
    /*鼠标移入停止定时器*/
    ws_box.onmouseover = function () {
        clearInterval(time);
    }
    /*鼠标移出开启动画*/
    ws_box.onmouseout = function () {
        time = setInterval(playNext, 2000);
    }

    /*缓动函数加层级透明度*/
    function startMove(obj, target) {
        clearInterval(obj.time)
        obj.time = setInterval(function () {
            var speed = obj.offsetLeft;
            speed = (target - speed) / 10;
            speed = speed > 0 ? Math.ceil(speed) : Math.floor(speed);
            if (obj.style.left != target) {
                obj.style.left = obj.offsetLeft + speed + 'px';
            } else {
                console.log(123);
                clearInterval(obj.time);

            }
        }, 20)
    }

    //清除小按钮样式
    function remove() {
        for (var k = 0; k < btn.length; k++) {
            btn[k].className = "";
        }
    }

    $(function () {
        $(".footer-t-right p:eq(0)").css({
            "fontSize": 12,
            "lineHeight": "24px"
        });
        $(".footer-t-right p:eq(1)").css({
            "fontSize": 28,
            "lineHeight": "40px"
        });
    })
    /*顶部通栏效果*/
//魅族手机事件
    $("#ws_meizu_header").on("mouseenter", "#ws_nav1,#ws_bg4", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().show();
        $("#ws_bg4").stop().slideDown();
        $('.hc_nav_a').css({
            color: "#666"
        })
        clearInterval(time);
    })
    $("#ws_meizu_header").on("mouseleave", "#ws_nav1,#ws_bg4", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().hide();
        $("#ws_bg4").stop().slideUp(30);
        time = setInterval(playNext,2000)
    })
//魅蓝手机事件
    $("#ws_meizu_header").on("mouseenter", "#ws_nav2,#ws_bg1", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().show();
        $("#ws_bg1").stop().slideDown();
        $('.hc_nav_a').css({
            color: "#666"
        })
        clearInterval(time);
    })
    $("#ws_meizu_header").on("mouseleave", "#ws_nav2,#ws_bg1", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().hide();
        $("#ws_bg1").stop().slideUp(30)
        time = setInterval(playNext,2000);
    })
    /*魅族声学*/
    $("#ws_meizu_header").on("mouseenter", "#ws_nav3,#ws_bg2", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().show();
        $("#ws_bg2").stop().slideDown();
        $('.hc_nav_a').css({
            color: "#666"
        })
        clearInterval(time);
    })
    $("#ws_meizu_header").on("mouseleave", "#ws_nav3,#ws_bg2", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().hide();
        $("#ws_bg2").stop().slideUp(30)
        time = setInterval(playNext,2000);
    })
    /*智能配件*/
    $("#ws_meizu_header").on("mouseenter", "#ws_nav4,#ws_bg3", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().show();
        $("#ws_bg3").stop().slideDown();
        $('.hc_nav_a').css({
            color: "#666"
        })
        clearInterval(time);
    })
    $("#ws_meizu_header").on("mouseleave", "#ws_nav4,#ws_bg3", function (e) {
        e.stopPropagation();
        $("#hc_nav_bg").stop().hide();
        $("#ws_bg3").stop().slideUp(30);
        time = setInterval(playNext,2000);
    })
    /*手机内统一样式*/
    $(".hc_bg li").mouseenter(function () {
        $(this).animate({opacity:1,left:500},50, function () {
            $(this).siblings().animate({opacity:0.4},10);
        })
    })
    $('.hc_bg').mouseleave(function () {
        $(this).find('li').css({opacity:1});

    })
    //语言选择
        $("#hc_regionBtn").click(function () {
            $("#hc_region").show();
            $("#hc_region_bg").show();
            $("body").css({
                "overflow-y":"hidden"
            })
        })
        $(".region-input-content ul li").mouseenter(function () {
            $(this).css({
                "backgroundColor": "#f4f4f4"
            })
        })
        $(".region-input-content ul li").mouseleave(function () {
            $(this).css({
                "backgroundColor": ""
            })
        })
        $("#closeBtn").click(function () {
            $("#hc_region").hide();
            $("#hc_region_bg").hide();
            $("body").css({
                "overflow-y":"scroll"
            })
        })

})
