<?php
$cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : NULL;

// 判断栏目是否存在，是否不是数字
if (!$cat_id || !is_numeric($cat_id)) {
    die("传递非法值");
}

$conn = @mysqli_connect('localhost', 'root', 'root', 'demo') or die('数据库连接失败！' . mysqli_connect_error());
mysqli_set_charset($conn, 'utf8');

// 判断该栏目下，是否有文章
$sql = "SELECT COUNT(*) FROM `art` WHERE cat_id = {$cat_id}";
$ret = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($ret);
if ($row[0] != 0) {
    die("该栏目下，有文章不能被删除");
}

// 查询该栏目是否存在
$sql = "SELECT COUNT(*) FROM `cat` WHERE cat_id = {$cat_id}";
$ret = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($ret);
if ($row[0] == 0) {
    die("栏目不存在");
}

// 删除目录
$sql = "DELETE FROM `cat` WHERE `cat_id` = {$cat_id}";
$ret = mysqli_query($conn, $sql);
if ($ret) {
    echo "删除成功";
} else {
    die("删除失败".mysqli_error());
}
