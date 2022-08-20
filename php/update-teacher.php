<?php
    include("./header.php");
    // print_r($_POST);

    if(!isset($_POST['updateBtn'])){
        header("location:" . URL . "php/view-teacher.php");
    }

    $update_id = $_POST['updateId'];
    $name = $_POST['fullname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // echo "Update Id = $update_id <br>";
    // echo "name = $name <br>";
    // echo "address = $address <br>";
    // echo "gender = $gender <br>";
    // echo "qualification = $qualification <br>";
    // echo "email = $email <br>";
    // echo "phone = $phone <br>";

    $updateTeacherSQL = "UPDATE `teachers` SET  
    `t_name` = '$name',
    `t_address` = '$address',
    `t_contact` = '$phone',
    `t_email` = '$email',
    `t_gender` = '$gender',
    `t_qualification` = '$qualification'
    WHERE t_id = $update_id";

    // print_r($updateTeacherSQL);

    echo "line before sql";
    $updateTeacherRES = mysqli_query($conn, $updateTeacherSQL);
    echo "line after sql";
    if ($updateTeacherRES) {
        $_SESSION['isUpdated'] = "yes";
        header("location:" . URL . "php/view-teacher.php");
    } else {
        $_SESSION['isUpdated'] = "no";
        echo "something went wrong";
    }
?>