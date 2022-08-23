<?php
session_start();
include "header.php";

// print_r($_POST);
if(!isset($_POST['edit'])){
    header("location: ". URL . "php/view-student.php");
}

$edit_id = $_POST['edit_id'];

$sql = "SELECT * FROM students WHERE std_id = '$edit_id'";
$res = mysqli_query($conn, $sql);
$fetched_data = mysqli_fetch_assoc($res);

var_dump($fetched_data);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Student</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="./css/mystyle.css">
    <link rel="stylesheet" href="./css/add-student-style.css">
    <link rel="stylesheet" href="./css/alertBox.css"> -->

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
                    <p1>Find Teacher</p1>
                </a>
                <a href="<?php echo URL ?>php/view-student.php">
                    <img src="<?php echo URL ?>img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewstudent">
                    <p1>Find Student</p1>
                </a>
                <a href="<?php echo URL ?>setting.php">
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

            <div class="alertBox" <?php if (isset($_SESSION['isAdded']) && ($_SESSION['isAdded'] == "yes")) {
                                        echo 'style="display:flex"';
                                        $_SESSION['isAdded'] = "no";
                                    } ?>>
                <strong>
                    Student Updated Successfully!!!
                </strong>
                <button type="button" class="btn-close"></button>
            </div>



            <div class="form">
                <div class="form-container">
                    <div class="form-title-bar">
                        <h1 class="form-title">Student Registration Form</h1>
                    </div>
                    <form action="update-std-data.php" method="post">
                        <input type="text" value="<?php echo $edit_id ?>" name="updateId" style="display: none;">

                        <!-- Name -->
                        <div class="form-item">
                            <p class="title">Full Name</p>
                            <input type="text" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off" name="std_name" value="<?php echo $fetched_data['std_name'] ?>">
                            <!-- <label for="fullname" class="errorMsg">Full Name</label> -->
                        </div>

                        <!-- Address -->
                        <div class="form-item">
                            <p class="title">Permanent Address</p>
                            <input type="text" class="input" required placeholder="Enter your full address" autocomplete="off" name="std_address" value="<?php echo $fetched_data['address'] ?>">
                            <!-- <label for="fullname" class="errorMsg">Full Name</label> -->
                        </div>

                        <!-- Gender -->
                        <div class="form-item">
                            <p class="title">Gender</p>
                            <input type="radio" name="std_gender" value="Male" class="radio" required <?php if($fetched_data['gender']=="Male") echo "checked"?>><span>Male</span>
                            <input type="radio" name="std_gender" value="Female" class="radio" required <?php if($fetched_data['gender']=="Female") echo "checked"?>><span>Female</span>
                            <input type="radio" name="std_gender" value="Other" class="radio" required <?php if($fetched_data['gender']=="Other") echo "checked"?>><span>Other</span>
                        </div>

                        <div class="form-item">
                            <p class="title">Parents' Name</p>
                            <input type="text" class="input" name="parentsName" required placeholder="Enter your father's or mother's name" value="<?php echo $fetched_data['parents_name'] ?>">
                            <!-- <label for="fullname" class="errorMsg">Full Name</label> -->
                        </div>

                        <!-- Faculty -->
                        <!-- <div class="form-item">
                            <p class="title">Faculty</p>
                            <select name="std_faculty" id="" class="input" required>
                                <option>Select Faculty</option>
                                <?php
                                $res = mysqli_query($conn, "Select * from faculty");
                                while ($data = mysqli_fetch_assoc($res)) {
                                    // $data = mysqli_fetch_assoc($res);
                                    echo '<option value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div> -->

                        <!-- Contact Email & Phone -->
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
                                        <option>Select Faculty</option>
                                        <?php
                                        $res = mysqli_query($conn, "Select * from faculty");
                                        while ($data = mysqli_fetch_assoc($res)) {
                                            // $data = mysqli_fetch_assoc($res);
                                            if($fetched_data['faculty_id'] == $data['faculty_id']){
                                                echo '<option selected value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                                            }
                                            echo '<option value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
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
                                    <input type="text" class="input" name="std_phone" placeholder="Must be 10 digits" required autocomplete="off" id="phone" value="<?php echo $fetched_data['phone'] ?>">
                                    <p class="errorMsg">Invalid Phone Number. Should be 10 digit long</p>
                                </div>
                            </div>
                        </div>

                        <!-- Date of Birth and year of joining -->
                        <div class="form-item two-column">
                            <div class="col-1">
                                <p class="title">Date Of Birth (in A.D)</p>
                                <input type="date" class="input" name="std_dob" id="dob" required  value="<?php echo $fetched_data['dob'] ?>">
                                <p id="DOBErrorMsg" class="errorMsg">Student should be atleast 14years old.</p>
                            </div>

                            <div class="col-2">
                                <p class="title">Year Of Joining</p>
                                <!-- <input type="date" class="input" id="fullname" required> -->

                                <select name="std_yoj" class="input" required>
                                    <?php
                                    $res = mysqli_query($conn, "Select * from batch order by batch_id desc");
                                    while ($data = mysqli_fetch_assoc($res)) {

                                        // $data = mysqli_fetch_assoc($res);
                                        if($fetched_data['yoj'] == $data['batch_id']){
                                            echo '<option selected value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                        }
                                        echo '<option value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                                    }
                                    
                                    ?>

                                </select>
                            </div>

                            <!-- <label for="fullname" class="errorMsg">Enter your Birthdate</label> -->
                        </div>

                        <!-- Submit and Reset Button -->
                        <div class="form-item two-column">
                            <!-- <input type="reset" value="Reset" class="input col-1"> -->
                            <input type="submit" value="Update" name="updateBtn" id="updateBtn" class="input">
                        </div>

                        <!-- <div class="form-item">
                            <p class="title">Permanent Address</p>

                            <div class="Address two-column">
                                <div style="width: calc(calc(100% - 1rem)/2);">
                                    <select name="" id="" class="input">
                                        <option value="">Select Province</option>
                                        <option value="">Province 1</option>
                                        <option value="">Province 2</option>
                                        <option value="">Province 3</option>
                                        <option value="">Province 4</option>
                                        <option value="">Province 5</option>
                                        <option value="">Province 6</option>
                                        <option value="">Province 7</option>
                                    </select>
                                    <label for="fullname" class="errorMsg">Province</label>
                                </div>
                                <div style="width: calc(calc(100% - 1rem)/2);">
                                    <input type="text" class="input add-input" id="fullname" required>
                                    <label for="fullname" class="errorMsg">District</label>
                                </div>

                            </div>
                            <div class="Address two-column" style="margin-top: 1rem;">
                                <div style="width: calc(calc(100% - 1.5rem)/3);">
                                    <input type="text" class="input add-input" id="fullname" required>
                                    <label for="fullname" class="errorMsg">Municiplicity</label>
                                </div>
                                <div style="width: calc(calc(100% - 1.5rem)/3);">
                                    <input type="text" class="input add-input" id="fullname" required>
                                    <label for="fullname" class="errorMsg">Ward</label>
                                </div>
                                <div style="width: calc(calc(100% - 1.5rem)/3);">
                                    <input type="text" class="input add-input" id="fullname" required>
                                    <label for="fullname" class="errorMsg">Tole</label>
                                </div>
                            </div>

                        </div> -->

                        <!-- <div class="form-item">
                            <p class="title">Name of Father/Mother</p>
                            <input type="text" class="input" id="fullname" required placeholder="Enter your father's or mother's name">
                            <label for="fullname" class="errorMsg">Full Name</label>
                        </div> -->

                        <?php
                            if($_SERVER['HTTP_REFERER'] == "http://localhost/minor%20project/search-by-faculty.php"){
                                $_SESSION['previous_url'] = "http://localhost/minor%20project/search-by-faculty.php";
                            }
                        ?>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <!-- <script>
        let phone = document.querySelector("#phone");
        let PhoneErrorMsg = document.querySelector(".errorMsg");
        let DOBErrorMsg = document.querySelector("#DOBErrorMsg");
        let dob = document.querySelector("#dob");

        phone.addEventListener("blur", (e) => {
            console.log("Blur event fired");
            const regex = /^9[678]{1}[0-9]{8}$/;
            if (regex.test(phone.value)) {
                phone.classList.remove("invalid");
                PhoneErrorMsg.style.display = "none";
            } else {
                phone.classList.add("invalid");
                PhoneErrorMsg.style.display = "block";

            }

        })

        dob.addEventListener("blur", () => {
            let currentDate = new Date();
            let selectedDOB = new Date(dob.value);
            let diff_in_sec = (currentDate.getTime() - selectedDOB.getTime()) / 1000;
            let year = (diff_in_sec / 86400) / 365;

            if (year >= 14) {
                dob.classList.remove("invalid");
                DOBErrorMsg.style.display = "none";
            } else {
                dob.classList.add("invalid");
                DOBErrorMsg.style.display = "block";

            }
        })
    </script> -->
    <!-- 
    <script>
        let alertBox = document.querySelector(".alertBox");
        let closeBtn = document.querySelector(".btn-close");

        // console.log(closeBtn);

        // setTimeout(() => {
        //     alertBox.style.display = "none";

        // }, 5000);

        closeBtn.addEventListener("click", () => {
            alertBox.style.display = "none";
        });
    </script> -->

    <script src="<?php echo URL ?>js/validate.js"></script>
    <script src="<?php echo URL ?>js/alertBox.js"></script>
</body>

</html>