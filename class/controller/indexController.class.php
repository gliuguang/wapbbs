<?php
class indexController extends Controller{
	public function runApp()
	{
// 系统是否已经安装?
		if($this->is_install())
		$this->show_index();
		else
		{header('location:index.php?controller=install&step=1');exit();}
	}
	public function is_install()
	{
		return is_file('install.lock');
	}
}
?>