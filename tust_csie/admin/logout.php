<?php session_start();
unset($_SESSION['student_id']);
unset($_SESSION['rightstr']);
session_destroy();
header("Location:index.php");
?>
