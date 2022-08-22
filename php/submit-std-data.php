<?php
session_start();
include 'conn.php';
if (isset($_POST['submitBtn'])) {

    $name = $_POST['std_name'];
    $add = $_POST['std_address'];
    $gender = $_POST['std_gender'];
    $parentsName = $_POST['parentsName'];
    $faculty = $_POST['std_faculty'];
    $email = $_POST['std_email'];
    $phone = $_POST['std_phone'];
    $dob = $_POST['std_dob'];
    $yoj = $_POST['std_yoj'];

    // echo $_SESSION['isAdded'];

    // echo '$name = ' .$name . "type = ". gettype($name) . "<br>";
    // echo '$add = ' .$add . "type = ". gettype($add) . "<br>";
    // echo '$gender = ' .$gender . "type = ". gettype($gender) . "<br>";
    // echo '$faculty = ' .$faculty . "type = ". gettype($faculty) . "<br>";
    // echo '$email = ' .$email . "type = ". gettype($email) . "<br>";
    // echo '$phone = ' .$phone . "type = ". gettype($phone) . "<br>";
    // echo '$dob = ' .$dob . "type = ". gettype($dob) . "<br>";
    // echo '$yoj = ' .$yoj . "type = ". gettype($yoj) . "<br>";

    // $sql = "INSERT INTO `students` (`std_name`, `address`, `gender`, `faculty_id`, `parents_name`, `phone`, `dob`, `yoj`) VALUES 
    // ('$name', '$add', '$gender', $faculty, '$parentsName', '$phone', '$dob', $yoj)";
    // // echo "line 31";
    // // print_r($_POST);
    // $res = mysqli_query($conn, $sql);


    $faculty_short = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM faculty WHERE faculty_id = $faculty")))['faculty_short'];
    $batch_name = (mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM batch WHERE batch_id = $yoj")))['batch_name'];

    // echo "faculty = " . $faculty_short . "<br>";
    // echo "batch = " . $batch_name . "<br>";


    // $last_id = (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students INNER JOIN faculty on students.faculty_id = faculty.faculty_id LEFT JOIN batch on students.yoj = batch.batch_id WHERE faculty.faculty_id = $faculty AND batch.batch_id = $yoj")))['std_id'];

    $fetch_id_res = mysqli_query($conn, "SELECT * FROM students INNER JOIN faculty on students.faculty_id = faculty.faculty_id LEFT JOIN batch on students.yoj = batch.batch_id WHERE faculty.faculty_id = $faculty AND batch.batch_id = $yoj ORDER by students.std_id DESC");
    $last_id = intval(substr((mysqli_fetch_assoc($fetch_id_res))['std'], -3));
    $last_id++;
    if(mysqli_num_rows($fetch_id_res) > 0){
        if ($last_id < 100) {
            if ($last_id < 10) {
                $increment = "00" . $last_id;
            } else {
                $increment = "0" . $last_id;
            }
        } else {
            $increment = $i;
        }
    }else{
        $increment = "001";
    }

    $id = "$faculty_short-$batch_name-$increment";
    // echo $id;


    $sql = "INSERT INTO `students` (`std`, `std_name`, `address`, `gender`, `faculty_id`, `parents_name`, `phone`, `dob`, `yoj`) VALUES 
    ('$id', '$name', '$add', '$gender', $faculty, '$parentsName', '$phone', '$dob', $yoj)";
    $res = mysqli_query($conn, $sql);
    
    if ($res) {
        $_SESSION['isAdded'] = "yes";
        header("location: add-student.php");
    }

}else{
    header("location: add-student.php");
}