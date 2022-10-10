<?php
include "./header.php";
include "./validate.php";
if (!isset($_GET['deleteBtn'])) {
    header("location:" . URL . "php/view-student.php");
}

$id = validate_script(mysqli_escape_string($conn, base64_decode($_GET['delete_id'])));
$sql = "DELETE FROM students WHERE std_id = '$id'";
$res = mysqli_query($conn, $sql);

if ($res) {
    $_SESSION['isDeleted'] = "yes";
    if (strtok($_SERVER['HTTP_REFERER'], "?") == "http://localhost/minor%20project/result.php") {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } elseif (strtok($_SERVER['HTTP_REFERER'], "?") == "http://localhost/minor%20project/search-by-faculty.php") {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("location:" . URL . "php/view-student.php");
    }
} else {
    echo "something went wrong";
    $_SESSION['isDeleted'] = "no";
}
