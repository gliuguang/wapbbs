<?php
//计时开始
define('APP_START_TIME',microtime(true));
/*包含引导文件*/
include './autoload.php';
/*运行*/
$myweb=new webSite();
$myweb->runApp();
?>