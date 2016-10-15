<?php


$uniqName = uniqid("ytd-");
$audioPrefix= "/usr/local/bin/youtube-dl --extract-audio --audio-format mp3 --output './downloads/$uniqName.mp3' ";
// $videoPrefix= "/usr/local/bin/youtube-dl --output './downloads/$uniqName.mp4' ";
$videoPrefix= "/usr/local/bin/youtube-dl -f 'bestvideo[ext=mp4]+bestaudio[ext=m4a]/bestvideo+bestaudio' --merge-output-format mp4 --output './downloads/$uniqName.mp4' ";

if (!empty($_GET["url"]) && !empty($_GET['type']) ) {
    $url = $_GET["url"];
    $type = $_GET["type"];
 
    
    if ($type == "audio") {
        $command = $audioPrefix . "" . $url . "";
        $result = shell_exec("$command");
        // echo nl2br("\n\n\n------------------- `$command` ---------------------------\n" . print_r($result , true));
        $link = "http://$_SERVER[HTTP_HOST]" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "";
        $downloadLink = $link . "/downloads/$uniqName.mp3";
    } else {
        $command = $videoPrefix . "" . $url . "";
        $result = shell_exec("$command");
        // echo nl2br("\n\n\n------------------- `$command` ---------------------------\n" . print_r($result , true));
        $link = "https://$_SERVER[HTTP_HOST]" . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "";
        $downloadLink = $link . "/downloads/$uniqName.mp4";
    }
    
    $downloadLink = str_replace("/download.php", "", $downloadLink);
    // echo nl2br("\n\n" . $link . "\n\n");
    echo "<h1>Download Link : <a href=$downloadLink> Click here to download</a></h1>";
    echo "<br><br><h3><a href='https://vimmey.com/rapidavd/'>Click here to go to home page.</a></h3>";

} else {

header('Location: https://vimmey.com/rapidavd/');

}

