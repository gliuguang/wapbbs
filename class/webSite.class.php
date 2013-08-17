<?php
class webSite{
	public function runApp()
	{
//网站控制器选择
	$controllerName=empty($_GET['controller'])?'index':$_GET['controller'];
	$class_name=$controllerName.'Controller';
	if(!class_exists($class_name))
	$class_name='error404Controller';
	$myweb=new $class_name();
	$myweb->runApp();
	}
}
?>