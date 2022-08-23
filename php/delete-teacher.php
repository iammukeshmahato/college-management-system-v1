<?php
include("./header.php");
$delete_id = $_POST['delete_id'];

$deleteTeacherSQL = "DELETE FROM teachers WHERE t_id = $delete_id";
$deleteTeacherRES = mysqli_query($conn, $deleteTeacherSQL);

if($deleteTeacherRES){
    $_SESSION['isDeleted'] = "yes";
    // header("location: " . URL . "php/home.php");
    // if($_SERVER['HTTP_REFERER'] == "http://localhost/minor%20project/search-by-faculty.php"){
    //     header("location: http://localhost/minor%20project/search-by-faculty.php");
    // }else{
    // }
    header("location: " . URL . "php/view-teacher.php");
}else{
    echo "something went wrong";
    $_SESSION['isDeleted'] = "no";
}