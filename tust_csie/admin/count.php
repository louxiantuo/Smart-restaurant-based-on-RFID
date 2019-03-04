<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>报名情况</title>
    <link rel="shortcut icon" href="/favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
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
        <h3 class="center">报名统计</h3>
        <div class="col l8 s12">
            <table class="striped">
                <thead>
                <tr>
                    <th>社团名称</th>
                    <th>报名人数</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = "SELECT id, name FROM communitys";
                foreach ($dbh->query($sql) as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <?php
                        $count_sql = "SELECT count(*) AS count FROM departments, register_informations WHERE community_id = "
                            . $row['id'] . " AND department_id = departments.id";
                        foreach ($dbh->query($count_sql) as $count_row) {
                            ?>
                            <td><?php echo $count_row['count']; ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!--Div that will hold the pie chart-->
        <div class="col l4 s12">
            <div id="chart_div"></div>
        </div>
    </div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<!--Load the AJAX API-->
<script type="text/javascript" src="js/loader.min.js"></script>
<script type="text/javascript">

    $(".button-collapse").sideNav();

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages': ['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([<?php
            $sql = "SELECT id, name FROM communitys";
            foreach ($dbh->query($sql) as $row) {
            ?>
            ['<?php echo $row['name'] ?>',
                <?php
                $count_sql = "SELECT count(*) AS count FROM departments, register_informations WHERE community_id = "
                    . $row['id'] . " AND department_id = departments.id";
                foreach ($dbh->query($count_sql) as $count_row) {
                ?>
                <?php echo $count_row['count']; ?>],
            <?php }} ?>
        ]);

        // Set chart options
        var options = {
            'title': '社团报名比例',
            'width': 400,
            'height': 300
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
</body>
</html>