<?php
include("./header.php")
?>

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
            <form action=" <?php echo URL . 'result.php' ?>" method="">
                <div class="individual-student-search-section">
                    <h2>Find a Student</h2>
                    <div class="searchpannel">
                        <input type="text" id="searchText" placeholder="Search By Name" name="userInput" class="input" style="margin-right: 1em;" required>
                        <input type="submit" value="Search" name="submitBtn" class="input" style="width: 5rem;">
                    </div>
                </div>
            </form>

            <div class="searchByFaculty">
                <form action="<?php echo URL . 'search-by-faculty.php' ?>" method="">
                    <h2 class="search-title">Search By Program And Year</h2>
                    <div class="optionpannel">
                        <div class="department">
                            <span>Department</span>
                            <select name="std_faculty" id="" class="input" required>
                                <option value>Select Faculty</option>
                                <?php
                                $res = mysqli_query($conn, "Select * from faculty");
                                while ($data = mysqli_fetch_assoc($res)) {
                                    // $data = mysqli_fetch_assoc($res);
                                    echo '<option value="' . ($data['faculty_id']) . '">' . $data['faculty_name'] . '</option>';
                                }
                                ?>
                            </select>
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
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Search" name="submitBtn" class="input" style="width: 5rem; margin: auto;">
                </form>
            </div>
        </div>

        <!-- Recently added students should be populated here -->

    </div>
</div>
<script>
    document.title = "View Student";
</script>