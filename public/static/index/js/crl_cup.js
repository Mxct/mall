window.onload=function(){
	//选项卡切换
	var crl_content=document.getElementById('crl_content');
	var cont_head=document.getElementById('cont_head');
	var crl_li=cont_head.getElementsByTagName('li');
	var crl_div=document.getElementById('crl_cont').children;
	for(var i=0;i<crl_li.length;i++){
		crl_li[i].index=i;
		crl_li[i].onclick=function(){
			for(var i=0;i<crl_li.length;i++){
				crl_li[i].className='';
				crl_div[i].style.display='none';
			}
			a=this.index;
			this.className='active';
			crl_div[a].style.display='block';
		}
	}
	//滚动出现
	var atop=xiding.offsetTop;
window.onscroll = function(){
	var a=0;
	var scroll=document.body.scrollTop || document.documentElement.scrollTop;
	if(scroll<277){
		crl_pot.style.opacity='0'
	}
	if(scroll>277){
		$('#crl_pot').slideDown(700)
		crl_pot.style.opacity='0.9'
	}
	if(scroll>555){
		zong.style.right='0'
	}else if(scroll<555){
		zong.style.right='-120px'
	}
	if(atop<=scroll){
		xiding.style.position='fixed';
		xiding.style.height='60px'
		xiding2.style.display='block';
	}else{
		xiding.style.position='';
		xiding.style.height='62px'
		xiding2.style.display='none';
	}
	
};
//   图片详细
var de_l_bottom=document.getElementById('de_l_bottom').children;
	var crl_xian=document.getElementById('crl_xian');
	var crl_aimg=['img/cup/cup_1.jpg','img/cup/da_1.jpg','img/cup/da_2.jpg','img/cup/da_3.jpg']
	for(var i=0;i<de_l_bottom.length;i++){
		de_l_bottom[i].index=i;
		de_l_bottom[i].onclick=function(){
			for(var i=0;i<de_l_bottom.length;i++){
				de_l_bottom[i].className='';
			}
			
			this.className='active';
			crl_xian.src=crl_aimg[this.index];
		}
		
	}
	//数量加减
	var jj=1
	jia.onclick=function(){
		jj++;
		jia_input.value=jj;
		if(jj>1){
			crl_xia.style.color='#666'
		}
	}
	crl_xia.onclick=function(){
		jj--;
		jia_input.value=jj;
		if(jj<2){
			crl_xia.style.color='#e0e0e0';
			jia_input.value='1';
			jj=1
			return false;
		}
		
	}
	//  底部
	var crl_wx_a=document.getElementById('crl_wx_a');
	    var timer = null;
			crl_wx_a.onmouseover = function(){
				cc_wx_pic.style.display = 'block';
			}
			crl_wx_a.onmouseout = function(){
				clearTimeout(timer);
				timer = setTimeout(function(){
					cc_wx_pic.style.display = 'none';
				},500);
			}
			cc_wx_pic.onmouseover = function(){
				clearTimeout(timer);
				this.style.display = 'block';
			}
			cc_wx_pic.onmouseout = function(){
				this.style.display = 'none';
			}
		//头
					var oli = document.getElementById('tou').children;
			var tu = document.getElementById('hezi').children;
			for(var i=0;i<5;i++){
			oli[i].index=i;
			oli[i].onmousemove=function(){
//				alert(5)
				$("#hezi").slideDown('100');
				for(var i = 0; i < 5; i++) {
					tu[i].style.animation = '';
					tu[i].style.display='none';
			    }
				tu[this.index].style.display='block';
				tu[this.index].style.animation = '2s forwards ease 1 diyi';
			}
		}
			$("#hezi").hover(function(){
				hezi.style.display = 'block';
			},function(){
				hezi.style.display = 'none'
			})
}
