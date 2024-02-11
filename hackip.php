<?php  
header("Access-Control-Allow-Origin: *");
$ip = $_GET["ip"];
$url = "https://ipinfo.io/".$ip."?token=0c0c12f0b69fa0";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
echo $res;
?>