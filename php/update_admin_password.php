<?php

session_start();
include "conn.php";
include "./validate.php";
if (!isset($_SESSION['logged_user_name'])) {
    header("location:" . URL . "index.php");
}

$current_pass = mysqli_real_escape_string($conn, $_POST['currentPassword']);
$new_pass = mysqli_real_escape_string($conn, $_POST['newPassword']);
$confirm_pass = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

if (($current_pass != "" && $new_pass != "" && $confirm_pass != "") && ($new_pass == $confirm_pass)) {
    // checking for the password from database

    $id = $_SESSION['logged_user_id'];
    $current_pass = md5($current_pass);

    $sql = "SELECT * FROM Admin_list WHERE id = $id AND `password` = '$current_pass'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        // if password mathced in database
        
        $new_pass = md5($new_pass);
        $updatePassSQL = "UPDATE `Admin_list` SET `password` = '$new_pass' WHERE id = $id";
        $update_res = mysqli_query($conn, $updatePassSQL);

        if ($updatePassSQL) {
            echo "updated successfully";
        }else{
            echo "something went wrong";
        }
    } else {
        echo "not mathced";
    }
} else {
    // if null data is passed and pass not equal
    echo "\nnull or not matched\n";
}