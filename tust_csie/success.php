<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>报名成功</title>
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
<?php
require_once('nav.php') ?>
<?php if ($success == 1) {
    ?>
    <h1 class="center">报名成功</h1>
    <p class="center">您已报名成功，请您下载您的<a href="application_doc/<?php echo $_SESSION['token'] . '.docx' ?>" target="_Blank">报名表</a>，调整适当格式并打印。
    </p>
    <p class="center red-text">请务必收好报名表，此报名表只可下载一次。</p>
<?php } ?>
<?php require_once('footer.php') ?>
</body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(".button-collapse").sideNav();
</script>
</html>