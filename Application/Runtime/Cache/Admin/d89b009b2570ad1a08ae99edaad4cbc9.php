<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>eBlog管理系统</title>
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/fontstyle.css" />
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/admin.css" />	
		<link rel="stylesheet" type="text/css" href="/Public/AdminStyle/css/catemanacomon.css" />
		
		
		<link rel="stylesheet" href="/Public/AdminStyle/css/articleComon.css" />

		<script>
			window.onload = function(){
				//切换登录显示当中箭头的旋转
				var oDiv = document.getElementById('login_status');
				var oDiv2 = document.getElementById('linght_white');
				var oJt = document.getElementById('jt');
				var b = true;
				oDiv.onmouseover = function(e){
					if(b){
						oDiv2.style.display = 'block';
						oJt.className = 'icon-circle-up';
						b = false;
					}else{
						oDiv2.style.display = 'none';
						oJt.className = 'icon-circle-down';
						b=true;
					}
				}
				oDiv.onmouseout = function(){
					oDiv2.style.display = 'none';
					oJt.className = 'icon-circle-down';
					b=true;
				}
				//设置左边栏和主体的高度
				var H =0;
	    		H = document.documentElement.clientHeight || document.body.clientHeight;
	    		h = oDiv.offsetHeight;
	    		var oSide =  document.getElementById('sidebar');
	    		var oCont = document.getElementById('admin_main');	    		
	    		oSide.style.height = H -h+'px';
	    		oCont.style.height = H -h +'px';			
			}
		</script>
	</head>
	<body>
		<!-- 头部 -->
			<div id="header" class="header">
	<div class="heder_title">
		<span class="icon-github2"></span>
		eBlog内容管理系统
	</div>
        	<ul id="login_status" class="login_status">
        		<li id="linght_blue" class="linght_blue">
        			<img src="/Public/AdminStyle/css/img/user-icon.jpg" class="user-icon"/>
	        		<span class="login_info">
	        			<small>欢迎回来</small>
	        			<?php echo session('admin.username');?>
	        		</span>
	        		<span id="jt" class=" icon-circle-down"></span>
	        		<div id="linght_white" class="linght_white">	
	        		     <div class="ara"></div>
		        	     <p>
		        	     	<span class=" icon-lock"></span>
		        	    	 <span onclick="$.dialog('<?php echo U('Admin/Manager/editMana');?>',this)"">修改密码</span>
		        	     </p>
		        	     <hr class="_hr"/>
		        	      <p>
		        	     	<span class="icon-switch"></span>
		        	    	<span><a href="<?php echo U('Login/logOut');?>">退出登陆</a></span>
		        	     </p>
	        		</div>
        		</li>
        	</ul>
      </div> 
		<!-- /头部 -->
		
        <div class="admin_content">
        	
        	<!--侧边栏-->	
	      	
		<div class="sidebar" id="sidebar">
	      	  	<ul class="side_nav">
	      	  		<li>
	      	  			<a href="<?php echo U('Admin/Index/index');?>" <?php if(article == 'index'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-home"></span>
	      	  				<span>控制台</span>
	      	  			</a> 		
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'article'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-bookmarks"></span>
	      	  				<span>文章管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Article/listArticle');?>">文章列表</a></li>
	      	  				<li><a href="<?php echo U('Admin/Article/addArticle');?>">发表文章</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'category'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-list"></span>
	      	  				<span>分类管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Category/listCategory');?>">所有分类</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'manager'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-users"></span>
	      	  				<span>用户管理</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Manager/listManager');?>">用户列表</a></li>
	      	  			</ul>
	      	  		</li>
	      	  		<li>
	      	  			<a href="javascript:;" <?php if(article == 'websetting'): ?>class="side_menu active"<?php else: ?>class="side_menu"<?php endif; ?>>
	      	  				<span class="icon-cogs"></span>
	      	  				<span>系统设置</span>
	      	  				<b class="icon-plus"></b>
	      	  			</a>
	      	  			<ul class="nav_menu">
	      	  				<li><a href="<?php echo U('Admin/Websetting/info');?>">基础设置</a></li>
	      	  			</ul>
	      	  		</li>
	      	  	</ul>
</div>

			<!--/侧边栏-->
			
	      	<div class="admin_main" id="admin_main">
	      		<!--面包悄导航-->
	      	  	  <div class="main_header">
	      	  	  	<span class="icon-home"></span>
	      	  	  	<a href="#">首页</a>
	      	  	  	<span>></span>
	      	  	  	
	<span>文章列表</span>

	      	  	  </div>
	      	  	  <!--/面包悄导航-->
	      	  	  
	      	  	  <!--主体内容-->
	      	  	  
    <div class="main_content">
       <div class="article_search">
       	 <form method="post" action="<?php echo U('Admin/Article/listArticle');?>">
       	 <input type="hidden" value="1" name="search" />
       	 <span>搜索</span>
       	 分类：
       	 <select name="cate">
       	 	<option value="none">none</option>
       	 	 <?php foreach($category as $key => $val): ?>
       	 	<option value="<?php echo ($val["id"]); ?>"><?php echo ($val["catename"]); ?></option>
       	 	 <?php foreach($val['child'] as $k =>$v): ?>
       	 	<option style="color: dimgray;" value="<?php echo ($v["id"]); ?>">└─<?php echo ($v["catename"]); ?></option>
       	 	<?php endforeach ?>
       	 	<?php endforeach ?>
       	 </select>
       	作者：
       	  <select name="auth">
       	  	<option value="none">none</option>
       	  	 <?php foreach($manager as $key => $vv): ?>
		       	<option value="<?php echo ($vv["username"]); ?>"><?php echo ($vv["username"]); ?></option>
		     <?php endforeach ?>
       	 </select>
       	标题： <input type="text" name="searchname" />
       	<button type="submit">提交</button>
       	</form>
       </div>
       <table class="article_table">
       	  <tr>
       	  	<th>ID</th>
       	  	<th width="10%">分类</th>
       	  	<th width="10%">作者 </th>
       	  	<th>标题</th>
       	  	<th>日期</th>
       	  	<th>操作</th>
       	  </tr>
       	 <?php foreach ($data as $key => $value): ?>
       	  <tr>
       	  	<td><?php echo ($value["id"]); ?></td>
       	  	<td><?php echo ($value["catename"]); ?></td>
       	  	<td><?php echo ($value["author"]); ?></td>
       	  	<td class="stitle"><?php echo ($value["title"]); ?></td>
       	  	<td><?php echo ($value["time"]); ?></td>
       	  	<td class="sicon">
       	  		<a href="<?php echo U('Admin/Article/editArticle',array('id'=>$value['id']));?>"><span class="icon-pencil"></span></a>
       	  		<a href="javascript:;" onclick="$.del('<?php echo U('Admin/Article/delArticle', array('id'=>$value['id']));?>');"><span class="icon-bin"></span></a>
       	  	</td>
       	  </tr>
       	  <?php endforeach ?>
       </table>
       <div class="page">
       	<?php echo ($page); ?>
       </div>
    </div>

	      	  	  <!--/主体内容-->
	      	</div>
      </div>
      <!--basic javascript-->
      <!--[if !IE]-->
        <script>
        	window.jQuery || document.write("<script src='/Public/AdminStyle/js/jquery.2.1.4.js'>"+"<"+"/script>")
        </script>
      <!--<![endif]-->
      <!--[if IE]>
      	<script>
      		window.jQuery || document.write("<script src='/Public/AdminStyle/js/jquery.1.11.3.js'>"+"<"+"/script>")
      	</script>
      <![endif]-->
        
         <script src="/Public/AdminStyle/js/transmenu.js" type="text/javascript"></script>  
         <script src="/Public/AdminStyle/js/dialog.js" type="text/javascript"></script>  
      
      

	</body>
</html>