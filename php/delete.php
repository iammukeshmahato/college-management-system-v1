<?php
include "./header.php";
// session_start();
if(!isset($_POST['deleteBtn'])){
    header("location:" . URL . "php/view-student.php");
}
echo "deleting";

$id = $_POST['delete_id'];
// $id = $_GET['delete_id'];
echo $id;

echo "this is me mukesh mahato";

$sql = "DELETE FROM students WHERE std_id = '$id'";
$res = mysqli_query($conn, $sql);
echo "line 14";
if($res){
    $_SESSION['isDeleted'] = "yes";
    // header("location: " . URL . "php/home.php");
    echo "line 18";
    if($_SERVER['HTTP_REFERER'] == "http://localhost/minor%20project/search-by-faculty.php"){
        header("location: http://localhost/minor%20project/search-by-faculty.php");
        // echo "line 21";
    }else{
        header("location: " . URL . "result.php");
    }
}else{
    echo "something went wrong";
    $_SESSION['isDeleted'] = "no";
}