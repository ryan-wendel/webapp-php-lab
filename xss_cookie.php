<html>
<head>
        <link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
<h2 id="title">XSS Vulnerable Cookie</h2>
<?php
//include "include/headers.php";

$httponly = false;

//setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

echo "<p>Vulnerable cookie is &ldquo;test-cookie&rdquo;.</p>\n";

// Set up the query
if(isset($_COOKIE['test-cookie'])) {
    $cookie = urldecode(trim($_COOKIE['test-cookie']));
    echo "$cookie\n";
    //echo "<script>eval($cookie);</script>\n";
}

echo "<div style='width: 500px;'><p>&ldquo;The major lesson Tiggers need to learn is that if they don't control their impulses, their impulses will control them. No matter how much they do, Tiggers are never satisfied because they don't know the feeling of accomplishment that eventually comes when one persistently applies one's will to the attaining of non-immediately-reachable goals.&rdquo;</p>
<p>&#45 Benjamin Hoff</p></div>\n";
?>
</body>
</html>
