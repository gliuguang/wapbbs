<?php
class sessionDb {
    protected $db;

    protected $table_pre;
    protected $session_exists;
    public function __construct() {
        $this->db=myPDO::connect();
        $table_pre=$this->table_pre=$this->db->get_table_pre();
session_set_save_handler(

            array($this,'open'),

            array($this,'close'),

            array($this,'read'),

            array($this,'write'),

            array($this,'destroy'),

            array($this,'gc')

        );
$sid=empty($_GET['sid'])?(empty($_COOKIE['sid'])?'':$_COOKIE['sid']):$_GET['sid'];
if(!preg_match('/^[0-9a-z]{32}$/',$sid))
$sid=self::get_sid();
session_id($sid);
session_name('sid');
//cookie有效期为1个月
setcookie(session_name(),session_id(),(time()+30*24*3600),'/');
session_start();
/*初始化*/
if(!isset($_SESSION['sid']))
{
$_SESSION['sid']=$sid;
$_SESSION['session_time']=time();
$_SESSION['uid']=0;
$_SESSION['nickname']='游客'.rand(1000,9999);
}
if($_SESSION['session_time']<(time()-300))
$_SESSION['session_time']=time();
    }
	public static function get_sid(){
	//sid算法，即使是高并发，也很难产生重复的值
	return md5(uniqid(rand(1,100).'_',true).'_'.rand(1000,9999).'_'.rand(1000,9999).'_'.rand(1000,9999));
	}
    public function open( $savePath,$sessionName) {

        return true;

    }

    public function close(){

return true ;

    }

    public function read($id) {

$table_pre=$this->table_pre;
$res=$this->db->query("SELECT COUNT(*) FROM {$table_pre}session WHERE session_id='{$id}'");
$tmp=$res->fetch();
$this->session_exists=($tmp['COUNT(*)']!=0);
if($this->session_exists)
   {
$res=$this->db->query("SELECT session_data FROM {$table_pre}session WHERE session_id='{$id}' LIMIT 1");
$tmp=$res->fetch();
return $tmp['session_data'];
   }
else
return '';
}

    public function write($id,$data) {

$table_pre=$this->table_pre;
$data=addslashes($data);
$uid=$_SESSION['uid'];
$session_time=$_SESSION['session_time'];
if($this->session_exists)
$this->db->exec("UPDATE {$table_pre}session SET session_data='{$data}',uid='{$uid}',session_time='{$session_time}' WHERE session_id='{$id}'");
else
$this->db->exec("INSERT INTO {$table_pre}session(session_id,session_data,uid,session_time) VALUES('{$id}','{$data}','{$uid}','{$session_time}')");
return true;
}
    public function destroy($id) {

$table_pre=$this->table_pre;
$this->db->exec("DELETE FROM {$table_pre}session WHERE session_id='{$id}'");
return true;
}

    public function gc($maxlifetime) {
$table_pre=$this->table_pre;
$dead_time=time()-(5*24*3600);
$this->db->exec("DELETE FROM {$table_pre}session WHERE uid=0 and session_time<{$dead_time}");
return true;
}
}?>