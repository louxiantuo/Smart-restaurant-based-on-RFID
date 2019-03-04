<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/favicon.png">
    <title>管理员登录</title>
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
<main>
    <div class="container">
        <h5 class="center-align">管理员登录</h5>
        <div class="col s3 offset-s3">
            <form action="login.php" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="student_id" type="text" name="student_id" class="validate">
                        <label for="student_id">学 号</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">密 码</label>
                    </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit">登录</button>
                <button class="btn waves-effect waves-light" type="reset">重置</button>
            </form>
        </div>
    </div>
</main>
<?php require_once('footer.php') ?>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/md5.min.js"></script>
<script type="text/javascript">
    $(".button-collapse").sideNav();
    $("form").submit(function () {
        if ($("#student_id").val() == '') {
            Materialize.toast("请输入学号", 2000);
            return false;
        } else if ($("#password").val() == '') {
            Materialize.toast("请输入密码", 2000);
            return false;
        }
        $("#password").val(hex_md5($("#password").val()));
        return true;
    });
</script>
</body>
</html>