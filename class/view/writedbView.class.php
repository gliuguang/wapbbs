<?php
class writedbView extends View{
	public function runApp()
	{
	$this->setTittle('填写数据库配置');
	$this->showHead();
	echo '<div>
		<!--logo -->
		<div id="site-logo">
		<img src="res/logo.jpg" alt="logo"/><br/>
		</div>
		
		<!--主导航栏标题 -->
	    <div id="main-nav-b1">配置数据库</div>';
	if($_COOKIE['site_error']!='')
	{
	echo '<!--错误提示区 -->
		<div class="top-info">
			<p class="txt-warning3">数据库连接失败！<br/></p>
		</div>
			  
	</div>';
	$_COOKIE['site_error']='';
	}
	echo '<form id="regform" action="index.php?controller=do_install" method="post">
					<p>请输入mysql数据库地址</p>
					<p>
						<input type="text" name="db_host" value="localhost" maxlength="38" />
					</p>
					<p>请输入mysql数据库用户名</p>
					<p>
						<input type="text" name="db_uesr" value="root" maxlength="38" />
					</p>
					<p>请输入数据库密码</p>
					<p>
						<input type="text" name="db_pass" value="" maxlength="38" />
					</p>
					<p>请输入数据库名</p>
					<p>
					   <input type="text" name="db_name" value="" maxlength="38" />
					</p>
					<p>请输入表前缀</p>
					<p>
						<input type="text" name="table_pre" value="liuguang_" maxlength="38" />
					</p>
					<p>
					你可以填写本表，也可直接修改config/dbcfg.php,并修改config/cfg.php的set_db_ok为true<br />
						<input class="btn-s-131" type="submit" name="action" id="action" value="下一步 " /><br />
					</p>
	</form>';
	echo '	<div id="footer">
		   <p>
		   powered by 流光
		   </p>
		   <p class="txt-fade">
			流光报时('.date('Y-m-d G:i:s').')
		   </p>
	 </div>';
	$this->showEnd();
	}
}
?>