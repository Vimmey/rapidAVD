<?php

require_once(DIRNAME(__FILE__) .  "/db/accountsDbModel.php");

// $obj = new Account_Details();
// echo print_r($obj->getAccountDetails(2505), true);

class Account_Details
{
    protected $dbModel;

    public function __construct() {

        $this->dbModel = new accountDbModel();

    }



    public function getAccountDetails($user_id, $responseType = "array") {

        $data = array("user_id" => $user_id);
        $result = $this->dbModel->select($data);

        if (mysqli_num_rows($result) == 0) {
            return -1;
        }

        $row = mysqli_fetch_assoc($result);
        $responseArr = array();
        $responseArr["user_id"] = $user_id . "";
        $responseArr["username"] = $row["username"];
        $responseArr["date_created"] = $row["date_created"];
        $responseArr["expiry_date"] = $row["expiry_date"];

        $responseArr["email_id"] = $row["email_id"];
        $responseArr["mbl_no"] = $row["mbl_number"];
        $responseArr["account_status"] = $row["account_status"];


        if ($responseType == "array") {
            return $responseArr;
        } else if ($responseType == "json") {
            return json_encode($responseArr, JSON_PRETTY_PRINT);

        }
     }
 }


