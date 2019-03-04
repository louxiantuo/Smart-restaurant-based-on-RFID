<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="/favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/custom.css" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php require_once('nav.php') ?>
<?php
session_start();
require_once("../include/db_info.inc.php");
if (!isset($_SESSION['student_id'])) { ?>
    <div class="container">
        <h5>你还没有登录</h5>
        <ul>
            <li><a href="loginpage.php"><i class="material-icons">cloud</i>登录</a></li>
            <li><a href="registerpage.php"><i class="material-icons">lock</i>注册</a></li>
        </ul>
    </div>
<?php } ?>
<?php require_once 'footer.php' ?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(".button-collapse").sideNav();
</script>
</body>
</html>