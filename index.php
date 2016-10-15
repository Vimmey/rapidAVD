<?php
echo "Welcome to Rapid AVD";


$uniqName = uniqid("ytd-");
$prefix= "/usr/local/bin/youtube-dl --extract-audio --audio-format mp3 --output './downloads/$uniqName.mp3' ";
if (!empty($_GET["url"])) {
    $url = $_GET["url"];
    $command = $prefix . "" . $url . "";
    $result = shell_exec("$command");
    echo nl2br("\n\n\n------------------- `$command` ---------------------------\n" . print_r($result , true));
    $link = "http://$_SERVER[HTTP_HOST]" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "";
    $downloadLink = $link . "downloads/$uniqName.mp3";
    echo nl2br("\n\n" . $link . "\n\n");
    echo "Download Link : <a href=$downloadLink> Click here to download</a>";

} else {
echo nl2br("\n\nPlease give the URL\n");
}

