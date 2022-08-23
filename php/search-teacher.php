<?php
include ("./header.php");
$searchText = $_POST['searchText'];

if(!isset($_POST['searchBtn'])){
    header("location:" . URL . "php/view-teacher.php");
}
