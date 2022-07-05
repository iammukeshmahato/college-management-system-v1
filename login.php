<?php
session_start();
include("conn.php");

//capturing the user inputs
$uname = $_POST['Username'];
$pass = $_POST['Password'];
$submitBtn = $_POST['submit'];

//checking if user have clicked submit btn or not
if (!isset($submitBtn)) {
    header("location: index.php");
} else {
    $sql = "Select * from admin_list where username='$uname' And password='$pass' ";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        // $data = mysqli_fetch_assoc($res);
        // echo "loginSuccessful";
        // echo "<br>Name = " . $data['fullname'] . "<br>";
        // echo "Username = " . $data['username'] . "<br>";
        // echo "Password = " . $data['password'] . "<br>";
        // echo "Image_ID = " . $data['image_id'] . "<br>";
        // $img = $data['image_id'];
        header("location: home.php");
    } else {
        $_SESSION['msg'] = "Sorry, Invalid Username/Password";
        header("location: index.php");
    }
}
