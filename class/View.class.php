<?php
// 控制器基类
class View extends BaseMvc
{
	public $htmlTittle='无标题文档';
	public $htmlCss='
body {background: #ffffff;margin: 0;padding: 0;font-size: 13px;color: #303030;margin: 0 auto;}
a{ text-decoration:none;}
p {line-height: 16px;margin: 0;padding: 0;}
form {margin: 0;padding: 0;}
input {margin: 0;padding: 0;}
textarea{ width:220px; height:30px; margin:0 0 5px 0;}
/*警告文本样式*/
.txt-warning3 {
background: #FFF9B7 url(res/icon_12x12_warning.gif) 3px 4px no-repeat;
padding: 3px 5px 3px 18px;
border-top: 1px solid #E9DDC5;
border-bottom: 1px solid #E9DDC5;
}
/*按钮*/
.btn-s-131 {width: 131px;height: 21px;background:url(res/btn_yellow_s131.gif) 0 0 no-repeat;color: #B36225;border: none;}
/*主导航条、logo*/
#site-logo {height: 25px;padding: 1px 0 1px 5px;}
#main-nav-b1 {height: 26px;line-height: 26px;background: #7BD3ED url(res/main_nav_b1.gif) repeat-x;font-weight: bold;padding: 0 0 0 5px;color: #ffffff;}
#main-nav-b1 a {color: #beecff;margin: 0 15px 0 0;}
#main-nav-b1 a.current {color: #ffffff;}
/*主题部分*/
.module-content {padding: 5px 0 5px 10px;}
.module-content a {color: #0051A4;}
/* 底部文字 */
#footer {padding: 5px;background: #E3EEF8;border-top: 1px solid #9FC6EC;}
#footer a {color: #0051A4;}
.txt-fade {font-size: 12px;color: #9B9B9B;}
/*二级导航条*/
.nav-2 {
margin: 8px 0 2px;
padding: 0 5px;
height: 20px;
line-height: 20px;
border-bottom: 4px solid #9FC6EC;
color: black;
font-weight: bold;
}
/*帖子颜色*/
.topiclist {
line-height: 1.3;
padding: 3px 5px;
word-wrap: break-word;
}
.deep {
background: #E3EEF8;
border: 1px solid #9FC6EC;
border-left: none;
border-right: none;
}
/*帖子列表标题*/
.txt-big {
font-size: 13px;
}
/*帖子标题列表中的昵称显示*/
.nick {
color: #004299;
font-size: 11px;
}
';
	public function setTittle($htmlTittle)
	{
	$this->htmlTittle=$htmlTittle;
	}
	public function addCss($htmlCss)
	{
	$this->htmlCss.="\n";
	$this->htmlCss.=$htmlCss;
	}
	
	public function showHead()
	{
header('Content-Type: text/html;charset=utf-8');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header('Cache-Control: no-cache, no-store, must-revalidate, post-check=0, pre-check=0');
header('Pragma: no-cache');
echo '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="res/favicon.ico">
<title>'.$this->htmlTittle.'</title>
<!--css代码开始 -->
<style type="text/css">';
echo $this->htmlCss.'
</style>
</head>
<body>',"\n";
	}
	
	public function showEnd()
	{
	echo "\n";
	echo '</body>
</html>';
	}
	
	public function runApp()
	{
	$this->setTittle('');
	$this->addCss('');
	$this->showHead();
	echo 'hello world';
	$this->showEnd();
	}
}
?>