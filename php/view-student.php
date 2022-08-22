<?php
include("./header.php")
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Student</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
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
                <a href="<?php echo URL ?>php/home.php">
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
                <a href="<?php echo URL ?>php/view-student.php" class="active">
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
                <h1 class="main-title">College Management System | Find Student</h1>
            </div>

            <div class="search-wrapper">
                <form action=" <?php echo URL . 'result.php' ?>" method="post">
                    <div class="individual-student-search-section">
                        <!-- <img src="/person_search_FILL0_wght400_GRAD0_opsz48.png"> -->
                        <h2>Find a Student</h2>
                        <div class="searchpannel">
                            <input type="text" id="searchText" placeholder="Search By Name" name="userInput" class="input" style="margin-right: 1em;">
                            <input type="submit" value="Search" name="submitBtn" class="input" style="width: 5rem;">
                            <!-- <div class="searchbox">
                        </div>
                        <div class="button"><a href="#" class="Input">Search</a></div> -->
                        </div>
                    </div>
                </form>

                <div class="searchByFaculty">
                    <form action="<?php echo URL . 'search-by-faculty.php' ?>" method="post">
                        <h2 class="search-title">Search By Program And Year</h2>
                        <div class="optionpannel">
                            <div class="department">
                                <span>Department</span>
                                <select name="std_faculty" id="" class="input" required>
                                    <!-- <option value="0">Select Faculty</option> -->
                                    <?php
                                    $res = mysqli_query($conn, "Select * from faculty");
                                    while ($data = mysqli_fetch_assoc($res)) {
                                        // $data = mysqli_fetch_assoc($res);
                                        echo '<option value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <!-- <select name="faculty" class="input">
                                <option value="Diploma in Information Technology">Diploma in Information Technology</option>
                                <option value="Diploma in Civil Engineering">Diploma in Civil Engineering</option>
                                <option value="Diploma in Hotel Management">Diploma in Hotel Management</option>
                                <option value="Diploma in Electrical Engineering">Diploma in Electrical Engineering</option>
                                <option value="Diploma in Geomatics Engineering">Diploma in Geomatics Engineering</option>
                            </select> -->
                            </div>

                            <div class="yearofjoining">
                                <span>Year Of Joining</span>
                                <select name="batch" class="input" style="width: 4.5rem;">
                                    <?php
                                    $res = mysqli_query($conn, "Select * from batch order by batch_id desc");
                                    while ($data = mysqli_fetch_assoc($res)) {
                                        // $data = mysqli_fetch_assoc($res);
                                        echo '<option value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                    }
                                    ?>
                                    <!-- <option value="2070">2070</option>
                                <option value="2071">2071</option>
                                <option value="2072">2072</option>
                                <option value="2073">2073</option>
                                <option value="2074">2074</option>
                                <option value="2075">2075</option>
                                <option value="2076">2076</option>
                                <option value="2077">2077</option>
                                <option value="2078">2078</option> -->
                                </select>
                            </div>
                        </div>
                        <input type="submit" value="Search" name="submitBtn" class="input" style="width: 5rem; margin: auto;">
                    </form>
                </div>
            </div>
        </div>
</body>

</html>