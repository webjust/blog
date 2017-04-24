<?php
/**
 * 成功返回的信息
 *
 * @param     string 成功返回的信息
 * @return    void
 */
function success($msg='成功')
{
    $ret = 'success';
    include ROOT.'/view/admin/info.html';
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
    include ROOT.'/view/admin/info.html';
}