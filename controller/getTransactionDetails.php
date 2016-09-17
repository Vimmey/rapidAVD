<?php

require_once(DIRNAME(__FILE__) . "/../model/transactionDetails.php");

$success = true;

$data = json_decode(file_get_contents('php://input'), true);
// $data = array("TransactionId" => "412");

if (!empty($data["TransactionId"])) {
    $tid = $data["TransactionId"];
} else {
    $tid = "invalid-transaction-id";
    $response = "Invalid Parameters Sent in request.";
    header('INVALID PARAMETERS', true, 400);
    $success = false;
}

if ($success) {
    $transactionObj = new Transaction_Details();
    $response = $transactionObj->getTransactionDetails($tid, "json");

    if ($response == -1) {
        $response = "Invalid tid.";
        header('USER ID IS INVALID', true, 404);
    } else {
        echo $response;
    }
}





