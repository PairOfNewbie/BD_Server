<?php
session_start();

// If the session vars aren't set, try to set them with a cookie
if (!isset($_SESSION['user'])) {
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    }
}
?>


<html xmlns="" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Beautiful Day - FileManage page</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h3>Beautiful Day - FileManage page</h3>

<?php
require( __DIR__ . '/../etc/DB_config.php');
require( __DIR__ . '/../etc/global_defines.php');

require( __DIR__ . '/../../../vendor/autoload.php');

    // 引入鉴权类
    use Qiniu\Auth;

    // 引入上传类
    use Qiniu\Storage\UploadManager;

// IF log in success,Generate the navigation menu
if (isset($_SESSION['user'])) {
    echo '&#10084; <a href="Logout.php">Log Out (' . $_SESSION['user'] . ')</a>';
}
else {
    //if not login,return to index.php
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    header('Location: ' . $home_url);
}



// Grab the data from the POST
if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $date = $_POST['date'];
    $text = $_POST['text'];
/*    $image = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $music = $_FILES['music']['name'];
    $music_type = $_FILES['music']['type'];
    $music_size = $_FILES['music']['size'];
*/
    $page_url = $_POST['page_url'];
    $location = $_POST['location'];
    $song_name = $_POST['song_name'];

    $format = '/\(?20\d{2}[-]?\d{2}[-]?\d{2}/';

//    if ((preg_match($format, $image)) && (preg_match($format, $music)) && (strlen($date)==8) && (strlen($image)==14) && (strlen($music)==14) ) {
if (strlen($date)==10){
//        if ((($image_type == 'image/gif') || ($image_type == 'image/jpeg') || ($image_type == 'image/pjpeg') || ($image_type == 'image/png'))
           // && ($image_size > 0) && ($image_size <= IMG_MAXFILESIZE)) {


                    // Connect to the database
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		    
		    mysqli_query($dbc, "set names utf8");
                    // Write the data to the database
                    $query = "INSERT INTO album_data VALUES (0, '$date','$location', '$text','$song_name', '', '','$page_url')";
                    if(mysqli_query($dbc, $query)) echo 'success';
			else echo 'error';

                    // Confirm success with the user
                    echo '<p>Thanks! Added success!</p>';
                    echo '<p><strong>Date:</strong> ' . $date . '<br />';
                    echo '<strong>Text:</strong> ' . $text . '<br />';
		    echo '<strong>WEB_URL:</strong> ' . $page_url . '<br />';

                    // Clear the score data to clear the form

                    mysqli_close($dbc);
            
        }
        else {
            echo '<p class="error">日期格式错误.</p>';
        }

}

?>

<hr />

<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo IMG_MAXFILESIZE; ?>" />
    <label for="date">日期:</label>
    <input type="text" id="date" name="date" /><br />
    <hr />
    <label for="location">位置:</label>
    <input type="text" id="location" name="location"/><br />
    <hr />
    <label for="text">文字:</label>
    <input type="text" id="text" name="text" /><br />
    <hr />
    <label for="song_name">歌曲名:</label>
    <input type="text" id="song_name" name="song_name"/><br />
    <hr />
    <label for="page_url">页面链接:</label>
    <input type="text" id="page_url" name="page_url" /><br />
    <hr />
    <input type="submit" value="上传" name="submit" />
<p><a href="http://dev4love.com/Beautiful_Day/admin/qiniu.php">上传文件</a></p>
</form>
</body>
</html>
