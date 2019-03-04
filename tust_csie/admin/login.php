<?php
/**
 * Created by PhpStorm.
 * User: oak
 * Date: 17-9-17
 * Time: 下午4:24
 */
require_once("../include/db_info.inc.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['student_id'])) {
        echo "<script language='javascript'>\n";
        echo "alert('请输入学号!');\n";
        echo "history.go(-1);\n";
        echo "</script>";
        exit(0);
    }

    $student_id = $_POST['student_id'];
    $passwd = $_POST['password'];
    $login = check_login($student_id, $passwd);
    if ($login != false) {
        $_SESSION['student_id'] = $login;
        $sql = "SELECT * FROM privilege WHERE student_id = '$student_id'";
        $_SESSION[$row['rightstr']] = true;
        echo "<script language='javascript'> self.location='index.php';</script>";
    } else {
        echo "<script language='javascript'>\n";
        echo "alert('UserName or Password Wrong!');\n";
        echo "history.go(-1);\n";
        echo "</script>";
    }
}

function check_login($student_id, $passwd)
{
    $dbh = $GLOBALS['dbh'];
    $sql = "SELECT * FROM users WHERE student_id = '$student_id'";
    foreach ($dbh->query($sql) as $row) {
        if ($row['password'] == $passwd) {
            return $row['id'];
        }
        break;
    }
    return false;
}