<?php

require_once(DIRNAME(__FILE__) . "/../model/balanceDetails.php");

$success = true;

$data = json_decode(file_get_contents('php://input'), true);
if (!empty($data["userid"])) {
    $userid = $data["userid"];
} else {
    $userid = "invalid-user-id";
    $response = "Invalid Parameters Sent in request.";
    header('INVALID PARAMETERS', true, 400);
    $success = false;
}

if ($success) { 
    $balanceObj = new Balance();
    $response = $balanceObj->getBalance($userid, "json");

    if ($response == -1) { 
        $response = "Invalid UserId.";
        header('USER ID IS INVALID', true, 404);
    } else {
        echo $response;
    }
}


