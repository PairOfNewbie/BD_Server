<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/5
 * Time: 11:18
 */
require_once(__DIR__ . '/../etc/DB_config.php');

// Start the session
session_start();

// Clear the error message
$error_msg = "";

// If the user isn't logged in, try to log them in
if (!isset($_SESSION['user'])) {
    if (isset($_POST['submit'])) {

        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Grab the user-entered log-in data
        $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        if (!empty($user_username) && !empty($user_password)) {
            // Look up the username and password in the database
            $query = "SELECT * FROM admin WHERE user = '$user_username'";
            $data = mysqli_query($dbc, $query);

            $row = mysqli_fetch_array($data);
            $pwd = $row['pwd'];
	$hash_pwd = sha1($user_password);
	if ((mysqli_num_rows($data) == 1)&& ($hash_pwd == $pwd)) {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                $_SESSION['user'] = $row['user'];
                setcookie('user', $row['user'], time() + (10));//(60 * 60 * 24 * 7));  // expires in 7 days
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_manage.php';
                header('Location: ' . $home_url);
            }
            else {
                // The username/password are incorrect so set an error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }
        else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
        }
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Beautiful Day - Log In</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h3>Beautiful Day - Log In</h3>

<?php
// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
if (empty($_SESSION['user'])) {
    echo '<p class="error">' . $error_msg . '</p>';
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Log In</legend>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
            <label for="password">Password:</label>
            <input type="password" name="password" />
        </fieldset>
        <input type="submit" value="Log In" name="submit" />
    </form>

    <?php

}
else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['user'] . '.</p>');
}
?>

</body>
</html>
