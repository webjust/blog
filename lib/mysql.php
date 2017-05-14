<?php
/**
 * mysql操作的函数
 * @author    webjust [604854119@qq.com]
 */

/**
 * 连接数据库
 * @return    resource 成功返回一个资源
 */
function mConn()
{
    // 静态变量，使mConn在同一个页面 数据库只连接一次
    static $conn = null;
    if ($conn === null) {
        $cfg = include ROOT.'/lib/config.php';
        $conn = @mysqli_connect($cfg['host'], $cfg['user'], $cfg['password'], $cfg['db']);
        @mysqli_set_charset($conn, $cfg['charset']);
    }
    return $conn;
}

/**
 * 执行SQL语句
 * @param     string $sql
 * @return    mixed  返回布尔值或资源
 */
function mQuery($sql)
{
    $ret = @mysqli_query(mConn(), $sql);
    if($ret === false)
    {
        mLog($sql."\n" . mysqli_error());
        return $ret;
    }
    mLog($sql);
    return $ret;
}

/**
 * 查询 Select语句返回多条记录
 *
 * @param     string  $sql
 * @return    mixed array 查询到返回二维数组，查询失败返回false
 */
function mGetAll($sql)
{
    $ret = mQuery($sql);
    if (!$ret) {
        return false;
    } else{
        $arr = array();
        while ($row = mysqli_fetch_assoc($ret)) {
            $arr[] = $row;
        }
    }
    return $arr;
}

/**
* 查询 Select语句返回1条记录
*
* @param     string  $sql
* @return    mixed array 查询到返回一维数组，查询失败返回false
*/
function mFirst($sql)
{
    $ret = mQuery($sql);
    return $ret ? mysqli_fetch_assoc($ret) : false;
}

/**
 * 拼接SQL语句，并发送执行
 * @param     string $table
 * @param     array  $data
 * @param     string $act
 * @param     string $where
 * @return
 */
function mExec($table, $data, $act='insert', $where='0')
{
    if ($act == 'insert') {
        // INSERT INTO cat (catname) VALUES ('{$cat['catname']}')
        $sql = 'INSERT INTO ' . $table . '(';
        $sql .= implode(',', array_keys($data)) . ") VALUES ('";
        $sql .= implode("','", array_values($data)) . "')";
    } else if ($act == 'update') {
        $sql = 'UPDATE ' . $table . ' SET ';
        foreach ($data as $k => $v) {
            $sql .= $k . "='" . $v . "', ";
        }
        $sql = rtrim($sql, ",");
        $sql .= ' where ' . $where;
    }
    return mQuery($sql);
}

/**
 * 返回最近一次insert产生的主键
 * @param
 * @return    void
 * @author    webjust [604854119@qq.com]
 */
function getLastId()
{
    return mysqli_insert_id(mConn());
}

function mLog($log)
{
    $path = ROOT.'/log/'.date('Ymd', time()).'.txt';
    $head = '++++++++++++++++++++++++++++++++++'."\n".date('Y/m/d H:i:s', time())."\n";
    file_put_contents($path, $head.$log."\n\n", FILE_APPEND);
}