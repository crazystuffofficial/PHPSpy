<?php  
header("Access-Control-Allow-Origin: *");
$ip_address = getenv("REMOTE_ADDR");
echo base64_encode($ip_address);
?>
