<?php
// require_once('initialize.php');
require_once(LIB_PATH.DS.'config.php');

class Database{
    var $sql_string = '';
    var $error_no = 0;
    var $error_msg = '';
    private $con;
    public $last_query;
    private $magic_quotes_active;
    private $real_escape_string_exists;

    function __construct() {
        $this->open_connection();
        $this->magic_quotes_active = false;
        $this->real_escape_string_exists = function_exists("mysqli_real_escape_string");
    }
    public function open_connection() {
        $this->con = mysqli_connect(server, user, pass);
        if(!$this->con){
            echo "There is a problem in database connection! Connect with administrator";
            exit();
        }else{
            $db_select = mysqli_select_db($this->con, database_name);
            if(!$db_select){
                echo "Database is not found! Please connect with administrator";
                exit();
            }
        }
    }

    function setQuery($sql= ''){
        $this->sql_string = $sql;
    }
    function executeQuery(){
        $result = mysqli_query($this->con, $this->sql_string);
        $this->confirm_query($result);
        return ($result);
    }
    private function confirm_query($result){
        if(!$result){
            $this->error_no = mysqli_errno($this->con);
            $this->error_msg = mysqli_error($this->con);
            return false;
        }
        return $result;
    }
    function loadSingleResult(){
        $cur = $this->executeQuery();
        while($row = mysqli_fetch_object($cur)){
            return $data = $row;
        }
        mysqli_free_result($cur);
    }
    function getFieldsOnOneTable($tbl_name){
        $this->setQuery('DESC', $tbl_name);
        $rows = loadResultList();
    }


    public function fetch_array($result){
        return mysqli_fetch_array($result);
    }
    public function num_rows($result_set){
        return mysqli_num_rows($result_set);
    }
}

$db = new Database();
