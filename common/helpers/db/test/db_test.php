<?php

require_once(dirname(__FILE__) . "/../dbHelper.php");

$sql1 = "show tables;";
$sql2 = "show databases;";
$sql3 = "INSERT INTO `accounts` (`user_id`, `username`, `password`, `auth_token`, `date_created`, `expiry_date`, `email_id`, `mbl_number`, `account_status`, `OTP`) VALUES ('2505', 'vmychopra', 'k2342jnmkn22n2nk22', 'dJMKJDKnmkKFMk2342jnmkn22n2nk22', CURRENT_TIMESTAMP, NULL, 'vmy.chopra@gmail.com', '9999988888', 'active', '859685');";

$dbObj = new DbHelper();
echo print_r($dbObj->query($sql1), true);
echo print_r($dbObj->query($sql2), true);
echo print_r($dbObj->query($sql3), true);

