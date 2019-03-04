<?php
/**
 * Created by PhpStorm.
 * User: oak
 * Date: 17-9-17
 * Time: 上午10:11
 */
session_start();
require_once("include/db_info.inc.php");
$success = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $department_id = $_POST['department_id'];
    $student_name = $_POST["student_name"];
    $student_id = $_POST['student_id'];
    $phone_num = $_POST['phone_num'];
    $qq = $_POST['qq'];
    $nation = $_POST['nation'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $birth_date = $_POST['birth_date'];
    $political_status = $_POST['political_status'];
    $is_adjust = $_POST['is_adjust'];
    $description1 = $_POST['description1'];
    $description2 = $_POST['description2'];
    $description3 = $_POST['description3'];
    $description4 = $_POST['description4'];

    $error = 0;
    $error_log = '';
    if (!preg_match('/(^1)[567](\d{6})/', $student_id)) {
        $error++;
        $error_log .= 'alert("学号不符合要求");';
    }
    if (!preg_match('/^1\d{10}$/', $phone_num)) {
        $error++;
        $error_log .= 'alert("手机号不符合要求");';
    }

    if (empty($department_id) || empty($student_name) || empty($qq) || empty($nation) || empty($email) ||
        empty($sex) || empty($political_status) || empty($birth_date)
    ) {
        $error++;
        $error_log .= 'alert("所有为必填项，请填写");';
    }
    $birth_date = date("Y-m-d", strtotime($birth_date));

    $token = md5($student_id . $phone_num . $department_id);
    $sql_find_token = "SELECT * FROM register_informations WHERE token = '" . $token . "'";
    $token_exists = 0;
    foreach ($dbh->query($sql_find_token) as $row) {
        $token_exists = 1;
        break;
    }
    $sql = "INSERT INTO register_informations (student_id, phone_num, 
        email, sex, nation, political_status, 
        description1, description2, description3, 
        department_id, description4, student_name, 
        qq, birth_date, register_time, is_adjust, token) values('" . $student_id . "','" . $phone_num . "','" .
        $email . "','" . $sex . "','" . $nation . "','" . $political_status . "','" .
        $description1 . "','" . $description2 . "','" . $description3 . "','" .
        $department_id . "','" . $description4 . "','" . $student_name . "','" .
        $qq . "','" . $birth_date . "', NOW(), " . $is_adjust . ", '" . $token . "')";
    if ($error != 0) {
        echo "<script language='javascript'>\n";
        echo $error_log;
        echo "history.go(-1);\n";
        echo "</script>";
    } else {
        if ($token_exists == 1) {
            echo "<script language='javascript'>\n";
            echo "alert('您已经报名此部门，请填写其他部门');";
            echo "history.go(-1);\n";
            echo "</script>";
            require_once('success.php');
        } else {
            $_SESSION['token'] = $token;
            setcookie("token", $token, time() + 60 * 60 * 24 * 3);
            if ($dbh->exec($sql)) {
                $success = 1;
                require_once('application_form.php');
                require_once('success.php');
            }
        }
    }
} else {
    header("HTTP/1.1 400 Bad Request");
}