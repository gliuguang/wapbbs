<?php

class myPDO {
    /* 系统数据库调用类 */

    public $queries = 0;
    public $pdo_object;
//调试模式?
    protected $is_debug = false;
    protected $sql_array = array();
    private static $instance;
    private $table_pre;

    public static function is_connect() {
        return isset(self::$instance);
    }

    /*
      连接测试
      try {
      $db=myPDO::connect();
      }
      catch (PDOException $e){
      die('Connection failed: '.$e->getMessage());
      }
     */

    public static function connect() {
        if (!(self::is_connect())) {
            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }

    private function __construct() {
        $config = cfg_class::connect();
        $db_driver = 'db_mysql';
        /* 根据数据库类型调用驱动类,为支持多种数据库留下支持 */
        $this->pdo_object = new $db_driver();
        $this->pdo_object = $this->pdo_object->get_instance();
        $table_pre = $config->get_var('table_pre');
        $this->table_pre = $table_pre;
    }

    public function query($sql) {
        $this->queries+=1;
        if ($this->is_debug)
            $this->sql_array[] = $sql;
        $result = $this->pdo_object->query($sql);
        $errorInfo = $this->pdo_object->errorInfo();
        if (!is_object($result)) {
            echo '<b>Liuguang Warning</b> : sql error in <span style="color:red;">' . $sql . '</span><br /><b>Error info</b> : ';
            die(str_replace(array('<', '>', ' ', "\n"), array('&lt;', '&gt;', '&nbsp;', '<br />'), print_r($errorInfo, true)));
        }
        return $result;
    }

    public function exec($sql) {
        $this->queries+=1;
        if ($this->is_debug)
            $this->sql_array[] = $sql;
        $result = $this->pdo_object->exec($sql);
        $errorInfo = $this->pdo_object->errorInfo();
        if ($result === false) {
            echo '<b>Liuguang Warning</b> : sql error in <span style="color:red;">' . $sql . '</span><br /><b>Error info</b> : ';
            die(str_replace(array('<', '>', ' ', "\n"), array('&lt;', '&gt;', '&nbsp;', '<br />'), print_r($errorInfo, true)));
        }
    }

    public function get_table_pre() {
        return $this->table_pre;
    }

    public function lastInsertId() {
        return $this->pdo_object->lastInsertId();
    }

    public function queryNum() {
        return $this->queries;
    }

    public function show_sql() {
        if ($this->is_debug) {
            $result = str_replace(array('<', '>', ' ', "\n"), array('&lt;', '&gt;', '&nbsp;', '<br />'), print_r($this->sql_array, true));
            return '<span style="color:#FFFFFF;">' . $result . '</span>';
        }
        else
            return 'myPDO::$is_debug=false;';
    }

}

?>