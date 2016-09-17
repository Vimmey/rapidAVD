<?php
require_once(DIRNAME(__FILE__) . "/../../common/helpers/db/dbHelper.php");

class BalanceDbModel 
{
    protected $dbObj; 
        
    function __construct () {
        $this->dbObj = new DbHelper();

    }

    public function select($data) {

        if (!empty($data["user_id"])) {
            $userid = $data["user_id"];
        } else {
            return -1;
        }

        $sql = "SELECT `user_id`, `balance` FROM `balance` WHERE `user_id` = '$userid'";

        $result = $this->dbObj->query($sql);
        return $result;
    }


    public function insert($data) {

        if (!empty($data["user_id"])) {
            $userid = $data["user_id"];
        } else {
            return -1;
        }
    
        if (!empty($data["balance"])) {
            $balance = $data["balance"];
            $sql = "INSERT INTO `balance` (`user_id`, `balance`) VALUES ('$userid', $balance)";
        } else {
            $sql = "INSERT INTO `balance` (`user_id`) VALUES ('$userid')";
        }

        $result = $this->dbObj->query($sql);
        return $result;
    }
  

    public function update($data) {
  
        if (!empty($data["user_id"])) {
            $userid = $data["user_id"];
        } else {
            return -1;
        }
        
        if (!empty($data["balance"])) {
            $balance = $data["balance"];
        } else { 
            return -1;
        }
        
        $sql = "UPDATE `balance` SET `balance`= $balance WHERE `user_id` = '$userid'";

        $result = $this->dbObj->query($sql);
        return $result;

    }
}
    








