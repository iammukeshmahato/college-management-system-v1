<?php
    $conn = mysqli_connect("localhost", "root", "", "MyCollege");
    if (!$conn) {
        die("can not connect to database --> " . mysqli_connect_error());
        exit;
    }
?>