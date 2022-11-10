<?php
include "header.php";
include "./validate.php";

if (!isset($_GET['edit'])) {
    header("location: " . URL . "php/view-student.php");
}

// $edit_id = $_POST['edit_id'];    //previously used method
$edit_id = validate_script(mysqli_escape_string($conn, base64_decode($_GET['edit_id'])));
// echo "edit_id ==> $edit_id <br>";

if (!isset($_SESSION['isEditStdDataInvalid'])) {
    $sql = "SELECT * FROM students WHERE std_id = '$edit_id'";
    $res = mysqli_query($conn, $sql);
    $fetched_data = mysqli_fetch_assoc($res);
}

unset($_SESSION['isEditStdDataInvalid']);
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
            <a href="<?php echo URL ?>php/view-student.php">
                <img src="<?php echo URL ?>img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewstudent">
                <p1>Find Student</p1>
            </a>
            <a href="<?php echo URL ?>php/setting.php">
                <img src="<?php echo URL ?>img/logout_FILL0_wght400_GRAD0_opsz48.png" id="logout">
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
            <h1 class="main-title">College Management System | Update Student</h1>
        </div>

        <div class="form">
            <div class="form-container">
                <div class="form-title-bar">
                    <h1 class="form-title">Student Registration Form</h1>
                </div>
                <form action="update-std-data.php" method="post">
                    <input type="text" value="<?php echo base64_encode($edit_id) ?>" name="updateId" style="display: none;">

                    <!-- Name -->
                    <div class="form-item">
                        <p class="title">Full Name</p>
                        <input type="text" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off" name="std_name" value="<?php if (!isset($_SESSION['inputStdName'])) echo $fetched_data['std_name'];
                                                                                                                                                                echo $_SESSION['inputStdName']; ?>">
                        <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['nameError'])) echo 'style="display:block"'; ?>>
                            <?php echo $_SESSION['nameError'];
                            unset($_SESSION['nameError'], $_SESSION['inputStdName']) ?>
                        </label>
                    </div>

                    <!-- Address -->
                    <div class="form-item">
                        <p class="title">Permanent Address</p>
                        <input type="text" class="input" required placeholder="Enter your full address" autocomplete="off" name="std_address" value="<?php if (!isset($_SESSION['inputStdAdd'])) echo $fetched_data['address'];
                                                                                                                                                        echo $_SESSION['inputStdAdd'];
                                                                                                                                                        unset($_SESSION['inputStdAdd']) ?>">
                    </div>

                    <!-- Gender -->
                    <div class="form-item">
                        <p class="title">Gender</p>
                        <input type="radio" name="std_gender" value="Male" class="radio" required <?php if (!isset($_SESSION['inputStdGender']) && $fetched_data['gender'] == "Male") echo "checked";
                                                                                                    if ($_SESSION['inputStdGender'] == "Male") {
                                                                                                        echo "checked";
                                                                                                        unset($_SESSION['inputStdGender']);
                                                                                                    } ?>><span>Male</span>
                        <input type="radio" name="std_gender" value="Female" class="radio" required <?php if (!isset($_SESSION['inputStdGender']) && $fetched_data['gender'] == "Female") echo "checked";
                                                                                                    if ($_SESSION['inputStdGender'] == "Female") {
                                                                                                        echo "checked";
                                                                                                        unset($_SESSION['inputStdGender']);
                                                                                                    } ?>><span>Female</span>
                        <input type="radio" name="std_gender" value="Other" class="radio" required <?php if (!isset($_SESSION['inputStdGender']) && $fetched_data['gender'] == "Other") echo "checked";
                                                                                                    if ($_SESSION['inputStdGender'] == "Other") {
                                                                                                        echo "checked";
                                                                                                        unset($_SESSION['inputStdGender']);
                                                                                                    } ?>><span>Other</span>
                    </div>

                    <!-- Parent's Name -->
                    <div class="form-item">
                        <p class="title">Parents' Name</p>
                        <input type="text" class="input" id="parentName" name="parentsName" required placeholder="Enter your father's or mother's name" value="<?php if (!isset($_SESSION['inputStdParentName'])) echo $fetched_data['parents_name'];
                                                                                                                                                                echo $_SESSION['inputStdParentName'];
                                                                                                                                                                unset($_SESSION['inputStdParentName']); ?>">
                        <label for="parentName" class="errorMsg invalid" <?php if (isset($_SESSION['ParentNameError'])) echo "style='display:block'"; ?>>
                            <?php echo $_SESSION['ParentNameError'];
                            unset($_SESSION['ParentNameError'], $_SESSION['inputStdParentName']) ?>
                        </label>
                    </div>

                    <!-- faculty & Phone -->
                    <div class="form-item">
                        <div class="contact two-column">
                            <div class="faculty col-1">
                                <p class="title">Faculty</p>
                                <select name="std_faculty" id="" class="input" required>
                                    <option value>Select Faculty</option>
                                    <?php
                                    $res = mysqli_query($conn, "Select * from faculty");
                                    while ($data = mysqli_fetch_assoc($res)) {
                                        // $data = mysqli_fetch_assoc($res);
                                        echo $_SESSION['inputStdFaculty'];
                                        if ((!isset($_SESSION['inputStdFaculty']) && $fetched_data['faculty_id'] == $data['faculty_id']) || ($_SESSION['inputStdFaculty'] == $data['faculty_id'])) {
                                            echo '<option selected value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                            unset($_SESSION['inputStdFaculty']);
                                            continue;
                                        }
                                        echo '<option value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="phone col-2">
                                <p class="title">Phone</p>
                                <input type="text" class="input" id="PhoneInput" name="std_phone" placeholder="Must be 10 digits" required autocomplete="off" id="phone" value="<?php if (!isset($_SESSION['inputStdPhone'])) echo $fetched_data['phone'];
                                                                                                                                                                                echo $_SESSION['inputStdPhone']; ?>">
                                <label for="PhoneInput" class="errorMsg invalid" <?php if (isset($_SESSION['phoneError'])) echo "style='display:block'";
                                                                                    ?>><?php echo $_SESSION['phoneError'];
                                                                                        unset($_SESSION['phoneError']);
                                                                                        unset($_SESSION['inputStdPhone']); ?></label>
                            </div>
                        </div>
                    </div>

                    <!-- Date of Birth and year of joining -->
                    <div class="form-item two-column">
                        <div class="col-1">
                            <p class="title">Date Of Birth (in A.D)</p>
                            <input type="date" class="input" name="std_dob" id="dob" required value="<?php if (!isset($_SESSION['inputStdDOB'])) echo $fetched_data['dob'];
                                                                                                        echo $_SESSION['inputStdDOB'];
                                                                                                        unset($_SESSION['inputStdDOB']) ?>">
                            <!-- <p id="DOBErrorMsg" class="errorMsg invalid" <?php if (isset($_SESSION['inputStdDOB'])) echo "style='display:block;'"; ?>>Student should be atleast 14years old.</p> -->
                        </div>

                        <div class="col-2">
                            <p class="title">Year Of Joining</p>
                            <select name="std_yoj" class="input" required>
                                <?php
                                $res = mysqli_query($conn, "Select * from batch order by batch_id desc");
                                while ($data = mysqli_fetch_assoc($res)) {

                                    // $data = mysqli_fetch_assoc($res);
                                    if ((!isset($_SESSION['inputStdYOJ']) && $fetched_data['yoj'] == $data['batch_id']) || $_SESSION['inputStdYOJ'] == $data['batch_id']) {
                                        echo '<option selected value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                        unset($_SESSION['inputStdYOJ']);
                                        continue;
                                    }
                                    echo '<option value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-item two-column">
                        <input type="submit" value="Update" name="updateBtn" id="updateBtn" class="input">
                    </div>

                    <?php
                    // strtok() split the string according to the given sub-string
                    if (strtok($_SERVER['HTTP_REFERER'], "?") == (URL . "php/search-by-faculty.php")) {

                        $_SESSION['byFaculty_url'] = $_SERVER['HTTP_REFERER'];
                    }

                    if (strtok($_SERVER['HTTP_REFERER'], "?") == (URL . "php/result.php")) {
                        $_SESSION['byName_url'] = $_SERVER['HTTP_REFERER'];
                    }
                    ?>
                </form>
            </div>
        </div>

    </div>
</div>


<script>
    document.title = "Update Student";
</script>
<script src="<?php echo URL ?>js/alertBox.js"></script>
</body>

</html>