
	window.onload = function(){
		var oLi = tou.getElementsByTagName('li');
		var lie = document.getElementsByClassName('zuida');
		var ko = kao.getElementsByTagName('div')
		
//		alert(ko.length)
		tan.onmouseover = function(){
			for(var i=0;i<ko.length;i++){
//					ko[i].index = i;
//					for(var i=0;i<ko.length;i++){
//						ko[i].style.opacity = '0.2';
//					}
					ko[i].style.opacity = '1';
				}
		}
		
		var n=0;
		var timer = null;
		for(var i=1;i<5;i++){
			oLi[i].onmouseover = function(){
				for(var i =0;i<lie.length;i++){
					lie[i].style.transform = 'translateX(0px)'
				}
				clearInterval(timer);
				timer = setInterval(function(){
					n+=4;
					box.style.height = n+'px';
					if(n>=200){
						n=200;
						clearInterval(timer)
					for(var i = 0;i<lie.length;i++){
						lie[i].style.opacity = '1'
						lie[i].style.transform = 'translateX(-50px)' 
						lie[i].style.transition = '2s'
					}
					
					}
					
				},10)
				n=0;
				for(var i = 0;i<lie.length;i++){
//						lie[i].style.transform = 'translateX(0)'
						lie[i].style.opacity = '0'
					}
			}
			oLi[i].onmouseout = function(){
				box.style.height = '200px';
				
			}
			box.onmouseover = function(){
				box.style.height = '200px';
				box.style.opacity = '1'
				for(var i = 0;i<lie.length;i++){
						lie[i].style.transform = 'translateX(-50px)' 
						lie[i].style.transition = '1.5s'
				}
				
			}
			box.onmouseout = function(){
				box.style.height = '0'
				for(var i = 0;i<lie.length;i++){
//					lie[i].style.transform = 'translateX(0px)' 
					lie[i].style.transition = '0.1s'
					lie[i].style.opacity = '0'
				}
			}
			}
//		}
	}