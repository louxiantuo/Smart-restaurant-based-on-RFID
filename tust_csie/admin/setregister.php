<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>报名信息</title>
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
<?php
session_start();
require_once("../include/db_info.inc.php");
if (!isset($_SESSION['student_id']) || !isset($_SESSION['communtiy_id'])) {
    $view_errors = "<a href=loginpage.php>请登录后进行操作</a>";
    echo $view_errors;
    exit(0);
}
?>

<div class="container">
    <div class="row">
        <h3 class="center-align">
            <?php
            $communtiy_id = $_SESSION['communtiy_id'];
            $sql = "SELECT * FROM communitys WHERE id = " . $communtiy_id;
            foreach ($dbh->query($sql) as $row) {
                echo $row['name'];
            }
            ?>
        </h3>
        <div class="col s12 m12 l12">
            <table class="striped">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>学号</th>
                    <th>姓名</th>
                    <th>部门</th>
                    <th>电话</th>
                    <th>qq</th>
                    <th>报名时间</th>
                    <th>面试状态</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = "SELECT " .
                    "register_informations.student_id," .
                    "register_informations.student_name," .
                    "register_informations.phone_num," .
                    "register_informations.email," .
                    "register_informations.qq," .
                    "register_informations.register_time," .
                    "register_informations.token," .
                    "register_informations.status," .
                    "departments.department_name " .
                    "FROM register_informations, departments " .
                    "WHERE departments.community_id = "
                    . $communtiy_id .
                    " AND register_informations.department_id = departments.id";
                $i = 0;
                foreach ($dbh->query($sql) as $row) {
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['student_id'] ?></td>
                        <td><?php echo $row['student_name'] ?></td>
                        <td><?php echo $row['department_name'] ?></td>
                        <td><?php echo $row['phone_num'] ?></td>
                        <td><?php echo $row['qq'] ?></td>
                        <td><?php echo $row['register_time'] ?></td>
                        <td><?php switch ($row['status']) {
                                case 0:
                                    echo '未面试';
                                    break;
                                case 1:
                                    echo '待定';
                                    break;
                                case 2:
                                    echo '通过';
                                    break;
                                case 3:
                                    echo '不通过';
                                    break;
                            } ?></td>
                        <td><a href="view.php?user=<?php echo $row['token'] ?>">查看</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
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