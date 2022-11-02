<?php
session_start();
include "conn.php";
if (!isset($_SESSION['logged_user_name'])) {
    header("location:" . URL . "index.php");
}

$path = "../pp/";
$name = $path . $_FILES['ProfileImage']['name'];
$type = pathinfo($name, PATHINFO_EXTENSION);
$tmp_name = $_FILES['ProfileImage']['tmp_name'];
$canUpload = true;

if ($_FILES['ProfileImage']['size'] > 2000000) {
    echo "The image size is too large. image should be less than 2MB<br>";
    $canUpload = false;
}

if ($type != "jpg" && $type != "jpeg" && $type != "gif" && $type != "png") {
    echo "only jpg, jpeg gif and png format is allowed<br>";
    $canUpload = false;
}

if ($canUpload) {
    if (file_exists($name)) {
        echo "OK";
        $_SESSION['logged_user_pp'] = $_FILES['ProfileImage']['name'];
    } else if (move_uploaded_file($tmp_name, $name)) {

        // updating image id into the database

        $id = $_SESSION['logged_user_id'];
        $imgName = $_FILES['ProfileImage']['name'];
        $sql = "UPDATE `Admin_list` SET `image_id` = '$imgName' where id = $id";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "OK";
            $_SESSION['logged_user_pp'] = $imgName;
        } else
            echo "something went wrong.";
    } else {
        echo "something went wrong. can't upload file.";
    }
}
