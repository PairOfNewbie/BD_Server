<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style>
            div {
                width:50%;
                margin:100px 25% auto;
            }
        </style>
    </head>
    <body>
        <div>
                <?php 
		    require( __DIR__ . '/../etc/DB_config.php');
                    $ret = base64_decode($_GET['upload_ret']);
                    $cbody = json_decode($ret, true);

                    $dn = 'http://7xt9cs.com2.z0.glb.clouddn.com/';  
                    error_log(print_r($cbody, true));
                    $url = $dn . $cbody['fname'];
                    error_log($url);

		    function get_extension($file)
		    {
		    return pathinfo($file, PATHINFO_EXTENSION);
		    //获取文件名后缀以判断是传的mp3还是png
		    }

		    $extension = get_extension($cbody['fname']);

		    if ($extension=='png')
    		    {
		    echo '图片上传成功';
		    $column = 'img_url';
		    }
		    else if ($extension=='mp3')
		    {
		    echo '音乐上传成功';
		    $column = 'music_url';
		    }
		    else
		    echo '格式错误，请上传mp3的音乐或者png的图片';

		    
		    $date = basename($cbody['fname'],".".$extension);

		    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    // Write the data to the database
                    $query = "UPDATE album_data SET $column= '$url' where date= '$date' ";
                    mysqli_query($dbc, $query);
                    
                ?>
                <p>上传文件的外链：<a href=<?=$url?>><?=$url?></a></p> 
                <p><a href="http://dev4love.com/Beautiful_Day/admin/qiniu.php">返回</a></p> 
        </div> 
    </body>
</html>

