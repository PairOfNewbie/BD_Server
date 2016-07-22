<?php
$path = "2016-05-08.png";
require( __DIR__ . '/../etc/DB_config.php');
function get_extension($file)
{
return pathinfo($file, PATHINFO_EXTENSION);
}

$just = get_extension($path);

if ($just='png')
echo '1';
else if ($just='mp3')
echo '2';
else
echo '格式错误，请上传mp3的音乐或者png的图片';
                    $date = basename($path,".png");
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                   $url = 'sfsdjfjsdjfs'; 
                    // Write the data to the database
                    $query = "UPDATE album_data SET img_url= '$url'   where date= '$date' ";
                    //$query = "INSERT INTO album_data VALUES (0, '1', '2', '3', '4', '5', '6', '7')";
                    if (mysqli_query($dbc, $query)) echo 'success';
			else echo 'error';
echo basename($path)."<br>";
//如果选择suffix则忽略扩展名
echo basename($path,".png");
?>
