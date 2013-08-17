<?php
class error404Controller extends Controller{
	public function runApp()
	{
	$myapp=new error404View();
	$myapp->runApp();
	}
}
?>