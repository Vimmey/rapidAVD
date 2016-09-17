<?php

require_once(DIRNAME(__FILE__) . "/../model/transactionDetails.php");

$success = true;

// $data = json_decode(file_get_contents('php://input'), true);
$data = array("FromUserId" => "2505", "ToUserId" => "2505", "Amount" => "560534.45");

if (!empty($data["FromUserId"]) && !empty($data["ToUserId"]) && !empty($data["Amount"])) {
    $to_user = $data["FromUserId"];
    $from_user = $data["ToUserId"];
    $amount = $data["Amount"];

} else {
    $response = "Invalid Parameters Sent in request.";
    header('INVALID PARAMETERS', true, 400);
    $success = false;
}

if ($success) {
    $transactionObj = new Transaction_Details();
    $response = $transactionObj->createTransaction($from_user, $to_user, $amount, "json");

    if ($response == -1) {
        $response = "Invalid tid.";
        header('USER ID IS INVALID', true, 404);
    } else {
        echo $response;
    }
}





