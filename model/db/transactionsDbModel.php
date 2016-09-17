<?php

require_once(DIRNAME(__FILE__) . "/../../common/helpers/db/dbHelper.php");

$obj = new TransactionDbModel();
// $arr = array("tid" => "412");
// echo print_r($obj->select($arr), true);
// echo print_r($obj->insert("8999dssdsdsdsda", "2505" , "2505", "3645654.25"), true);

class TransactionDbModel
{
    protected $dbObj;

    function __construct () {
        $this->dbObj = new DbHelper();

    }

    public function select($data) {

        if (!empty($data["tid"])) {
            $tid = $data["tid"];
        } else {
            return -1;
        }

        $sql = "SELECT * FROM `transactions` WHERE `tid` = '$tid'";

        $result = $this->dbObj->query($sql);
        return $result;
    }

    public function insert($tid, $from_user, $to_user, $amount) {

        $sql = "INSERT INTO  `transactions` (`tid`, `from_user`, `to_user`, `amount`, `status`) VALUES ('$tid', '$from_user', '$to_user', '$amount', 'pending')";

        $result = $this->dbObj->query($sql);
        return $result;


    }
 }

