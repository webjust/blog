<<<<<<< HEAD
<?php 
header('Content-Type:text/html; charset=utf8');
define('ROOT', dirname(__DIR__));
require(ROOT.'/lib/mysql.php');
require(ROOT.'/lib/func.php');
=======
<?php
header('Content-Type:text/html; charset=utf8');
define('ROOT', 'http://'.$_SERVER['HTTP_HOST']);
define('ROOT_PATH', dirname(__DIR__));
require(ROOT_PATH.'/lib/mysql.php');
require(ROOT_PATH.'/lib/func.php');
>>>>>>> 6d2d775a9d24c1c42e9171962e6cf3fc62790a76
