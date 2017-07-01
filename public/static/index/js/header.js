
	window.onload=function(){
		var oli = document.getElementById('tou').children;
			var tu = document.getElementById('hezi').children;
			for(var i = 1; i < 5; i++) {
				oli[i].index = i;
				oli[i].onmousemove = function() {
					$("#hezi").slideDown('30');
					for(var i = 1; i < 5; i++) {
						tu[i].style.animation = '';
						tu[i].style.display = 'none';
					}
					tu[this.index].style.display = 'block';
					tu[this.index].style.animation = '2s forwards ease 1 diyi';
				}
				$("#hezi").hover(function() {
					hezi.style.display = 'block';
				}, function() {
					hezi.style.display = 'none'
				})
			}
			var ddl = document.getElementById('dl')
			ddl.onmouseover = function(){
				this.style.background = '#fff';
				this.style.borderTop = '2px solid #007AFF';
//				this.style.borderLeft = '2px solid #007AFF';
				this.style.borderLeft = '1px solid #ccc';
				this.style.borderRight = '1px solid #ccc';
			}
			ddl.onmouseout = function(){
				this.style.background = '';
				this.style.borderTop = '';
				this.style.borderLeft = '';
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
	}