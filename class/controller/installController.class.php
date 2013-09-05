<?php
class installController extends Controller{
	public function runApp()
	{
	$this->show_install_html();
	}
	public function show_install_html()
	{
	//获取安装步骤ID
	$install_step=$this->get_step_num();
		if($install_step==0)
		{
		// 显示非法进入
		$this->show_error_enter();
		}
		elseif($install_step==1)
		{
		// 显示填写数据库信息的表单
		$this->show_db_form();
		}
		elseif($install_step==2)
		{
		// 显示填写网站管理员帐号信息的表单
		$this->show_admin_form();
		}
		else
		{
		// 显示安装已经成功
		$this->show_install_ok();
		}
	}
	public function get_step_num()
	{
	// 获取配置
	$config=cfg_class::connect();
	if(is_file(CONFIG_PATH.'install.lock'))
	return 0;
	elseif(!$config->get_var('set_db_ok'))
	return 1;
	elseif(!$config->get_var('set_admin_ok'))
	return 2;
	else
	return 3;
	}
	public function show_db_form()
	{
	//要求填写数据库信息
	$myapp=new writedbView();
	$myapp->runApp();
	}
}
?>