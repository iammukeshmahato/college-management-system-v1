<?php
// include "header.php";
include "conn.php";
// echo "this is view-individual-std.php file";

$userInput = $_POST['userInput'];
// echo $userInput;

// print_r($_POST);

// $sql = "SELECT * FROM students WHERE 
//     std_name = $userInput OR parents_name = $userInput OR phone = $userInput OR dob = $userInput
//     ";

$sql = "SELECT * FROM students WHERE 
    std_name = '$userInput' OR parents_name = '$userInput' OR phone = '$userInput' OR dob = '$userInput' ";

// echo "line no 14";
$res = mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql) > 0) {
    while ($data = mysqli_fetch_assoc($res)) {
        print_r($data);
        echo "<br>";
    }
}

echo mysqli_num_rows($res);
