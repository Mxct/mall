/**
 * Created by pc on 2016/12/23.
 */
$(function () {


    var ws_box = document.getElementById("ws_box");//�������
    var ws_slide = document.getElementById("ws_slide");//�ֲ�ͼ��һ������
    var ws_slide_img = document.getElementById("ws_slide_img");//�ֲ�ͼ�ڶ�������
    var divs = ws_slide_img.children;//�ֲ�ͼ
    var arrow = document.getElementById("i");//С��ť������
    var imgWidth = ws_slide.offsetWidth;
    var time = null;//��ʼ��һ����ʱ��

    var hc_nav_bg = document.getElementById("hc_nav_bg");//����������ʾ�ĵ�������
    var ws_meizu_header = document.getElementById("ws_meizu_header");

    //��̬����С��ť
    var arr = [];
    for (var i = 0; i < divs.length; i++) {
        var str = " <i></i>";
        arr.push(str);
    }
    arrow.innerHTML = arr.join("");
    var btn = arrow.children;//��ȡ���е�С��ť
    btn[0].className = "current";
    /*����С��������������ʽ*/
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
    /*��¡ͼƬ*/
    var firstimg = divs[0].cloneNode(true);
    ws_slide_img.appendChild(firstimg);
    /*�Զ��ֲ�����*/
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

    /*����һ����ʱ��*/
    time = setInterval(playNext, 2000);
    /*�������ֹͣ��ʱ��*/
    ws_box.onmouseover = function () {
        clearInterval(time);
    }
    /*����Ƴ���������*/
    ws_box.onmouseout = function () {
        time = setInterval(playNext, 2000);
    }

    /*���������Ӳ㼶͸����*/
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

    //���С��ť��ʽ
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
    /*����ͨ��Ч��*/
//�����ֻ��¼�
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
//�����ֻ��¼�
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
    /*������ѧ*/
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
    /*�������*/
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
    /*�ֻ���ͳһ��ʽ*/
    $(".hc_bg li").mouseenter(function () {
        $(this).animate({opacity:1,left:500},50, function () {
            $(this).siblings().animate({opacity:0.4},10);
        })
    })
    $('.hc_bg').mouseleave(function () {
        $(this).find('li').css({opacity:1});

    })
    //����ѡ��
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
