<?php
/**
 * Created by PhpStorm.
 * User: oak
 * Date: 17-10-26
 * Time: 下午5:13
 */
require_once('../include/db_info.inc.php');
session_start();


if (isset($_SESSION['student_id'])) {
    $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['student_id'] . "'";
    $student_id = '';

    foreach ($dbh->query($sql) as $row) {
        $student_id = $row['student_id'];
    }

    $sql_roles = "SELECT * FROM privilege WHERE user_id = '$student_id'";
    $role_id = 0;               // 权限
    foreach ($dbh->query($sql_roles) as $row) {
        $role_id = $row['role_id'];
    }

    if (classRoomApplicationAuthority($role_id)) {
        $id = $_POST['id'];
        $sql = "UPDATE classroom_applications SET finish_time = now() WHERE id = $id";
        try {
            $dbh->exec($sql);
            echo "ok";
        } catch (PDOException $e) {
            error();
        }
    }
}