<?php
require_once("../include/db_info.inc.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];
    try {
        $sqlIDisExite = "SELECT * FROM users WHERE student_id = '$student_id'";
        $count = 0;
        foreach ($dbh->query($sqlIDisExite) as $row) {
            $count++;
            break;
        }
        if (!$count) {
            $sql = "INSERT INTO users (student_id, name, phone_num, email, password) " .
                "VALUES ('$student_id', '$name', '$phone_num', '$email', '$passwd')";
            if ($dbh->exec($sql)) {
                echo "<script language='javascript'>\n";
                echo "alert('注册成功');\n";
                echo "history.go(-2);\n";
                echo "</script>";
            }
        }else{
            echo "<script language='javascript'>\n";
            echo "alert('你的学号已经注册！！！');\n";
            echo "history.go(-1);\n";
            echo "</script>";
        }
    } catch (PDOException $e) {
        echo "<script language='javascript'>\n";
        echo "alert('数据库错误，请联系管理员: vp@mail.tust.edu.cn');\n";
        echo "history.go(-1);\n";
        echo "</script>";
    }
} else {
    header("HTTP/1.1 400 Bad Request");
}