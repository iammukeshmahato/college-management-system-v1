<?php
session_start();
include "conn.php";
include "./validate.php";
if (!isset($_SESSION['logged_user_name'])) {
    header("location:" . URL . "index.php");
}

$name = validate_script(mysqli_real_escape_string($conn, $_POST['admin_name']));

$isValidName = validate_name("admin_name_error", $name);
$isValidName ? $isValidName = 1 : $isValidName = 0;

echo ($isValidName . "\n" . $_SESSION['nameError'] . "\n" . $_SESSION['admin_name_error']);

if ($isValidName) {
    $id = $_SESSION['logged_user_id'];
    $sql = "UPDATE Admin_list SET `fullname` = '$name' WHERE `id` = $id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['logged_user_name'] = $name;
        echo "\nupdated";
    } else {
        echo "\nerror";
    }
}
