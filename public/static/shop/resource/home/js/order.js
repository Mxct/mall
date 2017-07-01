$(function () {
    $('section .mzcontainer').on('click',' .order-address-app',function () {
        $('form').attr('id','form');
        document.getElementById('form').reset();
        $('input[type=hidden]').remove();
        area.init('area');
        $('#order-form-add').stop().slideToggle();
    })
    $('.add-re').click(function () {
        $('#order-form-add').stop().slideToggle();
    })
    $('.edit-re').click(function () {
        $('#order-form-add').stop().slideToggle();
    })
    $('.order-address-checkbox-edit').click(function () {
        $('#order-form-add').stop().slideToggle();
    })
    $('section .order-address .order-address-list').on('click','.order-address-checkbox',function () {
        $(this).addClass('selected').siblings().removeClass('selected');
    })
})