<?php
include "./header.php";
include "./validate.php";
if (!isset($_GET['edit_id'])) {
    header("location:" . URL . "php/view-teacher.php");
}
// $edit_id = $_POST['edit_id'];
$edit_id = validate_script(mysqli_real_escape_string($conn, base64_decode(base64_decode($_GET['edit_id']))));
// $edit_id = $_GET['edit_id'];
if (!isset($_SESSION['isEditTeacherDataInvalid'])) {
    $sql = "SELECT * FROM teachers WHERE t_id = $edit_id";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);
}
unset($_SESSION['isEditTeacherDataInvalid']);
?>

<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Teacher</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mystyle.css">

    <style>
        .form-item {
            margin-bottom: .5rem;
        }
    </style>
</head>

<body> -->
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
                <h1 class="main-title">College Management System | Update Teacher</h1>
            </div>



            <div class="form">
                <div class="form-container">
                    <div class="form-title-bar">
                        <h1 class="form-title">Teacher Registration Form</h1>
                    </div>

                    <!-- fetching teacher's data -->

                    <form action="update-teacher.php" method="post">
                        <input type="text" value="<?php echo base64_encode(base64_encode($edit_id)) ?>" name="updateId" style="display: none;">
                        <div class="form-item">
                            <p class="title">Name</p>
                            <input type="text" name="fullname" value="<?php if (!isset($_SESSION['inputTeacherName'])) echo $data['t_name'];
                                                                        echo $_SESSION['inputTeacherName']; ?>" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off">
                            <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['nameError'])) echo 'style="display:block"'; ?>>
                                <?php echo $_SESSION['nameError'];
                                unset($_SESSION['nameError'], $_SESSION['inputTeacherName']) ?>
                            </label>
                        </div>

                        <div class="form-item">
                            <p class="title">Permanent Address</p>
                            <input type="text" name="address" value="<?php if(!isset($_SESSION['inputTeacherAdd'])) echo $data['t_address']; echo $_SESSION['inputTeacherAdd']; ?>" class="input" id="fullname" required placeholder="Enter your full address" autocomplete="off">
                        </div>

                        <div class="form-item">
                            <p class="title">Gender</p>
                            <input type="radio" class="radio" name="gender" value="Male" required <?php if (!(isset($_SESSION['inputTeacherGender'])) && $data['t_gender'] == "Male") echo "checked"; if($_SESSION['inputTeacherGender'] == "Male"){echo "checked"; unset($_SESSION['inputTeacherGender']);} ?>><span>Male</span>
                            <input type="radio" class="radio" name="gender" value="Female" required <?php if (!(isset($_SESSION['inputTeacherGender'])) && $data['t_gender'] == "Female") echo "checked"; if($_SESSION['inputTeacherGender'] == "Female"){echo "checked"; unset($_SESSION['inputTeacherGender']);} ?>><span>Female</span>
                            <input type="radio" class="radio" name="gender" value="Other" required <?php if (!(isset($_SESSION['inputTeacherGender'])) && $data['t_gender'] == "Other") echo "checked"; if($_SESSION['inputTeacherGender'] == "Other"){echo "checked"; unset($_SESSION['inputTeacherGender']);} ?>><span>Other</span>
                        </div>

                        <div class="form-item">
                            <p class="title">Qualification</p>
                            <textarea type="text" class="input" name="qualification" required placeholder="Enter Qualification" autocomplete="off" onkeyup="adjustHeight(this)" style="min-height:40px; min-width:100%; max-height: 8rem; max-width: 100%; padding-top: 0.5rem; font-size:14px; padding-bottom: 0.5rem; overflow:auto;"><?php if(!isset($_SESSION['inputTeacherQualification'])) echo $data['t_qualification']; echo $_SESSION['inputTeacherQualification']; ?></textarea>
                        </div>

                        <div class="form-item">
                            <div class="contact two-column">
                                <div class="email col-1">
                                    <p class="title">Email</p>
                                    <input type="email" class="input" value="<?php if(!isset($_SESSION['inputTeacherEmail'])) echo $data['t_email']; echo $_SESSION['inputTeacherEmail']; ?>" id="fullname" name="email" required placeholder="example@gmail.com" autocomplete="off">
                                    <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['emailError'])) echo 'style="display:block"'; ?>>
                                        <?php echo $_SESSION['emailError'];
                                        unset($_SESSION['emailError'], $_SESSION['inputTeacherEmail']) ?>
                                    </label>
                                </div>

                                <div class="phone col-2">
                                    <p class="title">Phone</p>
                                    <input type="tel" class="input" value="<?php if(!isset($_SESSION['inputTeacherPhone'])) echo $data['t_contact']; echo $_SESSION['inputTeacherPhone'];?>" id="phone" name="phone" placeholder="Must be 10 digits" required autocomplete="off">
                                    <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['phoneError'])) echo 'style="display:block"'; ?>>
                                        <?php echo $_SESSION['phoneError'];
                                        unset($_SESSION['phoneError'], $_SESSION['inputTeacherPhone']) ?>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-item">
                            <!-- <input type="reset" value="Reset" class="input col-1"> -->
                            <input type="submit" value="Update" name="updateBtn" id="updateBtn" class="input">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            document.title = "Update Teacher"

            function adjustHeight(el) {
                el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight) + "px" : "40px";
            }
        </script>
        <!-- <script src="<?php echo URL ?>js/validate.js"></script>
        <script src="<?php echo URL ?>js/alertBox.js"></script> -->
</body>

</html>