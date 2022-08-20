<?php
session_start();
include("./php/conn.php");

//capturing the user inputs
$uname = $_POST['Username'];
$pass = $_POST['Password'];
$submitBtn = $_POST['submit'];

//checking if user have clicked submit btn or not
if (!isset($submitBtn)) {
    $_SESSION['msg'] = "Please Login to continue!!!";
    header("location: index.php");
} else {
    $sql = "Select * from admin_list where username='$uname' And password='$pass' ";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        echo "loginSuccessful";
        // echo "<br>Name = " . $data['fullname'] . "<br>";
        // echo "Username = " . $data['username'] . "<br>";
        // echo "Password = " . $data['password'] . "<br>";
        // echo "img_ID = " . $data['image_id'] . "<br>";
        // $img = $data['img_id'];
        // echo "img data = $img";
        $_SESSION['logged_user_name'] = $data['fullname'];
        $_SESSION['logged_user_pp'] = $data['image_id'];
        // $_SESSION['logged_user_pp'] = "mukeshmahato";

        header("location: ./php/home.php");
    } else {
        $_SESSION['msg'] = "Sorry, Invalid Username/Password";
        header("location: index.php");
    }
}
