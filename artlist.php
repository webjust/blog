<?php
include './lib/init.php';
// 获取全部的文章
$sql = "SELECT art.*, cat.catname FROM art LEFT JOIN cat ON art.cat_id = cat.cat_id";
$arts = mGetAll($sql);
include ROOT_PATH.'/view/admin/artlist.html';
