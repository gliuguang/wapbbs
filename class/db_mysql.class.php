<?php 
class db_mysql
{
/* mysql数据库驱动类 */
	public function get_instance()
	{
	$config=cfg_class::connect(CONFIG_PATH.'dbcfg.php');
	$db_host=$config->get_var('db_host');
	$db_port=$config->get_var('db_port');
	$db_user=$config->get_var('db_user');
	$db_pass=$config->get_var('db_pass');
	$db_name=$config->get_var('db_name');
	$pdo_object=new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
/* 	 catch (PDOException $e){
		 die('Connection failed: '.$e->getMessage());
		} */
	$pdo_object->exec('SET NAMES utf8');
	return $pdo_object;
	}
}
?>