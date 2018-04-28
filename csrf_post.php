<html>
<body>
<h2 id="title">Vulnerable Profile Change Page</h2>
<p>Input a new profile value.</p>
<?php
include "include/headers.php";

// simulating a database thru flat files because lazy
$profile    = './data/profile.csv';
$token_file = './data/token.csv';
$old_token  = file_get_contents($token_file);

$new_token = uniqid();
file_put_contents($token_file, $new_token);

if (isset($_POST['input'])) {
    $input = urldecode($_POST['input']);

    if (isset($_POST['csrf_token'])) {
        $post_token = $_POST['csrf_token'];

        echo "<p>Old token = " . $old_token . "</p>\n";
        echo "<p>Post token = " . $post_token . "</p>\n";

        if(strcmp($post_token, $old_token) == 0) {
            echo "<p style='color: red;'><strong>Success</strong>: You've changed the profile value.</p>\n";
            file_put_contents($profile, $input);
        }
    }
}

// grab and output profile value
$profile_value = file_get_contents($profile);
echo "<p>Profile value = " . $profile_value . "</p>\n";

?>
<form id="form1" action="csrf_post.php" method="post">
    <input type="text" name="input">
    <input type="hidden" name="csrf_token" value="<?php echo $new_token; ?>">
    <input type="submit">
</form>
</body>
</html>	
