<?php
include "./header.php";
// print_r($_POST);
if(!isset($_POST['updateBtn'])){
    header("location:" . URL . "php/view-student.php");
}

$update_id = $_POST['updateId'];
$name = $_POST['std_name'];
$add = $_POST['std_address'];
$gender = $_POST['std_gender'];
$parentsName = $_POST['parentsName'];
$faculty = $_POST['std_faculty'];
$email = $_POST['std_email'];
$phone = $_POST['std_phone'];
$dob = $_POST['std_dob'];
$yoj = $_POST['std_yoj'];

// by default isUpdated = no
$_SESSION['isUpdated'] = "no";



$sql = "UPDATE students SET
    `std_name` = '$name',
    `address` = '$add',
    `gender` = '$gender',
    `faculty_id` = $faculty,
    `parents_name` = '$parentsName',
    `phone` = '$phone',
    `dob` = '$dob',
    `yoj` = $yoj
    WHERE std_id = '$update_id'";
$res = mysqli_query($conn, $sql);


if($sql){
    echo "Updated";
    $_SESSION['isUpdated'] = "yes";
    if($_SESSION['previous_url'] == "http://localhost/minor%20project/search-by-faculty.php"){
        unset($_SESSION['previous_url']);
        header("location: http://localhost/minor%20project/search-by-faculty.php");
    }else{
        // echo $_SERVER['HTTP_REFERER'];
        header("location:" .URL ."result.php");
    }
}else{
    $_SESSION['isUpdated'] = "no";
    echo "something went wrong";
}
