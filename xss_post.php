<html>
<body>
<h2 id="title">XSS Vulnerable Form</h2>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = true;
$xsrf_token = uniqid();

setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", $xsrf_token, null, '/', null, null, $httponly);

if (isset($_POST['input'])) {
	$input = urldecode($_POST['input']);
	
	echo "<p id='input'>POST['input'] = $input</p>\n";
} else {
	echo "<p>POST['input'] is empty</p>\n";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="input">
    <input type="hidden" name="xsrf_token" value="<?php echo $xsrf_token; ?>">
    <input type="submit">
</form>
</body>
</html>
