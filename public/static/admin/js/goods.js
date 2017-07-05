$(function(){
// 商品名称
	$('#gname').focus(function(){
		$('#gnamets').text('√');
	}).blur(function(){
		if($(this).val().length==0){
			$('#gnamets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	});
// 所属分类
	$('#pid').focus(function(){
		$('#pidts').text('√');
		if($('#pid').val() == 0){
			$('#pidts').text('请选择分类');
		}
		if($('#gname').val().length==0){
			$('#gnamets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	}).blur(function(){
		if($('#pid').val() == 0){
			$('#pidts').text('请选择分类');
		}else{
			$('#pidts').text('√');
		}
	});
// 价格
	$('#price').focus(function(){
		$('#pricets').text('√');
		if($('#pid').val() == 0){
			$('#pidts').text('请选择分类');
		}
		if($('#gname').val().length==0){
			$('#gnamets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	}).blur(function(){
		if($(this).val().length==0){
			$('#pricets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	});
// 库存
	$('#num').focus(function(){
		$('#numts').text('√');
		if($('#pid').val() == 0){
			$('#pidts').text('请选择分类');
		}
		if($('#gname').val().length==0){
			$('#gnamets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
		if($('#price').val().length==0){
			$('#pricets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	}).blur(function(){
		if($(this).val().length==0){
			$('#numts').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	});
// 状态
	$('#status').focus(function(){
		$('#statusts').text('√');
		if($('#pid').val() == 0){
			$('#pidts').text('请选择分类');
		}
		if($('#gname').val().length==0){
			$('#gnamets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
		if($('#price').val().length==0){
			$('#pricets').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
		if($('#num').val().length==0){
			$('#numts').text('不能为空').css('color','red').css('line-height','50px');
			uboor=false;
		}
	}).blur(function(){
		$('#statusts').text('√');
	});
});