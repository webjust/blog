<?php
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