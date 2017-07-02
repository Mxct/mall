window.onload=function(){
	crl_input.onclick=function(){
		this.placeholder=''
	}
	var crl_w_r=document.getElementById('crl_w_r');
	var crl_h3=crl_w_r.getElementsByTagName('h3');
	var crl_p=crl_w_r.getElementsByTagName('p');
	var crl_li=document.getElementById('crl_w').children;
	var crl_show=crl_w_r.children;
	var tr=true;
//	alert(crl_h3.length)
	for(var i=0;i<crl_h3.length;i++){
		crl_h3[i].index=i;
		crl_h3[i].onclick=function(){
             if(tr){
             	tr=!tr;
             	crl_p[this.index].style.display='block';
             	
             }else{
             	tr=!tr;
             	crl_p[this.index].style.display='none';
             }
          
			
		}
	}
	for(var i=0;i<crl_li.length;i++){
		crl_li[i].index=i;
		crl_li[i].onclick=function(){
            for(var i=0;i<crl_li.length;i++){
             	crl_show[i].className=''
            }
			crl_show[this.index].className='show'
		}
	}
	//头
	var oli = document.getElementById('tou').children;
			var tu = document.getElementById('hezi').children;
			for(var i=1;i<5;i++){
			oli[i].index=i;
			oli[i].onmousemove=function(){
				$("#hezi").slideDown('30');
				for(var i = 1; i < 5; i++) {
					tu[i].style.animation = '';
					tu[i].style.display='none';
			    }
				tu[this.index].style.display='block';
				tu[this.index].style.animation = '2s forwards ease 1 diyi';
			}
			$("#hezi").hover(function(){
				hezi.style.display = 'block';
			},function(){
				hezi.style.display = 'none'
			})
		}
			var ddl = document.getElementById('dl')
			ddl.onmouseover = function(){
				this.style.background = '#fff';
				this.style.borderTop = '2px solid #007AFF';
				this.style.borderRight = '1px solid #ccc';
			}
			ddl.onmouseout = function(){
				this.style.background = '';
				this.style.borderTop = '';
				this.style.borderRight = '';
			}
			quan.onmouseover = function(){
				dt.style.display = 'block';
				ddl.style.background = '#fff';
				ddl.style.borderTop = '2px solid #007AFF';
				ddl.style.borderRight = '1px solid #ccc';
				
			}
			quan.onmouseout = function(){
				dt.style.display = 'none';
				ddl.style.background = '';
				ddl.style.borderTop = '';
				ddl.style.borderRight = '';
			}
	
	//底部
	weix.onmouseover=function(){
		tuewm.style.display='block'
	}
	weix.onmouseout=function(){
		tuewm.style.display='none'
	}
}
