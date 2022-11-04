<?php
session_start();
include "conn.php";
include "./validate.php";
if (!isset($_SESSION['logged_user_name'])) {
    header("location:" . URL . "index.php");
}

$name = validate_script(mysqli_real_escape_string($conn, $_POST['admin_username']));
$isValidUsername = validate_username("admin_name_error", $name);
$isValidUsername ? $isValidUsername = 1 : $isValidUsername = 0;

echo ($isValidUsername . "\n" . $_SESSION['usernameError'] . "\n" . $_SESSION['admin_name_error']);

if ($isValidUsername) {
    $id = $_SESSION['logged_user_id'];
    $sql = "UPDATE Admin_list SET `username` = '$name' WHERE `id` = $id";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "\nupdated";
    } else {
        echo "\nerror";
    }
}
