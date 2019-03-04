<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>教室申请信息</title>
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
<?php require_once('../include/db_info.inc.php') ?>
<?php require_once('nav.php') ?>
<?php if ($role_id == 1 || $role_id == 2 || $role_id == 2) {
    // 权限查看
    ?>
    <main>
        <div class="container">
            <h4 class="center">教室申请情况</h4>
            <table class="striped">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>申请时间</th>
                    <th>申请人</th>
                    <th>手机号</th>
                    <th>E-Mail</th>
                    <th>时间</th>
                    <th>地点</th>
                    <th>用途</th>
                    <th>状态</th>
                </tr>
                </thead>

                <tbody id="table">
                <?php
                $sql = "SELECT * FROM classroom_applications WHERE delete_time IS NULL ORDER BY finish_time ASC , is_worry DESC";
                $id = 0;
                foreach ($dbh->query($sql) as $row) {
                    ?>
                    <tr>
                        <td><?php echo ++$id; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($row['create_time'])) ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['phone_num'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><?php echo $row['location'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php if (!empty($row['finish_time'])) { ?>
                                <i class="material-icons green-text check" index="<?php echo $row['id']; ?>">check</i>
                            <?php } else if ($row['is_worry']) { ?>
                                <i class="material-icons red-text add_box" index="<?php echo $row['id']; ?>">add_box</i>
                                <?php
                            } else { ?>
                                <i class="material-icons close" index="<?php echo $row['id']; ?>">close</i>
                            <?php } ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <ul class="pagination center">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active blue-grey darken-2"><a href="#!">1</a></li>
                <li class="waves-effect disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>确认操作</h4>
                <p>此操作将会使此条记录移至未完成中，是否操作</p>
            </div>
            <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-green btn-flat">取消</a>
                <a class="modal-action modal-close waves-effect waves-green btn-flat" id="agree">确认</a>
            </div>
        </div>

    </main>
<?php } ?>
<?php require_once('footer.php') ?>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript">
    $(".button-collapse").sideNav();
    function changeStatusFinish(obj) {
        oldIcon = obj.html();
        obj.html(
            '<div class="preloader-wrapper small active" style="height: 20px;width:20px;">' +
            '<div class="spinner-layer spinner-green-only">' +
            '<div class="circle-clipper left">' +
            '<div class="circle"></div>' +
            '</div><div class="gap-patch">' +
            '<div class="circle"></div>' +
            '</div><div class="circle-clipper right">' +
            '<div class="circle"></div>' +
            '</div>' +
            '</div>' +
            '</div>');
        $.post("changestatusfinish.php", {id: obj.attr("index")}, function (data, status) {
            if (status === 'success' && data === "ok") {
                obj.addClass("green-text");
                obj.html("check");
            } else {
                obj.html(oldIcon);
                Materialize.toast('失败', 2000);
            }
        })
    }

    function changeStatusNon(obj) {
        oldIcon = obj.html();
        obj.html(
            '<div class="preloader-wrapper small active" style="height: 20px;width:20px;">' +
            '<div class="spinner-layer spinner-green-only">' +
            '<div class="circle-clipper left">' +
            '<div class="circle"></div>' +
            '</div><div class="gap-patch">' +
            '<div class="circle"></div>' +
            '</div><div class="circle-clipper right">' +
            '<div class="circle"></div>' +
            '</div>' +
            '</div>' +
            '</div>');
        $.post("changenon.php", {id: obj.attr("index")}, function (data, status) {
            if (status === 'success' && data === "ok") {
                obj.attr("class", "material-icons");
                obj.html("close");
            } else {
                obj.html(oldIcon);
                Materialize.toast('失败', 2000);
            }
        })
    }

    $("#table .close").click(function () {
        changeStatusFinish($(this));
    });

    $("#table .add_box").click(function () {
        changeStatusFinish($(this));
    });

    $("#table .check").click(function () {
        _this = $(this);
        $('#modal1').modal('open');
        $('#agree').attr('onclick', 'changeStatusNon(_this)');
    });
</script>
</body>
</html>