<?php
<<<<<<< HEAD
function succ($msg='成功')
{
	$res = "success";
	include ROOT.'/view/admin/info.html';
	exit();
}

function error($msg='失败')
{
	$ret = "fail";
	include ROOT.'/view/admin/info.html';
	exit();
}
=======
/**
 * 成功返回的信息
 *
 * @param     string 成功返回的信息
 * @return    void
 */
function success($msg='成功')
{
    $ret = 'success';
    include ROOT_PATH.'/view/admin/info.html';
}

/**
 * 失败返回的信息
 *
 * @param     string 成功返回的信息
 * @return    void
 */
function error($msg='失败')
{
    $ret = 'error';
    include ROOT_PATH.'/view/admin/info.html';
}

function redirect($msg='提示消息', $url)
{
    return "<script>alert('{$msg}'); window.location.href='{$url}'</script>";
}
>>>>>>> 6d2d775a9d24c1c42e9171962e6cf3fc62790a76
