<?php
/**
 * 第1步：连接数据库，选择数据库
 * 第2步：判断数据库连接是否连接成功
 */
$conn = @mysqli_connect('localhost', 'root', 'root', 'demo') or die('数据库连接失败！' . mysqli_connect_error());

/**
 * 第3步：设置字符集
 * 第4步：准备SQL语句
 * 第5步：执行SQL语句，返回结果集
 */
mysqli_set_charset($conn, 'utf8');

$sql = "SELECT * FROM `cat`";
$ret = mysqli_query($conn, $sql);

/**
 * 第6步：处理结果集
 * 第7步：释放结果集
 * 第8步：关闭连接
 */
if($ret)
{
    // 存储结果集
    $cat = array();
    while ($arr = mysqli_fetch_assoc($ret)) {
        $cat[] = $arr;
    }
}

mysqli_free_result($ret);
mysqli_close($conn);

// 显示分类列表页
include('./lib/init.php');
include('./view/admin/catlist.html');
?>
