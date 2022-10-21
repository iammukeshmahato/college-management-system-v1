<?php
include("./header.php");
include("./validate.php");

if (!isset($_GET['delete_id'])) {
    header("location:" . URL . "php/view-teacher.php");
}
$delete_id = validate_script(mysqli_real_escape_string($conn, base64_decode(base64_decode($_GET['delete_id']))));

$deleteTeacherSQL = "DELETE FROM teachers WHERE t_id = $delete_id";
$deleteTeacherRES = mysqli_query($conn, $deleteTeacherSQL);

if ($deleteTeacherRES) {
    $_SESSION['isDeleted'] = "yes";
    // header("location: " . URL . "php/home.php");
    // if($_SERVER['HTTP_REFERER'] == "http://localhost/minor%20project/search-by-faculty.php"){
    //     header("location: http://localhost/minor%20project/search-by-faculty.php");
    // }else{
    // }
    header("location: " . URL . "php/view-teacher.php");
} else {
    echo "something went wrong";
    $_SESSION['isDeleted'] = "no";
}