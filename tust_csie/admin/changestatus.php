<?php
/**
 * Created by PhpStorm.
 * User: oak
 * Date: 17-9-24
 * Time: 上午10:57
 */
session_start();
if (!isset($_SESSION['student_id']) || !isset($_SESSION['communtiy_id'])) {
    $view_errors = "<a href=loginpage.php>请登录后进行操作</a>";
    echo $view_errors;
    exit(0);
}
if (!empty($_POST['status'])) {
    require_once("../include/db_info.inc.php");
    $sql = 'UPDATE register_informations SET status = ' . $_POST['status'] . ' WHERE token = "' . $_POST['user'] . '"';
    if ($dbh->exec($sql) == 0) {
        echo "<script language='javascript'>\n";
        echo "history.go(-2);\n";
        echo "</script>";
    } else {
        echo "<script language='javascript'>\n";
        echo "alert('更改失败');\n";
        echo "history.go(-1);\n";
        echo "</script>";
    }
}else{
    echo "<script language='javascript'>\n";
    echo "alert('请选择');\n";
    echo "history.go(-1);\n";
    echo "</script>";
}