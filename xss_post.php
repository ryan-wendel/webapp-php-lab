<html>
<body>
<h3 id="title">XSS Vulnerable Form</3>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = true;

setcookie("test_cookie", $value, null, '/', null, null, false);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

if (isset($_POST['input'])) {
	$input = urldecode($_POST['input']);
	
	echo "<p id='input'>POST['input'] = $input</p>\n";
} else {
	echo "<p>POST['input'] is empty</p>\n";
}
?>
<form action="xss_post.php" method="post">
        <input type="text" name="input">
		<input type="hidden" name="xsrf_token" value="<?php echo uniqid(); ?>">
        <input type="submit">
</form>
</body>
</html>

