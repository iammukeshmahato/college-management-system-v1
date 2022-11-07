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

    // function to generate hash data as youtube url
    // function generateHash(): string
    // {
    //     $bytes = random_bytes(8);
    //     $base64 = base64_encode($bytes);

    //     return rtrim(strtr($base64, '+/', '-_'), '=');
    // }
    //  $hash = generateHash();

    // echo '$regno = ' . $regno . " type = " . gettype($regno) . "<br>";
    // echo '$name = ' . $name . " type = " . gettype($name) . "<br>";
    // echo '$add = ' . $add . " type = " . gettype($add) . "<br>";
    // echo '$gender = ' . $gender . " type = " . gettype($gender) . "<br>";
    // echo '$faculty = ' . $faculty . " type = " . gettype($faculty) . "<br>";
    // echo '$Parent\'s Name = ' . $parentsName . " type = " . gettype($parentsName) . "<br>";
    // // echo '$email = ' . $email . " type = " . gettype($email) . "<br>";
    // echo '$phone = ' . $phone . " type = " . gettype($phone) . "<br>";
    // echo '$dob = ' . $dob . " type = " . gettype($dob) . "<br>";
    // echo '$yoj = ' . $yoj . " type = " . gettype($yoj) . "<br>";


    // validating user inputed registration number

    $isValidReg = validate_regno("inputStdReg", $regno);
    // echo $regno;
    $splitedREG = explode("-", $regno);
    $fac_id = $splitedREG[1];
    $Input_id = $splitedREG[2];
    $isMatched = false;
    $res = mysqli_query($conn, "SELECT `batch_name` FROM `batch`");
    while ($faculty_arr = mysqli_fetch_assoc($res)) {
        // print_r($faculty_arr['batch_name'] . "<br>");
        if ($fac_id == $faculty_arr['batch_name']) {
            // echo "faculty id matched";
            $isMatched = true;
            break;
        }
    }
    $isMatched = $isMatched ? true : false;
    if ($isValidReg) {
        if (!$isMatched) {
            $_SESSION['regError'] = "Invalid Registration Number, '$fac_id' is not a joining year";
            $isValidReg = false;
            // echo $_SESSION['regError'];
        }
        $id = $regno;

        // checking if the same id already exist;
        // echo "line 71<br>";
        $getId = mysqli_query($conn, "SELECT * FROM `students` WHERE `std_id` = '$id'");
        $isAlreadyExit = mysqli_num_rows($getId) > 0 ? true : false;

        if ($isAlreadyExit) {
            $_SESSION['regError'] = "Registration Number '$regno' already exist.";
            $isValidReg = false;
            // echo $_SESSION['regError'];
        }
    }

    // // Generating Registration Number;
    // $faculty_short = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT faculty_short FROM faculty WHERE faculty_id = $faculty")))['faculty_short'];
    // // echo $faculty_short;
    // $batch_name = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT batch_name FROM batch WHERE batch_id = $yoj")))['batch_name'];

    // // $last_id = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students INNER JOIN faculty on students.faculty_id = faculty.faculty_id LEFT JOIN batch on students.yoj = batch.batch_id WHERE faculty.faculty_id = $faculty AND batch.batch_id = $yoj")))['std_id'];

    // $fetch_id_res = mysqli_query($conn, "SELECT * FROM students INNER JOIN faculty on students.faculty_id = faculty.faculty_id LEFT JOIN batch on students.yoj = batch.batch_id WHERE faculty.faculty_id = $faculty AND batch.batch_id = $yoj ORDER by students.std_id DESC");
    // $last_id = intval(substr((mysqli_fetch_assoc($fetch_id_res))['std_id'], -3));
    // $last_id++;

    // if (mysqli_num_rows($fetch_id_res) > 0) {
    //     if ($last_id < 100) {
    //         if ($last_id < 10) {
    //             $increment = "00" . $last_id;
    //         } else {
    //             $increment = "0" . $last_id;
    //         }
    //     } else {
    //         $increment = $i;
    //     }
    // } else {
    //     $increment = "001";
    // }

    // $id = "$faculty_short-$batch_name-$increment";
    // // echo $id;



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
        // var_dump($isValidName);
        // var_dump($isValidParentName);
        // var_dump($isValidPhone);
        // var_dump($isValidReg);
        // echo "Invalid";
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
