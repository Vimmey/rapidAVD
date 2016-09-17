<?php
require_once(DIRNAME(__FILE__) . "/../../common/helpers/db/dbHelper.php");

// $obj = new accountDbModel();
// $arr = array("user_id" => 2505);
// echo print_r($obj->select($arr), true);

class accountDbModel
{
    protected $dbObj;

    function __construct () {
        $this->dbObj = new DbHelper();

    }

    public function select($data) {

        if (!empty($data["user_id"])) {
            $user_id = $data["user_id"];
        } else {
            return -1;
        }

        $sql = "SELECT * FROM `accounts` WHERE `user_id` = '$user_id'";

        $result = $this->dbObj->query($sql);
        return $result;
    }

 }

