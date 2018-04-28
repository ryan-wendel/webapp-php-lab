<html>
<body>
<h2 id="title">RFI Vulnerable GET</h2>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = true;

setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

if (isset($_GET['include'])) {
    $include = urldecode($_GET['include']);

    echo "<p>GET['include'] = $include</p>\n";

    $file = fopen($include, "r");

    if($file) {
        include "$include";

        echo "<br />\n";

        while(!feof($file)) {
            highlight_string(fgets($file));
        }

    } else {
        echo "<p style='color: red;'>Unable to open file: $include</p>";
    }
    
    fclose($file);
} else {
    echo "<p>GET['include'] is empty</p>\n";
}
?>
</body>
</html>
