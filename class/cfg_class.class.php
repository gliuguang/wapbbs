<?php
//读取,更新,保存配置变量的类
class cfg_class{
private static $instance=array();
private $file_name;
private $var_data=array();
private $change=false;
public static function connect($file_name='')
{
if($file_name=='')
$file_name=CONFIG_PATH.'cfg.php';
else
$file_name=CONFIG_PATH.$file_name;
$md5_name=md5($file_name);
        if(!isset(self::$instance[$md5_name]))
    {
    $class_name=__CLASS__;
    self::$instance[$md5_name]=new $class_name($file_name);
    }
return self::$instance[$md5_name];
}
private function __construct($file_name){
if(is_file($file_name))
include $file_name;
else
$this->change=true;
$this->file_name=$file_name;
$this->var_data=$config;
}
public function get_var($var_name)
{return isset($this->var_data[$var_name])?$this->var_data[$var_name]:NULL;}
public function get_all()
{return $this->var_data;}
public function set_all($var_array)
{
foreach($var_array as $key=>$values)
  {$this->set_var($key,$values);}
}
public function set_var($var_name,$var_value)
   {
$this->change=true;
$this->var_data[$var_name]=$var_value;
   }
public function unset_var($var_name)
    {
$this->change=true;
unset($this->var_data[$var_name]);
   }
protected function parse_var($var_data)
{
return '$config='.var_export($var_data,true).";\n";
}
public function __destruct(){
if($this->change)
  {
/*
*如果这里加上die(realpath('.'));获取的绝对路径可能不是当前的脚本路径
*说明析构函数的运行路径发生了变化(参考php手册->类与对象->构造函数和析构函数)
*所以$file_name建议使用绝对路径
*流光注
*/
$file_name=$this->file_name;
$var_data=$this->var_data;
$cfg_string="<?php\n/*\n*配置文件\n*最后修改时间:".date('Y-m-d G:i:s')."\n*/\n";
$cfg_string.=$this->parse_var($var_data);
$cfg_string.='?>';
file_put_contents($file_name,$cfg_string);
  }
}
}//end class
?>