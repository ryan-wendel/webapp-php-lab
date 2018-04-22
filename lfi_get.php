<html>
<body>
<h2 id="title">LFI Vulnerable GET</h2>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = true;

setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

if (isset($_GET['include'])) {
	$include = urldecode($_GET['include']);

	echo "<p>GET['include'] = $include</p>\n";
	
	if(file_exists($include)) {
		include "$include";
		
		echo "<br /><br />\n";
	
		highlight_file($include);
	} else {
		echo "<p style='color: red;'>Unable to open file: $include</p>";
	}
} else {
	echo "<p>GET['include'] is empty</p>\n";
}
?>
</body>
</html>

