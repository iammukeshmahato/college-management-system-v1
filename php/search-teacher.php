<?php
include ("./header.php");
print_r($_POST);
$searchText = $_POST['searchText'];
var_dump(isset($_POST['searchBtn']));

if(!isset($_POST['searchBtn'])){
    header("location:" . URL . "php/view-teacher.php");
}
