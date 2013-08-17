<?php 
// 设置时区
date_default_timezone_set('PRC');
// 项目路径
define('APP_PATH',realpath('.').DIRECTORY_SEPARATOR);
/*定义类库目录*/
define('CLASS_PATH',APP_PATH.'class'.DIRECTORY_SEPARATOR);
// 配置文件路径
define('CONFIG_PATH',APP_PATH.'config'.DIRECTORY_SEPARATOR);
// 获取http地址
define('WWW_ROOT','http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0,-9));
//类的自动加载
function __autoload($class_name)
{
// 单独设置controller和view类的路径方便查找，调试
if(substr($class_name,-10)=='Controller'&&($class_name!='Controller'))
$class_path=CLASS_PATH.'controller'.DIRECTORY_SEPARATOR;
elseif(substr($class_name,-4)=='View'&&($class_name!='View'))
$class_path=CLASS_PATH.'view'.DIRECTORY_SEPARATOR;
// 其他类则在默认类库路径调用
else
$class_path=CLASS_PATH;
$file_name=$class_path.$class_name.'.class.php';
if(is_file($file_name))
include $file_name;
}
?>