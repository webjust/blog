<?php
/**
 * 第1步：连接数据库，选择数据库
 * 第2步：判断数据库连接是否连接成功
 */
$conn = @mysqli_connect('localhost', 'root', 'root', 'demo') or die('数据库连接失败！' . mysqli_connect_error());
/**
* 第3步：设置字符集
* 第4步：准备SQL语句
* 第5步：执行SQL语句，返回受影响行数
* 第6步：关闭连接
* 第7步：获取返回结果
*/
mysqli_set_charset($conn, 'utf8');

$cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : NULL;

if (empty($_POST)) {
    // 根据cat_id查询，数据填充
    $sql = "SELECT * FROM `cat` WHERE `cat_id` = {$cat_id}";
    $ret = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($ret);

    include('./view/admin/catedit.html');
} else{
    // 修改表单
    $catname = trim($_POST['catname']);

    // 判断栏目名是否为空
    if ($catname == '') {
        die('栏目名不能为空');
    }

    $sql = "UPDATE `cat` SET `catname` = '{$catname}' WHERE `cat_id` = {$cat_id}";
    if (!mysqli_query($conn, $sql)) {
        die('操作失败'.mysqli_error());
    } else{
        echo "<script>alert('操作成功'); window.location.href='./catlist.php'</script>";
    }

}
