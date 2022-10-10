<?php
include("./header.php");
include("./validate.php");

if (isset($_POST['submitBtn'])) {
    // echo "btn set";
    $name = validate_script(mysqli_real_escape_string($conn, $_POST['std_name']));
    $add = validate_script(mysqli_real_escape_string($conn, $_POST['std_address']));
    $gender = validate_script(mysqli_real_escape_string($conn, $_POST['std_gender']));
    $parentsName = validate_script(mysqli_real_escape_string($conn, $_POST['parentsName']));
    $faculty = validate_script(mysqli_real_escape_string($conn, $_POST['std_faculty']));
    // $email = validate_script(mysqli_real_escape_string($conn, $_POST['std_email']));
    $phone = validate_script(mysqli_real_escape_string($conn, $_POST['std_phone']));
    $dob = validate_script(mysqli_real_escape_string($conn, $_POST['std_dob']));
    $yoj = validate_script(mysqli_real_escape_string($conn, $_POST['std_yoj']));

    // function to generate hash data as youtube url
    // function generateHash(): string
    // {
    //     $bytes = random_bytes(8);
    //     $base64 = base64_encode($bytes);

    //     return rtrim(strtr($base64, '+/', '-_'), '=');
    // }
    //  $hash = generateHash();

    echo '$name = ' . $name . " type = " . gettype($name) . "<br>";
    echo '$add = ' . $add . " type = " . gettype($add) . "<br>";
    echo '$gender = ' . $gender . " type = " . gettype($gender) . "<br>";
    echo '$faculty = ' . $faculty . " type = " . gettype($faculty) . "<br>";
    echo '$Parent\'s Name = ' . $parentsName . " type = " . gettype($parentsName) . "<br>";
    // echo '$email = ' . $email . " type = " . gettype($email) . "<br>";
    echo '$phone = ' . $phone . " type = " . gettype($phone) . "<br>";
    echo '$dob = ' . $dob . " type = " . gettype($dob) . "<br>";
    echo '$yoj = ' . $yoj . " type = " . gettype($yoj) . "<br>";


    // echo "line 48";
    // print_r($conn);
    $faculty_short = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT faculty_short FROM faculty WHERE faculty_id = $faculty")))['faculty_short'];
    // echo $faculty_short;
    $batch_name = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT batch_name FROM batch WHERE batch_id = $yoj")))['batch_name'];

    // $last_id = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students INNER JOIN faculty on students.faculty_id = faculty.faculty_id LEFT JOIN batch on students.yoj = batch.batch_id WHERE faculty.faculty_id = $faculty AND batch.batch_id = $yoj")))['std_id'];

    $fetch_id_res = mysqli_query($conn, "SELECT * FROM students INNER JOIN faculty on students.faculty_id = faculty.faculty_id LEFT JOIN batch on students.yoj = batch.batch_id WHERE faculty.faculty_id = $faculty AND batch.batch_id = $yoj ORDER by students.std_id DESC");
    $last_id = intval(substr((mysqli_fetch_assoc($fetch_id_res))['std_id'], -3));
    $last_id++;

    if (mysqli_num_rows($fetch_id_res) > 0) {
        if ($last_id < 100) {
            if ($last_id < 10) {
                $increment = "00" . $last_id;
            } else {
                $increment = "0" . $last_id;
            }
        } else {
            $increment = $i;
        }
    } else {
        $increment = "001";
    }

    $id = "$faculty_short-$batch_name-$increment";
    // echo $id;

    //validating
    $isValidName = validate_name("inputStdName", $name);
    $isValidParentName = validate_ParentName("inputStdParentName", $parentsName);
    $isValidPhone = validate_phone("inputStdPhone", $phone);
    $_SESSION['inputStdAdd'] = $add;
    $_SESSION['inputStdGender'] = $gender;
    $_SESSION['inputStdFaculty'] = $faculty;
    $_SESSION['inputStdDOB'] = $dob;
    $_SESSION['inputStdYOJ'] = $yoj;

    // echo "mmk => ". $_SESSION['inputStdGender'];
    // $isValidPhone = validate_phone("9812345678");

    if (!$isValidName || !$isValidParentName || !$isValidPhone) {
        echo "Invalid";
        header("location: " . URL . "php/add-student.php");
    } else {
        // echo "everytihing is OK to upload";

        // sql to insert data along hash id 
        // $sql = "INSERT INTO `students` (`std_id`, `std_name`, `address`, `gender`, `faculty_id`, `parents_name`, `phone`, `dob`, `yoj`, `id_hash`) VALUES 
        // ('$id', '$name', '$add', '$gender', $faculty, '$parentsName', '$phone', '$dob', $yoj, '$hash')";

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
                $_SESSION['inputStdYOJ']
            );
            $_SESSION['isAdded'] = "yes";
            header("location:" . URL . "php/add-student.php");
        }
    }
} else {
    header("location:" . URL . "php/add-student.php");
}
