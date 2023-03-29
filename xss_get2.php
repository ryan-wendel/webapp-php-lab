<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
<h2 id="title">XSS Vulnerable GET 2</h2>
<script>console.log('XSS Vulnerable GET 2');</script>
<?php

//header("Content-Security-Policy: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self' 'unsafe-inline';");
//header("Content-Security-Policy: default-src 'none'; script-src 'unsafe-inline'; connect-src 'self'; img-src 'self'; style-src 'self';");
//header("Content-Security-Policy: default-src https:");
//header("Content-Security-Policy: default-src 'self' *.target.com; script-src 'nonce-8675309420LOL'';");
//header("Content-Security-Policy: default-src 'self' *.target.com; script-src 'nonce-8675309420LOL'; style-src 'nonce-8675309420LOL1';");
//header("Content-Security-Policy: default-src 'self'; script-src 'unsafe-inline';");

$cookie_name = 'test_cookie';
$cookie_value = 'foo-bar';

// cookie options array
$cookie_options = Array();
$cookie_options['expires'] = time() + 1800;
$cookie_options['path'] = '/';
$cookie_options['domain'] = $_SERVER['SERVER_NAME'];
$cookie_options['secure'] = False;
$cookie_options['httponly'] = False;
$cookie_options['samesite'] = 'None';

// create a random cookie
setcookie($cookie_name, 'TestCookieValue',  $cookie_options);

//$cookie_options['domain'] = 'bbq.target.com';
//setcookie($cookie_name, 'from_bbq.target.com', $cookie_options);

//echo 'Cookie name = ' . $cookie_name . ' = ' . $_COOKIE[$cookie_name] . "\n";

?>

<!-- <script>console.log(document.cookie)</script> -->

<?php

/*
// CORS Arbritrary Origin Reflection
if(isset($_SERVER['HTTP_ORIGIN'])) {
        $origin = $_SERVER['HTTP_ORIGIN'];
        header("Access-Control-Allow-Origin: $origin");
        header("Access-Control-Allow-Credentials: true");
}
*/

if(isset($_GET['input'])) { ?>
<script>
    let searchParams = new URLSearchParams(document.location.search);
    if(searchParams.has('input')) {
        document.write("<p>GET['input'] = " + searchParams.get('input') + '</p>');
    }
</script>
<?php } else {
        echo "<p>GET['input'] is empty</p>\n";
}

if(isset($_GET['event'])) {?>
<script>
    let searchParams = new URLSearchParams(document.location.search);
    if(searchParams.has('event')) {
        document.write("<p>GET['event'] = " + searchParams.get('event') + '</p>');
        document.write("<img id='kitteh' onload='" + searchParams.get('event') + "' src='images/kitteh1.jpg' width='200'><br />");
    }
</script>
<?php } else {
        echo "<p>GET['event'] is empty</p>\n";
        echo "<img id='kitteh' src='images/kitteh1.jpg' width='200'><br />";
}

echo "<div class='quote'><p>&ldquo;The major lesson Tiggers need to learn is that if they don't control their impulses, their impulses will control them. No matter how much they do, Tiggers are never satisfied because they don't know the feeling of accomplishment that eventually comes when one persistently applies one's will to the attaining of non-immediately-reachable goals.&rdquo;</p>\n";

echo "<p>&#45 Benjamin Hoff</p></div>\n";
?>
</body>
</html>
