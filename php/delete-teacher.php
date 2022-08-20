<?php
include("./header.php");
// print_r($_POST);
$delete_id = $_POST['delete_id'];

$deleteTeacherSQL = "DELETE FROM teachers WHERE t_id = $delete_id";
echo "before sql";
$deleteTeacherRES = mysqli_query($conn, $deleteTeacherSQL);
echo "after sql";

if($deleteTeacherRES){
    $_SESSION['isDeleted'] = "yes";
    // header("location: " . URL . "php/home.php");
    // echo "line 18";
    // if($_SERVER['HTTP_REFERER'] == "http://localhost/minor%20project/search-by-faculty.php"){
    //     header("location: http://localhost/minor%20project/search-by-faculty.php");
    //     // echo "line 21";
    // }else{
    // }
    header("location: " . URL . "php/view-teacher.php");
}else{
    echo "something went wrong";
    $_SESSION['isDeleted'] = "no";
}