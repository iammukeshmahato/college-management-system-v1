<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mystyle.css">
</head>

<body>
    <div class="container">
        <div class="leftsection">

            <div class="logo"><img src="./img/logo.png"></div>

            <div class="icon">
                <img src="./pp/<?php echo $_SESSION['logged_user_pp'] ?>" id="avtar">
                <p class="admin-name"><?php echo $_SESSION['logged_user_name'] ?></p>
                <p class="user-type">Admin</p>
            </div>

            <div class="content">
                <a href="./home.php" class="active">
                    <img src="./img/home_FILL0_wght400_GRAD0_opsz48.png" id="home">
                    <p1>Home</p1>
                </a>
                <a href="./add-teacher.php">
                    <img src="./img/person_add_FILL0_wght400_GRAD0_opsz48.png " id="teacher">
                    <p1>Add teacher</p1>
                </a>
                <a href="./add-student.php">
                    <img src="./img/person_add_FILL0_wght400_GRAD0_opsz48.png " id="student">
                    <p1>Add student</p1>
                </a>
                <a href="./view-teacher.php">
                    <img src="./img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewteacher">
                    <p1>View teacher</p1>
                </a>
                <a href="./view-student.php">
                    <img src="./img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewstudent">
                    <p1>View student</p1>
                </a>
                <a href="./setting.php">
                    <img src="./img/logout_FILL0_wght400_GRAD0_opsz48.png" id="logout">
                    <p1>Setting</p1>
                </a>
                <a href="./logout.php">
                    <img src="./img/logout_FILL0_wght400_GRAD0_opsz48.png" id="logout">
                    <p1>Logout</p1>
                </a>
            </div>

        </div>

        <!-- <div class="main">
            <div class="title-bar">
                <h1 class="title">College Management System | Home</h1>
            </div>
            <div class="slider"></div>
            <div class="card-sec">
                <div class="card student-card">
                    <h1 id="total-std">43</h1>
                    <h3>Total Student</h3>
                </div>
                <div class="card teacher-card">
                    <h1 id="total-teacher">43</h1>
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
        </div> -->


    </div>
</body>

</html>