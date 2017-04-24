<?php
include './lib/init.php';
$art_id = isset($_GET['art_id']) ? $_GET['art_id'] : NULL;
if ($art_id) {
    // 删除操作
    $sql = "DELETE FROM `art` WHERE `art_id` = ".$art_id;
    if (!mQuery($sql)) {
        echo redirect('删除失败', './artlist.php');
    } else{
        echo redirect('删除成功', './artlist.php');
    }
} else {
    error('非法操作');
}
