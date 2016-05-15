<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/5
 * Time: 11:10
 */

define('__ETC', dirname(__FILE__));
define('__ROOT', realpath(__ETC . '/../'));
define('__ADMIN_DIR', realpath(__ROOT . '/admin/'));
define('__IMAGE_DIR', realpath(__ROOT . '/image/'));
define('__MUSIC_DIR', realpath(__ROOT . '/music/'));
//define('__IMAGE_DIR', '7xt9cs.com2.z0.glb.clouddn.com');
//define('__MUSIC_DIR', '7xt9cs.com2.z0.glb.clouddn.com');



// Define application constants
define('IMG_UPLOADPATH', 'Beautiful_Day/image/');
define('IMG_MAXFILESIZE', 5242880);      // 5 MB
define('__IMG_URLPATH', 'http://112.74.106.192/Beautiful_Day/image');

define('MUSIC_UPLOADPATH', 'Beautiful_Day/music/');
//define('MUSIC_UPLOADPATH', '7xt9cs.com2.z0.glb.clouddn.com/');
define('MUSIC_MAXFILESIZE', 10485760);      // 10 MB
//define('__MUSIC_URLPATH', '7xt9cs.com2.z0.glb.clouddn.com');
define('__MUSIC_URLPATH', 'http://112.74.106.192/Beautiful_Day/music');
?>
