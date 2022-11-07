<?php
include("./header.php");
include("./validate.php");

if (isset($_POST['submitBtn'])) {
    $regno = validate_script(mysqli_real_escape_string($conn, $_POST['std_regno']));
    $name = validate_script(mysqli_real_escape_string($conn, $_POST['std_name']));
    $add = validate_script(mysqli_real_escape_string($conn, $_POST['std_address']));
    $gender = validate_script(mysqli_real_escape_string($conn, $_POST['std_gender']));
    $parentsName = validate_script(mysqli_real_escape_string($conn, $_POST['parentsName']));
    $faculty = validate_script(mysqli_real_escape_string($conn, $_POST['std_faculty']));
    // $email = validate_script(mysqli_real_escape_string($conn, $_POST['std_email']));
    $phone = validate_script(mysqli_real_escape_string($conn, $_POST['std_phone']));
    $dob = validate_script(mysqli_real_escape_string($conn, $_POST['std_dob']));
    $yoj = validate_script(mysqli_real_escape_string($conn, $_POST['std_yoj']));

    // validating user inputed registration number

    $isValidReg = validate_regno("inputStdReg", $regno);
    $splitedREG = explode("-", $regno);
    $fac_id = $splitedREG[1];
    $Input_id = $splitedREG[2];
    $isMatched = false;
    $res = mysqli_query($conn, "SELECT `batch_name` FROM `batch`");
    while ($faculty_arr = mysqli_fetch_assoc($res)) {
        if ($fac_id == $faculty_arr['batch_name']) {
            $isMatched = true;
            break;
        }
    }
    $isMatched = $isMatched ? true : false;
    if ($isValidReg) {
        if (!$isMatched) {
            $_SESSION['regError'] = "Invalid Registration Number, '$fac_id' is not a joining year";
            $isValidReg = false;
        }
        $id = $regno;

        // checking if the same id already exist;
        $getId = mysqli_query($conn, "SELECT * FROM `students` WHERE `std_id` = '$id'");
        $isAlreadyExit = mysqli_num_rows($getId) > 0 ? true : false;

        if ($isAlreadyExit) {
            $_SESSION['regError'] = "Registration Number '$regno' already exist.";
            $isValidReg = false;
        }
    }


    //validating
    $isValidName = validate_name("inputStdName", $name);
    $isValidParentName = validate_ParentName("inputStdParentName", $parentsName);
    $isValidPhone = validate_phone("inputStdPhone", $phone);
    $_SESSION['inputStdAdd'] = $add;
    $_SESSION['inputStdGender'] = $gender;
    $_SESSION['inputStdFaculty'] = $faculty;
    $_SESSION['inputStdDOB'] = $dob;
    $_SESSION['inputStdYOJ'] = $yoj;


    if (!$isValidName || !$isValidParentName || !$isValidPhone || !$isValidReg) {
        header("location: " . URL . "php/add-student.php");
    } else {
        $sql = "INSERT INTO `students` (`std_id`, `std_name`, `address`, `gender`, `faculty_id`, `parents_name`, `phone`, `dob`, `yoj`) VALUES 
        ('$id', '$name', '$add', '$gender', $faculty, '$parentsName', '$phone', '$dob', $yoj)";
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
                $_SESSION['inputStdYOJ'],
                $_SESSION['inputStdReg']
            );
            $_SESSION['isAdded'] = "yes";
            header("location:" . URL . "php/add-student.php");
        }
    }
} else {
    header("location:" . URL . "php/add-student.php");
}
