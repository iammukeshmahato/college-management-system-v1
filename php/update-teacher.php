<?php
include("./header.php");
include("./validate.php");

if (!isset($_POST['updateBtn'])) {
    header("location:" . URL . "php/view-teacher.php");
}

$update_id = validate_script(mysqli_real_escape_string($conn, base64_decode(base64_decode($_POST['updateId']))));
$name = validate_script(mysqli_real_escape_string($conn, $_POST['fullname']));
$address = validate_script(mysqli_real_escape_string($conn, $_POST['address']));
$gender = validate_script(mysqli_real_escape_string($conn, $_POST['gender']));
$qualification = validate_script(mysqli_real_escape_string($conn, $_POST['qualification']));
$email = validate_script(mysqli_real_escape_string($conn, $_POST['email']));
$phone = validate_script(mysqli_real_escape_string($conn, $_POST['phone']));

// echo "Update Id = $update_id <br>";
// echo "name = $name <br>";
// echo "address = $address <br>";
// echo "gender = $gender <br>";
// echo "qualification = $qualification <br>";
// echo "email = $email <br>";
// echo "phone = $phone <br>";

$isValidName = validate_name("inputTeacherName", $name);
$_SESSION['inputTeacherAdd'] = $address;
$_SESSION['inputTeacherGender'] = $gender;
$_SESSION['inputTeacherQualification'] = $qualification;
$isValidEmail = validate_email("inputTeacherEmail", $email);
$isValidPhone = validate_phone("inputTeacherPhone", $phone);

if (!$isValidName || !$isValidEmail || !$isValidPhone) {
    echo "Invalid";
    $_SESSION['isEditTeacherDataInvalid'] = "yes";
    header("location: " . URL . "php/edit-teacher-form.php?edit_id=" . base64_encode(base64_encode($update_id)));
} else {
    $updateTeacherSQL = "UPDATE `teachers` SET  
    `t_name` = '$name',
    `t_address` = '$address',
    `t_contact` = '$phone',
    `t_email` = '$email',
    `t_gender` = '$gender',
    `t_qualification` = '$qualification'
    WHERE t_id = $update_id";

    echo "line before sql";
    $updateTeacherRES = mysqli_query($conn, $updateTeacherSQL);
    echo "line after sql";
    if ($updateTeacherRES) {
        unset(
            $_SESSION['inputTeacherName'],
            $_SESSION['inputTeacherAdd'],
            $_SESSION['inputTeacherGender'],
            $_SESSION['inputTeacherQualification'],
            $_SESSION['inputTeacherEmail'],
            $_SESSION['inputTeacherPhone']
        );
        $_SESSION['isUpdated'] = "yes";
        header("location:" . URL . "php/view-teacher.php");
    } else {
        $_SESSION['isUpdated'] = "no";
        echo "something went wrong";
    }
}
?>