$(function(){
	$('#J_previewThumb li').eq(0).addClass('current');
	$('#preview .preview-booth a').eq(0).removeClass('hide');
	$('#J_previewThumb li').click(function(){
		$('#J_previewThumb li').eq($(this).index()).addClass('current').siblings().removeClass('current');
		$('#preview .preview-booth a').eq($(this).index()).removeClass('hide').siblings().addClass('hide');
	})
	$('.property-set .property-set-sale .net a').click(function(){
		$(this).eq($(this).parent('dd').children('a').index()).addClass('selected').siblings().removeClass('selected');
		// 弹出价格money和attr
		var attr = $(this).eq($(this).parent('dd').children('a').index()).attr("attr");
		var money = $(this).eq($(this).parent('dd').children('a').index()).attr("money");


		// 总价格
		var saveprice = $('#saveprice').text();
		var net = $('.selected').eq(0).attr('money');
		var color = $('.selected').eq(1).attr('money');
		var memory = $('.selected').eq(2).attr('money');
		var price = $('#J_price').text();
		totle = parseInt(net)+parseInt(color)+parseInt(memory)+parseInt(saveprice);//
		$('#J_price').text(totle);

	});

		/*$('#goodstore').click(function () {
				// 发送数据组合(attr x 3)查询库存并返回
				var gid = $('#J_price').attr('gid')
				var attr1 = $('.selected').eq(0).attr('attr');
				var attr2 = $('.selected').eq(1).attr('attr');
				var attr3 = $('.selected').eq(2).attr('attr');

				// 发送Ajax请求
		           $.get("{:url('/shop/Detail/storeAj')}",{gid:gid,attr1:attr1,attr2:attr2,attr3:attr3},store,'text');
		            // alert('123456');
		        // callback函数/*attr2:attr2,attr3:attr3
			        function store(data)
			        {
			            $('#goodstore').text(data);
			        }
			});*/

	$.each($('.property-set .property-set-sale'),function () {
		$(this).find('.net a').eq(0).addClass('selected');
	})







	//$('.property-set .property-set-sale .color a').click(function(){
		//$('.property-set .property-set-sale .color a').eq($(this).index()).addClass('selected').siblings().removeClass('selected');
//		$('section .container .row .preview').eq($(this).index()).removeClass('changecolor').siblings().addClass('changecolor');
	//})
	$('#detailTabFixed .fixed-container .clearfix li').click(function(){
		//alert(1);
		$('#detailTabFixed .fixed-container .clearfix li').eq($(this).index()).addClass('current').siblings().removeClass('current');
		$('.row .tab-show').eq($(this).index()).show().siblings('.tab-show').hide();
	})
	//弹出收藏模态框
	// $('#J_favorite').click(function () {
	// 	// alert(4);
	// 	$('.model').show();
	// })
	$('#close').click(function () {
		$(this).parents('div').hide();
	})
})
