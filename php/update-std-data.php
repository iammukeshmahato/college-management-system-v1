<?php
echo "update std data";

include "./header.php";
include "./validate.php";
if (!isset($_POST['updateBtn'])) {
    header("location:" . URL . "php/view-student.php");
}

$update_id = validate_script(mysqli_escape_string($conn, base64_decode($_POST['updateId'])));

$name = validate_script(mysqli_escape_string($conn, $_POST['std_name']));
$add = validate_script(mysqli_escape_string($conn, $_POST['std_address']));
$gender = validate_script(mysqli_escape_string($conn, $_POST['std_gender']));
$parentsName = validate_script(mysqli_escape_string($conn, $_POST['parentsName']));
$faculty = validate_script(mysqli_escape_string($conn, $_POST['std_faculty']));
$email = validate_script(mysqli_escape_string($conn, $_POST['std_email']));
$phone = validate_script(mysqli_escape_string($conn, $_POST['std_phone']));
$dob = validate_script(mysqli_escape_string($conn, $_POST['std_dob']));
$yoj = validate_script(mysqli_escape_string($conn, $_POST['std_yoj']));


echo '$name = ' . $name . " type = " . gettype($name) . "<br>";
echo '$add = ' . $add . " type = " . gettype($add) . "<br>";
echo '$gender = ' . $gender . " type = " . gettype($gender) . "<br>";
echo '$faculty = ' . $faculty . " type = " . gettype($faculty) . "<br>";
echo '$Parent\'s Name = ' . $parentsName . " type = " . gettype($parentsName) . "<br>";
// echo '$email = ' . $email . " type = " . gettype($email) . "<br>";
echo '$phone = ' . $phone . " type = " . gettype($phone) . "<br>";
echo '$dob = ' . $dob . " type = " . gettype($dob) . "<br>";
echo '$yoj = ' . $yoj . " type = " . gettype($yoj) . "<br>";

//validating
$isValidName = validate_name("inputStdName", $name);
$isValidParentName = validate_ParentName("inputStdParentName", $parentsName);
$isValidPhone = validate_phone("inputStdPhone", $phone);
$_SESSION['inputStdAdd'] = $add;
$_SESSION['inputStdGender'] = $gender;
$_SESSION['inputStdFaculty'] = $faculty;
$_SESSION['inputStdDOB'] = $dob;
$_SESSION['inputStdYOJ'] = $yoj;

if (!$isValidName || !$isValidParentName || !$isValidPhone) {
    echo "Invalid";
    $_SESSION['isEditStdDataInvalid'] = "yes";
    header("location: " . URL . "php/edit-student.php?edit_id=" . base64_encode($update_id) . "&edit=Edit");
} else {
    // echo "everything is OK <br>";
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


    if ($res) {
        unset(
            $_SESSION['inputStdName'],
            $_SESSION['inputStdParentName'],
            $_SESSION['inputStdPhone'],
            $_SESSION['inputStdAdd'],
            $_SESSION['inputStdGender'],
            $_SESSION['inputStdFaculty'],
            $_SESSION['inputStdDOB'],
            $_SESSION['inputStdYOJ']
        );

        $_SESSION['isUpdated'] = "yes";

        if (isset($_SESSION['byFaculty_url'])) {
            $header = $_SESSION['byFaculty_url'];
            unset($_SESSION['byFaculty_url']);
            header("location: " . $header);
        } elseif (isset($_SESSION['byName_url'])) {
            $header = $_SESSION['byName_url'];
            unset($_SESSION['byName_url']);
            header("location:" . $header);
        } else {
            header("location:" . URL . "php/view-student.php");
        }
    } else {
        $_SESSION['isUpdated'] = "no";
        echo "something went wrong";
    }
}
