<?php
class error404View extends View{
	public function runApp()
	{
	$this->setTittle('404-页面不存在');
	$this->showHead();
	echo '<div>
		<!--logo -->
		<div id="site-logo">
		<img src="res/logo.jpg" alt="logo"/><br/>
		</div>
		
		<!--主导航栏标题 -->
	    <div id="main-nav-b1">404错误</div>
		
		<!--错误提示区 -->
		<div class="top-info">
			<p class="txt-warning3">抱歉，您访问的资源不存在！<br/></p>
		</div>
			  
	</div>';
	echo '<div class="module-content">请您输入的网址尝试重新访问，如果问题持续存在，请与我们客服联系。</div>';
	echo '	<div id="footer">
		   <p>
			<a href="index.php?controller=index">返回首页</a>-
			<a href="index.php?controller=bbs">论坛</a>-
            <a href="index.php?controller=kongjian">空间</a>
		   </p>
		   <p class="txt-fade">
			流光报时('.date('Y-m-d G:i:s').')
		   </p>
	 </div>';
	$this->showEnd();
	}
}
?>