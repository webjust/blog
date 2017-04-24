<?php
header('Content-Type:text/html; charset=utf8');
define('ROOT', 'http://'.$_SERVER['HTTP_HOST']);
define('ROOT_PATH', dirname(__DIR__));
require(ROOT_PATH.'/lib/mysql.php');
require(ROOT_PATH.'/lib/func.php');
