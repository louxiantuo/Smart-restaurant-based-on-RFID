<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>天津科技大学计算机学院社团报名网站</title>
    <link rel="shortcut icon" href="/favicon.png">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/materialize.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<!--导航栏-->
<nav style="background-color: #fff;">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo"><img src="img/csie.png"
                                            style="width: 60px;height: 60px;background-size: cover"></a>
        <ul id="nav-mobile" class="right ">
            <li><a href="enroll.php" class="light-blue-text text-accent-3">我要报名</a></li>
            <li><a href="http://www.tust.edu.cn/">学校主页</a></li>
            <li><a href="http://csie.tust.edu.cn/">学院主页</a></li>
            <li><a href="https://celitea.cn/">计算机精英协会</a></li>
            <?php if (isset($_COOKIE["token"])) { ?>
                <li><a class="waves-effect waves-light btn"
                       href="application_doc/<?php echo $_COOKIE["token"] . '.docx' ?>" target="_Blank">下载报名表</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>
<!--横幅图片-->
<div class="carousel carousel-slider center" data-indicators="true">
    <div class="carousel-fixed-item center" id="button">
        <a class="btn waves-effect cyan" href="enroll.php">JOIN US!</a>
    </div>
    <div class="carousel-item white-text" href="#one!"
         style="background-image: url('./img/bg201410.jpg');background-size: cover; ">
        <h2 style="font-size: 35px;text-transform: uppercase  ;">Welcome To College of Computer Science & Information
            Engineering</h2>
        <p class="white-text" style="font-family: 微软雅黑;font-size:26px;">计算机科学与信息工程学院</p>
    </div>

</div>

<!--搜索栏-->
<div style="background-color:#2c3e50;height: 64px">
    <div class="nav-wrapper">
        <form class="search-form center-align">
            <input type="text" id="input">
            <a class="waves-effect waves-light btn" id="a">搜索</a>
        </form>
    </div>
</div>


<div class="row center-align">
    <h4>学院社团</h4>
    <p>计 算 机 学 院 学 生 组 织 & 社 团</p>
</div>

<!--转动轮播图-->
<div class="carousel" id="carousel">
    <?php require_once 'include/db_info.inc.php';
    $sql = "SELECT * FROM communitys";
    foreach ($dbh->query($sql) as $row) { ?>
        <a class="carousel-item">
            <img src="image/<?php echo $row['name'] ?>.jpg">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">
                        <p style="line-height: 1.5;">
                            <strong style="font-size: 25px"><?php echo $row['name'] ?></strong>
                            <button data-target="modal<?php echo $row['id'] ?>" class="btn modal-trigger">
                                <i class="material-icons">chevron_right </i></button>
                            <br><?php
                            $str = '';
                            $len = 29;
                            if (mb_strlen($row['description']) > $len) {
                                $str = mb_substr($row['description'], 0, $len) . "...";
                            }
                            echo $str; ?>
                        </p>
                    </div>
                </li>
            </ul>
        </a>
    <?php } ?>
</div>

<!--轮播图详细信息弹窗-->
<?php
$sql = "SELECT * FROM communitys";
foreach ($dbh->query($sql) as $row) { ?>
    <div id="modal<?php echo $row['id'] ?>" class="modal blue-grey darken-1">
        <div class=" modal-content card blue-grey darken-1">
            <div class="card-content white-text">
                <div class="row">
                    <h3 class="center-align"><?php echo $row['name'] ?></h3>
                    <div class="col s12 m12 l12">
                        <span class="card-title">简介</span>
                        <p><?php echo $row['description'] ?>
                        <div class="card-action"><a></a></div>
                    </div>

                    <?php
                    $sql_select_communitys = "SELECT * FROM departments WHERE community_id = " . $row['id'];
                    foreach ($dbh->query($sql_select_communitys) as $row2) { ?>
                        <div class="col s12 m12 l12">
                            <span class="card-title"><?php echo $row2['department_name']?>简介</span>
                            <p><?php echo $row2['description']?>
                            <div class="card-action"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!--学院简介-->
<div class="row center-align">
    <h4>学院简介</h4>
    <p>计 算 机 科 学 与 信 息 工 程 学 院</p>
    <p> （College of Computer Science and Information Engineering）</p>
</div>
<div class="row">
    <div class="col s12 m8 l8 offset-l2 offset-m2">
        <div class="card">
            <div class="card-content" style="border-top: 7px solid #00e5ff">
                <p>
                    计算机科学与信息工程学院成立于2003年，其前身为成立于2000年的计算机系。学院以本科教育为主，稳步发展研究生教育，积极开展中外合作办学。近年来，学院在学科建设、教学改革、师资队伍建设、学风建设以及实验室建设方面取得了丰硕成果。
                    学院从国内外知名大学引进多名博士，现拥有一支学历层次较高、知识结构、学缘结构较为合理且充满活力的教学、科研队伍。目前学院专任教师80余人，其中天津市特聘教授1名，天津市教学名师1名，博士生导师2名，教授7名，客座教授2名，副教授18名，具有海外经历的教师9名，其中欧美留学博士1人，日韩留学博士3人，加拿大留学博士后1人...</p>
            </div>
            <div class="card-action ">
                <a href="http://csie.tust.edu.cn/" class="cyan-text text-lighten-1">CLICK IT</a>
            </div>
        </div>
    </div>
</div>

<!--页尾-->
<footer class="page-footer " style="background-color:#2c3e50;">
    <div class="container">
        <div class="row">
            <div class="col l2 m2 s12 offset-l1 offset-m1">
                <h5 class="cyan-text text-lighten-1">院办电话</h5>
                <p class="grey-text">院办电话：022-60662573</p>
            </div>
            <div class="col l2 m2 s12">
                <h5 class="cyan-text text-lighten-1">学办电话</h5>
                <p class="grey-text">学办电话：022-60662554</p>
            </div>
            <div class="col l2 m2 s12">
                <h5 class="cyan-text text-lighten-1">微信公众号</h5>
                <p class="grey-text">微信公众号：tust_csie</p>
            </div>
            <div class="col l2 m2 s12">
                <h5 class="cyan-text text-lighten-1">院长信箱</h5>
                <p class="grey-text">院长信箱：jcyang@tust.edu.cn</p>
            </div>
            <div class="col l2 m2 s12">
                <h5 class="cyan-text text-lighten-1">书记信箱</h5>
                <p class="grey-text ">书记信箱：zhgs@tust.edu.cn</p>
            </div>
        </div>
    </div>
    <div class="footer-copyright  ">
        <div class="container center-align">
            <a class="grey-text">如有任何问题，请联系管理员：<a href="mailto:vp@mail.tust.edu.cn">admin</a></a>
            <p></p>
            <a class="grey-text">All Copyright Reserved 2017 本网站由计算机精英协会维护</a>

        </div>
    </div>
</footer>

<!--Import jQuery before materialize.js-->
<script src="js/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $('.carousel.carousel-slider').carousel({fullWidth: true});

    $(document).ready(function () {
        $('.carousel').carousel({dist: -20});
        $('.carousel').carousel({indicators: true});
        $('.carousel').carousel({shift: 40});
        $('.carousel').carousel();
        $('.modal').modal();
    });

    $(document).ready(function () {
        // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: 0, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 200, // Transition out duration
            startingTop: '40%', // Starting top style attribute
            endingTop: '5%' // Ending top style attribute
        });
    });
</script>
</body>
</html>