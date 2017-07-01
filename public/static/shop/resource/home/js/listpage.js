$(function () {
    $('#filter .filter-order a').eq(0).addClass('active');
    $('#good-list ul').eq(0).removeClass('addfix');
    $('#filter .filter-order a').click(function () {
        $('#filter .filter-order a').eq($(this).index()).addClass('active').siblings().removeClass('active');
        $('#good-list ul').eq($(this).index()).removeClass('addfix').siblings().addClass('addfix');
    })
    $('#next').click(function () {
        $('#next').addClass('disabled');
        $('#last').removeClass('disabled');
        $('#silder-warp').addClass('move');
    })
    $('#last').click(function () {
        $('#last').addClass('disabled');
        $('#next').removeClass('disabled');
        $('#silder-warp').removeClass('move');
    })




/*
    $('#shier .fzxb .yucezi').each(function(){
        var $this=$(this);
        var This=$(this).get(0);
        $this.find(".dapai").hover(function(){
            $(this).addClass("active").siblings().removeClass("active");
            var index=$(this).index();
            $(this).closest(".floor").find('.f1').eq(index).show();
            $(this).closest(".floor").find('.f1').eq(index).siblings().hide();
            $(this).closest(".floor").find('.qingcang').show();
        })
    })*/

})