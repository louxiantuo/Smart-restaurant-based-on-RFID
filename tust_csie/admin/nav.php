<?php
require_once('../include/db_info.inc.php');
session_start();
?>
<header>
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a class="brand-logo">Logo</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <!--                    <li><a href="index.php">主页</a></li>-->
                </ul>
                <ul class="side-nav" id="mobile-demo"><?php if (!isset($_SESSION['student_id'])) {
                        // 没有登录 ?>
                        <li>
                            <div class="user-view">
                                <div class="background">
                                    <img src="images/backgroud.jpg">
                                </div>
                                <a><img class="circle" src="images/yuna.png"></a>
                                <?php ?>
                                <a><span class="white-text name"></span></a>
                                <a><span class="white-text email"></span></a>
                            </div>
                        </li>
                        <li><a href="loginpage.php"><i class="material-icons">cloud</i>登录</a></li>
                        <li><a href="registerpage.php"><i class="material-icons">lock</i>注册</a></li>
                    <?php } else {
                        // 登录后
                        $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['student_id'] . "'";
                        $name = '';
                        $student_id = '';
                        $email = '';

                        foreach ($dbh->query($sql) as $row) {
                            $name = $row['name'];
                            $student_id = $row['student_id'];
                            $email = $row['email'];
                        }
                        ?>
                        <li>
                            <div class="user-view">
                                <div class="background">
                                    <img src="images/backgroud.jpg">
                                </div>
                                <a><img class="circle" src="images/yuna.png"></a>
                                <?php ?>
                                <a><span class="white-text name">姓名：<?php echo $name ?></span></a>
                                <a><span class="white-text email">E-Mail: <?php echo $email ?></span></a>
                            </div>
                        </li>
                        <li><a href="logout.php"><i class="material-icons">exit_to_app</i>注销</a></li>
                    <?php } ?>


                    <?php // 查看权限信息
                    $sql_roles = "SELECT * FROM privilege WHERE user_id = '$student_id'";
                    $role_id = 0;               // 权限
                    $role_department_id = 0;    // 社团部门权限
                    foreach ($dbh->query($sql_roles) as $row) {
                        $role_id = $row['role_id'];
                        $role_department_id = $row['department_id'];
                    } ?>

                    <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3) { ?>
                        <li>
                            <div class="divider"></div>
                        </li>

                        <li><a href="classapplicationpage.php"><i class="material-icons">account_balance</i>教室申请信息</a>
                        </li>
                    <?php } ?>

                    <li>
                        <div class="divider"></div>
                    </li>
                    <li><a class="subheader">其它地方的 Celitea</a></li>
                    <li><a class="waves-effect" href="https://celitea.cn">Celitea</a></li>
                    <li><a class="waves-effect" href="https://acm.celitea.cn">Online Judge</a></li>
                    <li><a class="waves-effect" href="https://github.com/TUST-Celitea">GitHub</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav fixed">
        <?php if (!isset($_SESSION['student_id'])) {
            // 没有登录 ?>
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="images/backgroud.jpg">
                    </div>
                    <a><img class="circle" src="images/yuna.png"></a>
                    <?php ?>
                    <a><span class="white-text name"></span></a>
                    <a><span class="white-text email"></span></a>
                </div>
            </li>
            <li><a href="loginpage.php"><i class="material-icons">cloud</i>登录</a></li>
            <li><a href="registerpage.php"><i class="material-icons">lock</i>注册</a></li>
        <?php } else {
            // 登录后
            $sql = "SELECT * FROM users WHERE id = '" . $_SESSION['student_id'] . "'";
            $name = '';
            $student_id = '';
            $email = '';

            foreach ($dbh->query($sql) as $row) {
                $name = $row['name'];
                $student_id = $row['student_id'];
                $email = $row['email'];
            }
            ?>
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="images/backgroud.jpg">
                    </div>
                    <a><img class="circle" src="images/yuna.png"></a>
                    <?php ?>
                    <a><span class="white-text name">姓名：<?php echo $name ?></span></a>
                    <a><span class="white-text email">E-Mail: <?php echo $email ?></span></a>
                </div>
            </li>
            <li><a href="logout.php"><i class="material-icons">exit_to_app</i>注销</a></li>
        <?php } ?>

        <?php // 查看权限信息
        $sql_roles = "SELECT * FROM privilege WHERE user_id = '$student_id'";
        $role_id = 0;               // 权限
        $role_department_id = 0;    // 社团部门权限
        foreach ($dbh->query($sql_roles) as $row) {
            $role_id = $row['role_id'];
            $role_department_id = $row['department_id'];
        } ?>

        <?php if (classRoomApplicationAuthority($role_id)) { ?>
            <li>
                <div class="divider"></div>
            </li>

            <li><a href="classapplicationpage.php"><i class="material-icons">account_balance</i>教室申请信息</a></li>
        <?php } ?>

        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">其它地方的 Celitea</a></li>
        <li><a class="waves-effect" href="https://celitea.cn">Celitea</a></li>
        <li><a class="waves-effect" href="https://acm.celitea.cn">Online Judge</a></li>
        <li><a class="waves-effect" href="https://github.com/TUST-Celitea">GitHub</a></li>
    </ul>
</header>