<html>
<body>
<h2 id="title">XSS Vulnerable GET</h2>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = true;

setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

if(isset($_SERVER['HTTP_ORIGIN'])) {
	$origin = $_SERVER['HTTP_ORIGIN'];
	header("Access-Control-Allow-Origin: $origin");
	header("Access-Control-Allow-Credentials: true");
}

if(isset($_GET['input'])) {
	$input = urldecode($_GET['input']);
	
	echo "<p>GET['input'] = $input</p>\n"; 
} else {
	echo "<p>GET['input'] is empty</p>\n";
}

if(isset($_GET['event'])) {
	$event = urldecode($_GET['event']);
	
	echo "<img onload='$event' src='images/kitteh1.jpg' width='200'><br />";
} else {
	echo "<img src='images/kitteh1.jpg' width='200'><br />";
}

echo "<div style='width: 500px;'><p>&ldquo;The major lesson Tiggers need to learn is that if they don't control their impulses, their impulses will control them. No matter how much they do, Tiggers are never satisfied because they don't know the feeling of accomplishment that eventually comes when one persistently applies one's will to the attaining of non-immediately-reachable goals.&rdquo;</p>
<p>&#45 Benjamin Hoff</p></div>\n";
?>
</body>
</html>

