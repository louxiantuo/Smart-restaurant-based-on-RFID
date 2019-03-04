<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看</title>
    <link rel="shortcut icon" href="/favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php
require_once('nav.php');
session_start();
if (!isset($_SESSION['student_id']) || !isset($_SESSION['communtiy_id'])) {
    $view_errors = "<a href=loginpage.php>请登录后进行操作</a>";
    echo $view_errors;
    exit(0);
}
require_once("../include/db_info.inc.php");
$sql = 'SELECT *
FROM departments, communitys, register_informations
WHERE token = "' . $_GET["user"] . '" AND department_id = departments.id AND community_id = communitys.id AND communitys.id = ' . $_SESSION['communtiy_id'];
?>

<div class="container">
    <div class="row">
        <h2>报名详情</h2>
        <div class="col s12 l12">
            <?php foreach ($dbh->query($sql) as $row) { ?>
                <div class="collection">
                    <a class="collection-item">姓名：<?php echo $row['student_name'] ?></a>
                    <a class="collection-item">学号：<?php echo $row['student_id'] ?></a>
                    <a class="collection-item">手机号：<?php echo $row['phone_num'] ?></a>
                    <a class="collection-item">政治面貌：<?php echo $row['political_status'] ?></a>
                    <a class="collection-item">QQ：<?php echo $row['qq'] ?></a>
                    <a class="collection-item">出生年月：<?php echo $row['birth_date'] ?></a>
                </div>
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">filter_drama</i>
                            <?php echo $row['information1'] ?>
                            <span class="new badge">1</span></div>
                        <div class="collapsible-body"><p><?php echo $row['description1'] ?></p></div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <i class="material-icons">place</i>
                            <?php echo $row['information2'] ?>
                            <span class="badge">1</span></div>
                        <div class="collapsible-body"><p><?php echo $row['description2'] ?></p></div>
                    </li>
                    <?php if (!empty($row['information3'])) { ?>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">content_paste</i>
                                <?php echo $row['information3'] ?>
                                <span class="new badge">1</span></div>
                            <div class="collapsible-body"><p><?php echo $row['description3'] ?></p></div>
                        </li>
                    <?php } ?>
                    <?php if (!empty($row['information4'])) { ?>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">cloud_queue</i>
                                <?php echo $row['information4'] ?>
                                <span class="badge">1</span></div>
                            <div class="collapsible-body"><p><?php echo $row['description4'] ?></p></div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <form method="post" action="changestatus.php">
                <input placeholder="Placeholder" name="user" type="text" class="hide"
                       value="<?php echo $_GET['user'] ?>">
                <select name="status">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="0">未面试</option>
                    <option value="1">待定</option>
                    <option value="2">通过</option>
                    <option value="3">不通过</option>
                </select>
                <label>Materialize Select</label>
                <button class="btn waves-effect waves-light right" type="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
            </form>
            <a class="btn-floating btn-large waves-effect waves-light green" href="setregister.php">
                <i class="material-icons">arrow_back</i>
            </a>
        </div>
        <div class="col l4 hide-on-med-and-down"></div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });
</script>
</body>
</html>