<?php

require_once(DIRNAME(__FILE__) .  "/db/transactionsDbModel.php");

// $obj = new Transaction_Details();
// echo print_r($obj->getTransactionDetails("412", "json"), true);
// echo print_r($obj->createTransaction("2505" , "2505", "9345654.25"), true);


class Transaction_Details
{
    protected $dbModel;

    public function __construct() {

        $this->dbModel = new TransactionDbModel();

    }

    public function getTransactionDetails($tid, $responseType = "array") {

        $data = array("tid" => $tid);
        $result = $this->dbModel->select($data);

        if (mysqli_num_rows($result) == 0) {
            return -1;
        }

        $row = mysqli_fetch_assoc($result);
        $responseArr = array();
        $responseArr["tid"] = $tid . "";
        $responseArr["status"] = $row["status"];
        $responseArr["date_created"] = $row["date_created"];
        $responseArr["date_completed"] = $row["date_completed"];

        $responseArr["details"]["from_user"] = $row["from_user"];
        $responseArr["details"]["to_user"] = $row["to_user"];
        $responseArr["details"]["amount"] = $row["amount"];


        if ($responseType == "array") {
            return $responseArr;
        } else if ($responseType == "json") {
            return json_encode($responseArr, JSON_PRETTY_PRINT);

        }
     }

    public function createTransaction($from_user, $to_user, $amount, $responseType = "array") {

        
        $tid = md5(uniqid(mt_rand(), true));
        $result = $this->dbModel->insert($tid, $from_user, $to_user, $amount);
        
        $responseArr = $this->getTransactionDetails($tid);

        if ($responseType == "array") {
            return $responseArr;
        } else if ($responseType == "json") {
            return json_encode($responseArr, JSON_PRETTY_PRINT);

        }
     }
 }

