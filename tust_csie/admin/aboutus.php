<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>关于我们</title>
    <link rel="shortcut icon" href="/favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php require_once('nav.php') ?>
<div class="container">
    <?php
    session_start();
    require_once("../include/db_info.inc.php");
    if (!isset($_SESSION['student_id']) || !isset($_SESSION['communtiy_id'])) {
        $view_errors = "<a href=loginpage.php>请登录后进行操作</a>";
        echo $view_errors;
        exit(0);
    }
    ?>
    <div class="row">
        <h2 class="center-align"><?php
            $communtiy_id = $_SESSION['communtiy_id'];
            $sql = "SELECT * FROM communitys WHERE id = " . $communtiy_id;
            foreach ($dbh->query($sql) as $row) {
                echo $row['name'];
            }
            ?>
        </h2>
        <?php
        $communtiy_id = $_SESSION['communtiy_id'];
        $sql = "SELECT * FROM communitys WHERE id =" . $communtiy_id;
        foreach ($dbh->query($sql) as $row) {
            ?>
            <div class="col s12 m12 l12">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title"><?php echo $row['name'] ?>简介</span>
                        <p><?php echo $row['description'] ?></p>
                        <p></p>
                    </div>
                    <div class="card-action">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php
        $communtiy_id = $_SESSION['communtiy_id'];
        $sql = "SELECT * FROM departments WHERE community_id =" . $communtiy_id;
        foreach ($dbh->query($sql) as $row) {
            echo "";
            ?>
            <div class="col s12 m12 l6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"><?php echo $row['name'] ?></span>
                        <p><?php echo $row['description'] ?></p>
                        <p></p>
                    </div>
                    <div class="card-action">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(".button-collapse").sideNav();
</script>
</body>
</html>