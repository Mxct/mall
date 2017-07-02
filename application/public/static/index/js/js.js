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
	//颜色分类
	var de_l_top=document.getElementById('de_l_top').children;
	var crl_color=document.getElementById('crl_color').children;
	var crl_dede=document.getElementById('crl_dede').children;
	for(var i=0;i<crl_color.length;i++){
		crl_color[i].index=i;
		crl_color[i].onclick=function(){
			for(var i=0;i<crl_color.length;i++){
				crl_color[i].className='';
				de_l_top[i].style.display='none';
				crl_dede[i].style.display='none';
			}
			this.className='active';
			de_l_top[this.index].style.display='block';
			crl_dede[this.index].style.display='block';
		}
		
	}
	var de_l_bottom=document.getElementById('de_l_bottom').children;
	var crl_xian=document.getElementById('crl_xian');
	var crl_xian2=document.getElementById('crl_xian2');
	var crl_xian3=document.getElementById('crl_xian3');
	var de_l_bo2=document.getElementById('de_l_bottom2').children;
	var de_l_bo3=document.getElementById('de_l_bottom3').children;
	var crl_aimg=['img/MX6_1.jpg','img/MX6_xian2.jpg','img/MX6_xian3.jpg','img/MX6_xian4.jpg']
	var crl_aimg2=['img/MX6_jin.jpg','img/jin_1.jpg','img/jin_2.jpg','img/jin_3.jpg']
	var crl_aimg3=['img/MX6_yin.jpg','img/yin_1.jpg','img/yin_2.jpg','img/yin_3.jpg']
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
	for(var i=0;i<de_l_bo2.length;i++){
		de_l_bo2[i].index=i;
		de_l_bo2[i].onclick=function(){
			for(var i=0;i<de_l_bo2.length;i++){
				de_l_bo2[i].className='';
			}
			
			this.className='active';
			crl_xian2.src=crl_aimg2[this.index];
		}
		
	}
	for(var i=0;i<de_l_bo3.length;i++){
		de_l_bo3[i].index=i;
		de_l_bo3[i].onclick=function(){
			for(var i=0;i<de_l_bo3.length;i++){
				de_l_bo3[i].className='';
			}
			
			this.className='active';
			crl_xian3.src=crl_aimg3[this.index];
		}
		
	}
	
	//容量
	var crl_rong=document.getElementById('crl_rong').children;
	for(var i=0;i<crl_rong.length;i++){
		crl_rong[i].index=i;
		crl_rong[i].onclick=function(){
			for(var i=0;i<crl_rong.length;i++){
				crl_rong[i].className='';
			}
			this.className='active';
		}
		
	}
	//套餐
	var crl_tao=document.getElementById('crl_tao').children;
	for(var i=0;i<crl_tao.length;i++){
		crl_tao[i].index=i;
		crl_tao[i].onclick=function(){
			for(var i=0;i<crl_tao.length;i++){
				crl_tao[i].className='';
			}
			this.className='active';
		}
		
	}

	//滚动出现
	var atop=xiding.offsetTop;
	var crl_pot=document.getElementById('crl_pot')
window.onscroll = function(){
	var a=0;
	var scroll=document.body.scrollTop || document.documentElement.scrollTop;
	if(scroll<223){
		crl_pot.style.opacity='0'
	}
	if(scroll>223){
		$('#crl_pot').slideDown(700)
		crl_pot.style.opacity='0.9'
	}
	if(scroll>783){
		zong.style.right='0'
	}else if(scroll<783){
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
	
}
//底部
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
