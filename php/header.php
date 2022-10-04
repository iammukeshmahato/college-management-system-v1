<?php
session_start();
define("URL", "http://localhost/minor%20project/");
include "conn.php";
if (!isset($_SESSION['logged_user_name'])) {
    header("location:" .URL ."index.php");
}
$sql = "SELECT * FROM `Admin_list`";
$res = mysqli_query($conn, $sql);
$total_admin = mysqli_num_rows($res);

$total_faculty = mysqli_num_rows(mysqli_query($conn, "select * from `faculty`"));

?>
<link rel="shortcut icon" href="<?php echo URL ?>img/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="<?php echo URL ?>css/main.css">
<link rel="stylesheet" href="<?php echo URL ?>css/add-student-style.css">
<link rel="stylesheet" href="<?php echo URL ?>css/alertBox.css">
<link rel="stylesheet" href="<?php echo URL ?>css/style.css">
<link rel="stylesheet" href="<?php echo URL ?>css/view-student.css">
