<?php

require_once(DIRNAME(__FILE__) .  "/db/balanceDbModel.php");


class Balance
{
    protected $dbModel;

    public function __construct() {

        $this->dbModel = new BalanceDbModel();
    
    }



    public function getBalance($userid, $responseType = "array") {

        $data = array("user_id" => $userid);
        $result = $this->dbModel->select($data);
  
        if (mysqli_num_rows($result) == 0) {
            return -1;
        }

        $row = mysqli_fetch_assoc($result);
        $responseArr = array();
        $responseArr["userid"] = $userid . "";
        $responseArr["balance"] = $row["balance"];

        
        if ($responseType == "array") {
            return $responseArr;
        } else if ($responseType == "json") {
            return json_encode($responseArr, JSON_PRETTY_PRINT);
        }

    }
}














