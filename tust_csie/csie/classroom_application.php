<?php
require_once('../include/db_info.inc.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $worry = $_POST['worry'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $purpose = $_POST['purpose'];
    $description = $_POST['description'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $token = md5($name . $location . $time);

    $checkTokenSql = "SELECT token FROM classroom_applications WHERE token = '$token'";
    $count = 0;
    foreach ($dbh->query($checkTokenSql) as $item) {
        $count++;
        break;
    }
    if ($count) {
        echo "<script language='javascript'>\n";
        echo "alert('你已经申请当天的此间教室');";
        echo "history.go(-1);\n";
        echo "</script>";
    } else {
        $sql = "INSERT INTO classroom_applications (is_worry, email, phone_num, description, time, location, purpose, name, create_time, token) " .
            "VALUES ($worry, '$email', '$phone_num', '$description', '$time', '$location', '$purpose', '$name', now(), '$token')";
        $dbh->exec($sql);
        echo "<script language='javascript'>\n";
        echo "alert('提交成功');";
        echo "self.location='classroom_applicationpage.php';\n";
        echo "</script>";
    }
} else {
    header("HTTP/1.1 400 Bad Request");
}
