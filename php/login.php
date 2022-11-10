<?php
session_start();
include("./conn.php");

//capturing the user inputs
$uname = mysqli_real_escape_string($conn, $_POST['Username']);
$pass = md5(mysqli_real_escape_string($conn, $_POST['Password']));
$submitBtn = $_POST['submit'];

// checking if user have clicked submit btn or not
if (!isset($submitBtn)) {
    $_SESSION['msg'] = "Please Login to continue!!!";
    header("location: index.php");
} else {
    $sql = "Select * from admin_list where username='$uname' And password='$pass' ";
    $res = mysqli_query($conn, $sql);

    // if result found it will return rows
    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        $_SESSION['logged_user_id'] = $data['id'];
        $_SESSION['logged_user_name'] = $data['fullname'];
        $_SESSION['logged_user_pp'] = $data['image_id'];
        header("location: ./home.php");
    } else {
        $_SESSION['msg'] = "Sorry, Invalid Username/Password";
        header("location: ../index.php");
    }
}
