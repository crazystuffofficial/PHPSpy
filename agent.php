<?php
$html = base64_decode($_GET['details']);
file_put_contents("agent.txt", $html);
?>