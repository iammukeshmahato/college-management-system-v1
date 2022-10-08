<?php
include "header.php"
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Student</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <a href="<?php echo URL ?>php/add-student.php" class="active">
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
                <h1 class="main-title">College Management System | Add Student</h1>
            </div>

            <div class="alertBox" <?php if (isset($_SESSION['isAdded'])) {
                                        echo 'style="display:flex"';
                                        unset($_SESSION['isAdded']);
                                    } ?>>
                <strong>
                    Student Added Successfully!!!
                </strong>
                <button type="button" class="btn-close"></button>
            </div>



            <div class="form">
                <div class="form-container">
                    <div class="form-title-bar">
                        <h1 class="form-title">Student Registration Form</h1>
                    </div>
                    <form action="submit-std-data.php" method="post">

                        <!-- Name -->
                        <div class="form-item">
                            <p class="title">Full Name</p>
                            <input type="text" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off" name="std_name" value="<?php echo $_SESSION['inputStdName']; ?>">
                            <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['nameError'])) echo 'style="display:block"'; ?>><?php echo $_SESSION['nameError'];
                                                                                                                                                        unset($_SESSION['nameError'], $_SESSION['inputStdName']) ?></label>
                        </div>

                        <!-- Address -->
                        <div class="form-item">
                            <p class="title">Permanent Address</p>
                            <input type="text" class="input" required placeholder="Enter your full address" autocomplete="off" name="std_address" value="<?php if (isset($_SESSION['inputStdAdd'])) echo $_SESSION['inputStdAdd'];
                                                                                                                                                            unset($_SESSION['inputStdAdd']) ?>">
                            <!-- <label for="fullname" class="errorMsg">Full Name</label> -->
                        </div>

                        <!-- Gender -->
                        <div class="form-item">
                            <p class="title">Gender</p>
                            <input type="radio" name="std_gender" value="Male" class="radio" required <?php if (isset($_SESSION['inputStdGender'])) {
                                                                                                            if ($_SESSION['inputStdGender'] == "Male") echo "checked";
                                                                                                            unset($_SESSION['inputStdGender']);
                                                                                                        } ?>>
                            <span>Male</span>
                            <input type="radio" name="std_gender" value="Female" class="radio" required <?php if (isset($_SESSION['inputStdGender'])) {
                                                                                                            if ($_SESSION['inputStdGender'] == "Female") echo "checked";
                                                                                                            unset($_SESSION['inputStdGender']);
                                                                                                        } ?>><span>Female</span>
                            <input type="radio" name="std_gender" value="Other" class="radio" required <?php if (isset($_SESSION['inputStdGender'])) {
                                                                                                            if ($_SESSION['inputStdGender'] == "Other") echo "checked";
                                                                                                            unset($_SESSION['inputStdGender']);
                                                                                                        } ?>><span>Other</span>
                        </div>
                        <!-- Parent's Name -->
                        <div class="form-item">
                            <p class="title">Parents' Name</p>
                            <input type="text" class="input" name="parentsName" required placeholder="Enter your father's or mother's name" value="<?php echo $_SESSION['inputStdParentName']; ?>">
                            <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['ParentNameError'])) echo "style='display:block'"; ?>><?php echo $_SESSION['ParentNameError'];
                                                                                                                                                            unset($_SESSION['ParentNameError'], $_SESSION['inputStdParentName']) ?></label>
                        </div>

                        <!-- Contact faculty & Phone -->
                        <div class="form-item">
                            <div class="contact two-column">
                                <!-- <div class="email col-1">
                                    <p class="title">Email</p>
                                    <input type="email" class="input" name="std_email" required placeholder="example@gmail.com" autocomplete="off">
                                    <label for="email" class="errorMsg">example@gmail.com</label>
                                </div> -->
                                <div class="faculty col-1">
                                    <p class="title">Faculty</p>
                                    <select name="std_faculty" id="" class="input" required>
                                        <option value>Select Faculty</option>
                                        <?php
                                        $res = mysqli_query($conn, "Select * from faculty");
                                        while ($data = mysqli_fetch_assoc($res)) {
                                            // $data = mysqli_fetch_assoc($res);

                                            if (isset($_SESSION['inputStdFaculty'])) {
                                                if ($_SESSION['inputStdFaculty'] == $data['faculty_id']) {
                                                    echo '<option selected value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                                    unset($_SESSION['inputStdFaculty']);
                                                }
                                            } else {
                                                echo '<option value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                            }
                                        }
                                        ?>
                                        <!-- <option value="DIT">Diploam In Information Technology</option>
                                            <option value="DCE">Diploam In Civil Engineering</option>
                                            <option value="DEE">Diploam In Electrical Engineering</option>
                                            <option value="DGE">Diploam In Geomatics Engineering</option>
                                            <option value="DHM">Diploam In Hotel Management</option> -->
                                    </select>
                                </div>

                                <div class="phone col-2">
                                    <p class="title">Phone</p>
                                    <input type="tel" class="input" name="std_phone" placeholder="Must be 10 digits" required autocomplete="off" id="phone" value="<?php echo $_SESSION['inputStdPhone'] ?>">
                                    <p class="errorMsg invalid" <?php if (isset($_SESSION['phoneError'])) echo "style='display:block'";
                                                                ?>><?php echo $_SESSION['phoneError'];
                                                                    unset($_SESSION['phoneError']);
                                                                    unset($_SESSION['inputStdPhone']); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Date of Birth and year of joining -->
                        <div class="form-item two-column">
                            <div class="col-1">
                                <p class="title">Date Of Birth (in A.D)</p>
                                <input type="date" class="input" name="std_dob" id="dob" required value="<?php if (isset($_SESSION['inputStdDOB'])) {
                                                                                                                echo $_SESSION['inputStdDOB'];
                                                                                                                unset($_SESSION['inputStdDOB']);
                                                                                                            } ?>">
                                <!-- <p id="DOBErrorMsg" class="errorMsg">Student should be atleast 14years old.</p> -->
                            </div>

                            <div class="col-2">
                                <p class="title">Year Of Joining</p>
                                <!-- <input type="date" class="input" id="fullname" required> -->

                                <select name="std_yoj" class="input" required>
                                    <?php
                                    $res = mysqli_query($conn, "Select * from batch order by batch_id desc");
                                    while ($data = mysqli_fetch_assoc($res)) {
                                        // $data = mysqli_fetch_assoc($res);
                                        if (isset($_SESSION['inputStdYOJ']) && $_SESSION['inputStdYOJ'] == $data['batch_id']) {
                                            echo '<option selected value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                            unset($_SESSION['inputStdYOJ']);
                                        } else {
                                            echo '<option value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                        }
                                    }
                                    ?>

                                </select>
                            </div>

                            <!-- <label for="fullname" class="errorMsg">Enter your Birthdate</label> -->
                        </div>

                        <!-- Submit and Reset Button -->
                        <div class="form-item two-column">
                            <input type="reset" value="Reset" class="input col-1">
                            <input type="submit" value="Submit" name="submitBtn" id="submitBtn" class="input col-2">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- <script src="<?php echo URL ?>js/validate.js"></script> -->
    <script src="<?php echo URL ?>js/alertBox.js"></script>
</body>