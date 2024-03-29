<html>
<head>
        <link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
<h2 id="title">Vulnerable Profile Change Page</h2>
<p>No CSRF token is required.</p>
<p>Input a new profile value.</p>
<?php
include "include/headers.php";

$value = 'foo-bar';
$httponly = false;

setcookie("test_cookie", $value, null, '/', null, null, $httponly);
setcookie("xsrf_token", uniqid(), null, '/', null, null, $httponly);

// simulating a database thru flat files because lazy
$profile    = './data/profile.csv';

if (isset($_POST['input'])) {
        $input = urldecode($_POST['input']);

    echo "<p class='red'><strong>Success</strong>: You've changed the profile value.</p>\n";
    file_put_contents($profile, $input);
}

// grab and output profile value
$profile_value = file_get_contents($profile);
echo "<p>Profile value = " . $profile_value . "</p>\n";
?>
<form id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="input">
        <input type="submit">
</form>
</body>
</html>
