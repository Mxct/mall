$(function () {
    $('#tab-btn a').click(function () {
        $('#tab-btn a').eq($(this).index()).addClass('active').siblings().removeClass('active');
        // alert($(this).index());
        $('.table-list').eq($(this).index()).removeClass('hide').siblings('.table-list').addClass('hide');
    })
})