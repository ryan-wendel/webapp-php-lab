<html>
<body>
<h2 id="title">Command Injection Vulnerable GET</h2>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = true;

setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

if (isset($_GET['cmd'])) {
    $cmd = urldecode($_GET['cmd']);

    echo "<p>GET['cmd'] = $cmd</p>\n";

    $output = array();
    exec($cmd, $output);

    echo "<pre>";
    foreach($output as $line){
        echo $line . "\n";
    }
    echo "</pre>\n";
} else {
    echo "<p>GET['cmd'] is empty</p>\n";
}
?>
</body>
</html>
