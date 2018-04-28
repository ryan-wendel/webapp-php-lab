<?php

echo "<h3>########## Cookies</h3>\n";
foreach ($_COOKIE as $key=>$val) {
    echo $key . ' = ' . $val . "<br>\n";
}

echo "<h3>########## Headers</h3>\n";
foreach (getallheaders() as $key => $val) {
    echo $key . ' = ' . $val . "<br>\n";
}

?>
