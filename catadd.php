<?php
// 判断表单是否有post提交
if (empty($_POST))
{
    include('./view/admin/catadd.html');
} else {
    // 如有post提交，则判断catename是否为空
    $cat['catname'] = trim($_POST['catname']);
    if (empty($cat['catname'])) {
        exit('栏目名称不能为空');
    }

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

    // 查询数据库，判断是否重名 ...

    $sql = "INSERT INTO cat (catname) VALUES ('{$cat['catname']}')";
    $ret = mysqli_query($conn, $sql);
    mysqli_close($conn);

    if($ret)
    {
        echo "<script>alert('操作成功'); window.location.href='./catlist.php'</script>";
    } else{
        echo "添加失败" . mysqli_connect_error();
    }
}
?>
