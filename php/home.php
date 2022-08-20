<?php
include "header.php";
// echo "mukhes";
// echo "url = ". $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="<?php echo URL ?>css/main.css"> -->
</head>

<body>
    <div class="container">
        <div class="leftsection">

            <div class="logo"><img src="<?php echo URL ?>img/logo.png"></div>

            <div class="icon">
                <img src="<?php echo URL ?>pp/<?php echo $_SESSION['logged_user_pp'] ?>" id="avtar">
                <p class="admin-name"><?php echo $_SESSION['logged_user_name'] ?></p>
                <p class="user-type">Admin</p>
            </div>

            <div class="content">
                <a href="<?php echo URL ?>php/home.php" class="active">
                    <img src="<?php echo URL ?>img/home_FILL0_wght400_GRAD0_opsz48.png" id="home">
                    <p1>Home</p1>
                </a>
                <a href="<?php echo URL ?>php/add-teacher.php">
                    <img src="<?php echo URL ?>img/person_add_FILL0_wght400_GRAD0_opsz48.png " id="teacher">
                    <p1>Add teacher</p1>
                </a>
                <a href="<?php echo URL ?>php/add-student.php">
                    <img src="<?php echo URL ?>img/person_add_FILL0_wght400_GRAD0_opsz48.png " id="student">
                    <p1>Add student</p1>
                </a>
                <a href="<?php echo URL ?>php/view-teacher.php">
                    <img src="<?php echo URL ?>img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewteacher">
                    <p1>View Teacher</p1>
                </a>
                <a href="<?php echo URL ?>php/view-student.php">
                    <img src="<?php echo URL ?>img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewstudent">
                    <p1>Find Student</p1>
                </a>
                <a href="<?php echo URL ?>setting.php">
                    <img src="<?php echo URL ?>img/edit.png" id="logout">
                    <p1>Edit Profile</p1>
                </a>
                <a href="<?php echo URL ?>php/logout.php">
                    <img src="<?php echo URL ?>img/logout_FILL0_wght400_GRAD0_opsz48.png" id="logout">
                    <p1>Logout</p1>
                </a>
            </div>

        </div>

        <div class="main">
            <div class="title-bar">
                <h1 class="main-title">College Management System | Home</h1>
            </div>
            <div class="slider"></div>
            <div class="card-sec">
                <div class="card student-card">
                    <h1 id="total-std">
                        <?php
                        $res = mysqli_query($conn, "select std_id from students");
                        $count = mysqli_num_rows($res);
                        echo $count;
                        ?>
                    </h1>
                    <h3>Total Student</h3>
                </div>
                <div class="card teacher-card">
                    <h1 id="total-teacher">
                        <?php
                        $res = mysqli_query($conn, "select t_id from teachers");
                        $count = mysqli_num_rows($res);
                        echo $count;
                        // echo "0";
                        ?>
                    </h1>
                    <h3>Total Teacher</h3>
                </div>
                <div class="card admin-card">
                    <h1 id="total-admin"><?php echo $total_admin; ?></h1>
                    <h3>Total Admin</h3>
                </div>
                <div class="card course-card">
                    <h1 id="total-course"><?php echo $total_faculty; ?></h1>
                    <h3>Total Course</h3>
                </div>
            </div>

            <div class="hr"></div>
        </div>


    </div>


    <!-- <script>
        let a = document.querySelectorAll("a");
        // console.log(a[0].href);
        a.forEach(elem => {
            elem.addEventListener("click", () => {
                if (elem.classList.contains("active")) {
                    elem.classList.remove("active");
                } else {
                    elem.classList.add("active");
                }
            });
        });

        function loadContent() {

            let mainContainer = document.querySelector(".main");
            console.log(mainContainer);
            let title = `<div class="title-bar">
                        <h1 class="main-title">College Management System | Edit Profile</h1>
                    </div>`;

            let xhr = new XMLHttpRequest();
            xhr.open("GET", "../editprofile.php");
            xhr.onload = () => {
                mainContainer.innerHTML = title + xhr.responseText;
            }
            xhr.send();
            // mainContainer.innerHTML = 
        }

    </script> -->

    <script>
        // let titleBar = document.querySelector(".title-bar");
        // console.log(titleBar);
        // titleBar.addEventListener("click", () => {
        //     console.log("clicked");
        //     document.querySelector(".leftsection").style.display = "none";
        // })
    </script>
</body>

</html>