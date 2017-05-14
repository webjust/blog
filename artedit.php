<?php
include './lib/init.php';
$art_id = isset($_GET['art_id']) ? $_GET['art_id'] : NULL;
if ($art_id) {
    // 编辑操作
    if (empty($_POST)) {
        // 数据填充
        $cats = mGetAll("SELECT * FROM `cat`");
        // 文章数据
        $sql = "SELECT * FROM `art` WHERE `art_id` = {$art_id}";
        $art = mFirst($sql);
        include ROOT_PATH.'/view/admin/artedit.html';
    } else {
        // 数据校验
        if (!is_numeric($art_id)) {
            error('非法操作');
        }

        // 数据准备
        $data = array(
            'title' => isset($_POST['title']) ? $_POST['title'] : "",
            'cat_id' => isset($_POST['cat_id']) ? $_POST['cat_id'] : "",
            'content' => isset($_POST['content']) ? $_POST['content'] : "",
            'lastup' => time(),
            'art_id' => isset($_POST['art_id']) ? $_POST['art_id'] : "",
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

        // 查询该文章是否存在
        $sql = "SELECT * FROM `art` WHERE `art_id` = {$data['art_id']}";

        if(mFirst($sql) == false)
        {
            error("非法操作");
        }

        // 执行修改操作
        if (mExec('art', $data, 'update', 'art_id = '.$data['art_id'])) {
            echo redirect('操作成功', './artlist.php');
        } else {
            echo redirect('操作失败', './artlist.php');
        }



    }
} else {
    error('非法操作');
}
