<?php
include("./header.php");
include("./validate.php");
if (!isset($_POST['submitBtn'])) {
    header("location:" . URL . "php/add-teacher.php");
} else {
    $name = validate_script(mysqli_real_escape_string($conn, $_POST['fullname']));
    $address = validate_script(mysqli_real_escape_string($conn, $_POST['address']));
    $gender = validate_script(mysqli_real_escape_string($conn, $_POST['gender']));
    $qualification = validate_script(mysqli_real_escape_string($conn, $_POST['qualification']));
    $email = validate_script(mysqli_real_escape_string($conn, $_POST['email']));
    $phone = validate_script(mysqli_real_escape_string($conn, $_POST['phone']));

    // echo "name = $name <br>";
    // echo "address = $address <br>";
    // echo "gender = $gender <br>";
    // echo "qualification = $qualification <br>";
    // echo "email = $email <br>";
    // echo "phone = $phone <br>";

    //validating
    $isValidName = validate_name("inputTeacherName", $name);
    $_SESSION['inputTeacherAdd'] = $address;
    $_SESSION['inputTeacherGender'] = $gender;
    $_SESSION['inputTeacherQualification'] = $qualification;
    $isValidEmail = validate_email("inputTeacherEmail", $email);
    $isValidPhone = validate_phone("inputTeacherPhone", $phone);


    if (!$isValidName || !$isValidEmail || !$isValidPhone) {
        // echo "Invalid";
        header("location: " . URL . "php/add-teacher.php");
    } else {

        $addTeacherSQL = "INSERT INTO teachers (`t_name`, `t_address`, `t_contact`, `t_email`, `t_gender`, `t_qualification`) VALUES ('$name', '$address', '$phone', '$email', '$gender', '$qualification')";
        $addTeacherRES = mysqli_query($conn, $addTeacherSQL);
        // echo "line 25";
        if ($addTeacherRES) {
            unset(
                $_SESSION['inputTeacherName'],
                $_SESSION['inputTeacherAdd'],
                $_SESSION['inputTeacherGender'],
                $_SESSION['inputTeacherQualification'],
                $_SESSION['inputTeacherEmail'],
                $_SESSION['inputTeacherPhone']
            );
            $_SESSION['isAdded'] = "yes";
            header("location:" . URL . "php/add-teacher.php");
        }
    }
}
