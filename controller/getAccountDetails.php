<?php

require_once(DIRNAME(__FILE__) . "/../model/accountDetails.php");

$success = true;

$data = json_decode(file_get_contents('php://input'), true);
// $data = array("userid" => 2505);

if (!empty($data["userid"])) {
    $userId = $data["userid"];
} else {
    $userId = "invalid-user-id";
    $response = "Invalid Parameters Sent in request.";
    header('INVALID PARAMETERS', true, 400);
    $success = false;
}

if ($success) {
    $accountObj = new Account_Details();
    $response = $accountObj->getAccountDetails($userId, "json");

    if ($response == -1) {
        $response = "Invalid user_id.";
        header('USER ID IS INVALID', true, 404);
    } else {
        echo $response;
    }
}


