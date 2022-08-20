<?php
include("./header.php");
    // print_r($_POST);
    if(!isset($_POST['submitBtn'])){
        header("location:" . URL . "php/add-teacher.php");
    }else{
        // print_r($_POST);

        $name = $_POST['fullname'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        echo "name = $name <br>";
        echo "address = $address <br>";
        echo "gender = $gender <br>";
        echo "qualification = $qualification <br>";
        echo "email = $email <br>";
        echo "phone = $phone <br>";

        $addTeacherSQL = "INSERT INTO teachers (`t_name`, `t_address`, `t_contact`, `t_email`, `t_gender`, `t_qualification`) VALUES ('$name', '$address', '$phone', '$email', '$gender', '$qualification')";
        $addTeacherRES = mysqli_query($conn, $addTeacherSQL);
        echo "line 25";
        if ($addTeacherRES) {
            $_SESSION['isAdded'] = "yes";
            header("location:" . URL . "php/add-teacher.php");
        }
    }