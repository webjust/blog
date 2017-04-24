<?php
include './lib/init.php';
// 从数据库取出栏目数据
$sql = "SELECT * FROM `cat`";
$cat = mGetAll($sql);

if (empty($_POST)) {
    include ROOT_PATH.'/view/admin/artadd.html';
} else {
    $data = array(
        'title' => isset($_POST['title']) ? $_POST['title'] : "",
        'cat_id' => isset($_POST['cat_id']) ? $_POST['cat_id'] : "",
        'content' => isset($_POST['content']) ? $_POST['content'] : "",
        'pubtime' => time(),
    );

    // tags: 使用,分隔 插入tag表

    // 简单的校验
    if (empty(trim($data['title']))) {
        echo redirect('标题不能为空', './artadd.php');
    }
    if (empty(trim($data['cat_id']))) {
        echo redirect('必须选择栏目', './artadd.php');
    }
    if (empty(trim($data['content']))) {
        echo redirect('内容不能为空', './artadd.php');
    }

    // 发布文章
    if(!mExec('art', $data))
    {
        echo redirect('发布失败', './artadd.php');
    } else{
        echo redirect('发布成功', './artlist.php');
    }
}
