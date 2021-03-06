<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>管理员登陆</title>
	</head>
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/login.css" />
	    <script>
	    	window.onload = function(){
	    		var oDiv = document.getElementById('main_div');
	    		var H =0;
	    		H = document.documentElement.clientHeight || document.body.clientHeight;
	    		oDiv.style.height = H +'px';
	    	}
	    </script>
	<body>
		<div class="div_bg" id="main_div">
		
		   <div class="login_div">
		   	<form action="<?php echo U('Login/doLogin');?>" onsubmit="return $.sub(this);" method="post">
		      <h3>eBlog管理员登陆</h3>
		      <div class="login_yhm">
		      	<label for="yhm">用户名：</label>
		      	<input type="text" name="username" id="yhm"  />
		      </div>
		      <div class="login_yhm">
		      	<label for="psw">密码：</label>
		      	<input type="password" name="password" id="psw" />
		      </div>
		      <div class="login_yzm">
		      	<label for="yzm">验证码：</label>
		      	<input type="text" name="code" id="yzm" />
		      		<img src="<?php echo U('Login/verify');?>" class="img_change" width="110px" height="35px" style="vertical-align: middle;" />    	
		      </div>
		      
		      <div class="login_dl">
		      	<button>登录</button>
		      </div>
		    </form>  
		   </div>
	        
		</div>
		
		<!--basic javascript-->
		<!--[if !IE]-->
		<script>
			window.jQuery || document.write("<script src='/Public/AdminStyle/js/jquery.2.1.4.js'>"+"<"+"/script>");
		</script>
		<!--<![endif]-->
		<!--[if IE]>
			winddow.jQuery ||document.write("<script src='/Public/AdminStyle/js/jquery.1.11.3.js'>"+"<"+"/script>");
		<![endif]-->
		<script>
		$(function(){
			$.extend({
				changeVerify:function(){
					var url = $('.img_change').attr('src');
					if(url.indexOf('?')>0){
						url = url.substr(0,url.indexOf('?'));
					}
					url = url + '?' + parseInt(Math.random()*1000);
					$('.img_change').attr('src',url);
				},
				sub:function(obj){
					var obj = $(obj);
			    	$.ajax({
			    		type:"post",
			    		url:obj.attr('action'),
			    		data:obj.serialize(),
			    		success:function(response){
			    			if(response.code > 0){
			    				window.location.href=response.url;
			    			}else{
			    				alert(response.msg);
			    				$.changeVerify();
			    			}	
			    		}
			    	});			
			    	return false; //返回false，阻止直接跳转到提交页面，使其运行success里面的
			    }
			});
			   
			$('.img_change').click(function(){
				$.changeVerify();
			});
			
		});
		</script>
	</body>
</html>