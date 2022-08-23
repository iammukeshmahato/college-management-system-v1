<?php
include "./header.php";
if(!isset($_POST['deleteBtn'])){
    header("location:" . URL . "php/view-student.php");
}

$id = $_POST['delete_id'];


$sql = "DELETE FROM students WHERE std_id = '$id'";
$res = mysqli_query($conn, $sql);
if($res){
    $_SESSION['isDeleted'] = "yes";
    if($_SERVER['HTTP_REFERER'] == "http://localhost/minor%20project/search-by-faculty.php"){
        header("location: http://localhost/minor%20project/search-by-faculty.php");
    }else{
        header("location: " . URL . "result.php");
    }
}else{
    echo "something went wrong";
    $_SESSION['isDeleted'] = "no";
}