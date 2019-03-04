<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>社团报名</title>
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
<div class="container">
    <div class="row">
        <h3>社团报名</h3>
        <div class="col s12 l8">
            <form method="post" action="submit.php" class="col s12">
                <div class="row">
                    <div class="l6 input-field col s12" id="select1">
                        <select>
                            <option value="0" disabled selected>请选择学生组织&社团</option>
                            <?php
                            require_once("include/db_info.inc.php");
                            $sql = "SELECT id, name FROM communitys WHERE is_take_in != 0";
                            $num = 0;
                            foreach ($dbh->query($sql) as $row) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                $num++;
                            }
                            ?>
                        </select>
                        <label>组织&社团</label>
                    </div>
                    <div class="l4 input-field col s12" id="select2">
                        <select name="department_id" disabled>
                            <option value="" disabled selected>选择部门</option>
                        </select>
                        <label>部门</label>
                    </div>
                    <div class="l12 col s12" style="margin-bottom: 50px">
                        <div class="l3 col s12">
                            <p>是否服从调剂</p>
                        </div>
                        <div class="l4 col s6">
                            <p>
                                <input class="with-gap" name="is_adjust" type="radio" id="adjust" value="0"/>
                                <label for="adjust">服从调剂</label>
                            </p>
                        </div>
                        <div class="l4 col s6">
                            <p>
                                <input class="with-gap" name="is_adjust" type="radio" id="not_adjust" value="1"/>
                                <label for="not_adjust">不服从调剂</label>
                            </p>
                        </div>
                    </div>

                    <div class="l10 input-field col s12">
                        <input id="student_name" type="text" class="validate" name="student_name" required="required">
                        <label for="student_name">姓 名</label>
                    </div>
                    <div class="l10 input-field col s12 file-field">
                        <input id="student_id" type="text" class="validate" name="student_id"
                               pattern="(^1)[567](\d{6})">
                        <label for="student_id" data-error="学号不正确">学 号</label>
                    </div>
                    <div class="l10 input-field col s12">
                        <input id="phone_num" type="tel" class="validate" name="phone_num" pattern="^1\d{10}$">
                        <label for="phone_num" data-error="手机号格式不正确">手机号</label>
                    </div>
                    <div class="l10 input-field col s12">
                        <input id="email" type="email" class="validate" name="email">
                        <label for="email">电子邮件</label>
                    </div>
                    <div class="l10 input-field col s12">
                        <input id="nation" type="text" class="validate" name="nation" required="required">
                        <label for="nation">民族</label>
                    </div>
                    <div class="l10 input-field col s12">
                        <input id="qq" type="text" class="validate" name="qq" required="required">
                        <label for="qq">QQ</label>
                    </div>
                    <div class="l12 col s12" style="margin-bottom: 50px">
                        <div class="l2 col s2">
                            <p>性别</p>
                        </div>
                        <div class="l4 col s4">
                            <p>
                                <input class="with-gap" name="sex" type="radio" id="man" value="男"/>
                                <label for="man">男</label>
                            </p>
                        </div>
                        <div class="l4 col s4">
                            <p>
                                <input class="with-gap" name="sex" type="radio" id="woman" value="女"/>
                                <label for="woman">女</label>
                            </p>
                        </div>
                    </div>
                    <div class="l10 input-field col s12">
                        <select name="political_status">
                            <option value="" disabled selected>政治面貌</option>
                            <option value="中共党员">中共党员</option>
                            <option value="预备党员">预备党员</option>
                            <option value="共青团员">共青团员</option>
                            <option value="群众">群众</option>
                            <option value="其他">其他</option>
                        </select>
                        <label>政治面貌</label>
                    </div>
                    <div class="l10 input-field col s12">
                        <input type="date" class="datepicker" name="birth_date" required="required">
                        <label for="birthdate" class="">生日</label>
                    </div>


                    <div id="description1">
                        <div class="l10 input-field col s12">
                            <textarea class="materialize-textarea" data-length="220"
                                      name="description1"></textarea>
                            <label for="description1">自我评价</label>
                        </div>
                    </div>
                    <div id="description2">
                        <div class="l10 input-field col s12">
                            <textarea class="materialize-textarea" data-length="220"
                                      name="description2"></textarea>
                            <label for="description2">部门认识</label>
                        </div>
                    </div>
                    <div id="description3">
                        <div class="l10 input-field col s12">
                            <textarea class="materialize-textarea" data-length="220"
                                      name="description3"></textarea>
                            <label for="description3">头脑风暴</label>
                        </div>
                    </div>
                    <div id="description4">
                        <div class="l10 input-field col s12">
                            <textarea class="materialize-textarea" data-length="220"
                                      name="description4"></textarea>
                            <label for="description4">个人事迹</label>
                        </div>
                    </div>


                    <div class="l10 col s12">
                        <button class="btn waves-effect waves-light" type="submit">提交
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col l4 hide-on-med-and-down">
            <?php
            $sql = 'SELECT * FROM communitys';
            foreach ($dbh->query($sql) as $row) {
                ?>
                <div class="hide" id="<?php echo $row['id'] ?>">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><?php echo $row['name'] ?></span>
                            <p><?php
                                $str = '';
                                $len = 50;
                                if (mb_strlen($row['description']) > $len) {
                                    $str = mb_substr($row['description'], 0, $len) . "...";
                                }
                                echo $str; ?></p>
                        </div>
                        <div class="card-action">
                        </div>
                    </div>

                    <?php
                    $sql = 'SELECT * FROM departments WHERE community_id = ' . $row['id'];
                    foreach ($dbh->query($sql) as $row2) {
                        ?>
                        <div class="card darken-1">
                            <div class="card-content">
                                <span class="card-title"><?php echo $row2['department_name'] ?></span>
                                <p><?php
                                    $str = '';
                                    $len2 = 25;
                                    if (mb_strlen($row2['description']) > $len2) {
                                        $str = mb_substr($row2['description'], 0, $len2) . "...";
                                    }
                                    echo $str; ?></p>
                            </div>
                            <div class="card-action">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once 'footer.php' ?>
</body>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript">
    $(".button-collapse").sideNav();
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });

    $(document).ready(function () {
        $('textarea#description1').characterCounter();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 50 // Creates a dropdown of 15 years to control year
    });

    $(".button-collapse").sideNav();

    $("#student_id").change(function () {
        var pattern = /(^1)[567](\d{6})$/;
        if (pattern.test(name)) {
            $("#student_id");
        }
    });

    $(document).ready(function () {
        $("#select1 ul li").click(function () {
            var value = $(this).index();
            value = $("#select1 select option").eq(value).val();
            value = Number(value);
            <?php
            $sql = 'SELECT id FROM communitys';
            foreach ($dbh->query($sql) as $row) {
            ?>
            $("#<?php echo $row['id']; ?>").addClass('hide');
            <?php } ?>
            $("#" + value).removeClass('hide');
            $('#select2 select').removeAttr("disabled");

            $("#description3").addClass('hide');
            $("#description4").addClass('hide');
            $("#description3 textarea").removeAttr("name");
            $("#description4 textarea").removeAttr("name");
            $("#description3 div").html('<textarea class="materialize-textarea" data-length="220" ' +
                'name="description3"></textarea>' +
                '<label for="description3">头脑风暴</label>');
            switch (value) {
            <?php
                $sql = 'SELECT * FROM communitys';
                foreach ($dbh->query($sql) as $row2) {
                    echo 'case ' . $row2['id'] . ' :';
                    $sql_select_department = "SELECT
                          departments.id,
                          name,
                          department_name
                        FROM communitys, departments
                        WHERE communitys.id = " . $row2['id'] . " AND communitys.id = community_id";
                    $result = '<option value="" disabled selected>选择部门</option>';
                    foreach ($dbh->query($sql_select_department) as $row) {
                        $result .= '<option value="' . $row['id'] . '">' . $row['department_name'] . '</option>';
                    }

                    echo '$("#description1 label").html("' . $row2['information1'] . '");';
                    echo '$("#description2 label").html("' . $row2['information2'] . '");';
                    if (!empty($row2['information3'])) {
                        echo '$("#description3 label").html("' . $row2['information3'] . '");';
                        echo '$("#description3").removeClass("hide");';
                        echo '$("#description3 textarea").attr({"name": "description3"});';
                        echo '$("#description3 label").html("' . $row2['information3'] . '");';
                    }
                    if (!empty($row2['information4'])) {
                        echo '$("#description4 label").html("' . $row2['information4'] . '");';
                        echo '$("#description4").removeClass("hide");';
                        echo '$("#description4 textarea").attr({"name": "description4"});';
                        echo '$("#description4 label").html("' . $row2['information4'] . '");';
                    }
                    echo '$("#select2 select").html(\'' . $result . '\');';
                    if ($row2['id'] == 1) {
                        echo "$(\"#description3 div\").html($(\"#description3 div\").html() +
                        '<a class=\"waves-effect waves-light btn modal-trigger right\" href=\"#modal1\">' +
                        '查看问题</a> <div id=\"modal1\" class=\"modal\">' +
                        '<div class=\"modal-content\">' +
                        '<h4>头脑风暴</h4>' +
                        '<p><b>秘书部</b>：请用五个词来描述一下你自己。</p>' +
                        '<p><b>生活部</b>：如果你进入了生活部工作，现在需要结合生活部的特点想出一个活动。</p>' +
                        '<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' +
                        '你有什么想法？简述活动流程与实施计划。</p>' +
                        '<p><b>文体部</b>：如果策划并组织一个活动，你认为什么是最关键、重要的？</p>' +
                        '<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' +
                        '如何让那些有才艺又不积极的同学上台演出？</p>' +
                        '<p><b>宣传部</b>：1.个人与团队工作的看法     2.个人学习时间与工作时间的协调</p>' +
                        '<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' +
                        '3.在社团坚持到底 不忘初心</p>' +
                        '<p><b>学习部</b>：请用以下关键词，来编写一个不少于80字的小故事。</p>' +
                        '<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' +
                        '关键词：温馨，教室，镜子，电脑，水</p>' +
                        '</div>' +
                        '<div class=\"modal-footer\">' +
                        '</div>' +
                        '</div>');";
                        echo " $('.modal').modal();";
                    }
                    echo "break;\n";
                }
                ?>
            }
            $('#select2 select').material_select();
        })
    });
</script>
</body>
</html>