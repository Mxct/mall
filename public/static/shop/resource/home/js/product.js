$(function(){
	$('#J_previewThumb li').eq(0).addClass('current');
	$('#preview .preview-booth a').eq(0).removeClass('hide');
	$('#J_previewThumb li').click(function(){
		$('#J_previewThumb li').eq($(this).index()).addClass('current').siblings().removeClass('current');
		$('#preview .preview-booth a').eq($(this).index()).removeClass('hide').siblings().addClass('hide');
	})
	$('.property-set .property-set-sale .net a').click(function(){
		$(this).eq($(this).parent('dd').children('a').index()).addClass('selected').siblings().removeClass('selected')
	});
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
