<?php

require_once(dirname(__FILE__) . "/../../../configs/dbConf.php");
#require_once("/home/vmy/projects/rapidAVD/common/helpers/db/../../../configs/db.conf");
#require_once("/home/vmy/projects/rapidAVD/configs/db.conf");


class DbHelper
{
    protected $con;

    function __construct () {
        $this->con = mysqli_connect(DbConf::$server, DbConf::$user, DbConf::$password, DbConf::$dbname);
        
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function query($queryStr) {
        
        $result = mysqli_query($this->con, $queryStr);
        return $result; 
    }

}
?>
