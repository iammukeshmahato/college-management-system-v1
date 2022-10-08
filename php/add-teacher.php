<?php
include "./header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <!-- <meta charset="utf-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <title>Add Teacher</title> -->
    <!-- <meta name="description" content=""> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link rel="stylesheet" href="mystyle.css"> -->

    <style>
        .form-item {
            margin-bottom: .5rem;
        }
    </style>
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
                <a href="<?php echo URL ?>php/add-teacher.php" class="active">
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
                <h1 class="main-title">College Management System | Add Teacher</h1>
            </div>

            <div class="alertBox" <?php if (isset($_SESSION['isAdded'])) {
                                        echo 'style="display:flex"';
                                        unset($_SESSION['isAdded']);
                                    } ?>>
                <strong>
                    Teacher Added Successfully!!!
                </strong>
                <button type="button" class="btn-close"></button>
            </div>

            <div class="form">
                <div class="form-container">
                    <div class="form-title-bar">
                        <h1 class="form-title">Teacher Registration Form</h1>
                    </div>

                    <form action="add-teacher-data.php" method="post">
                        <div class="form-item">
                            <p class="title">Name</p>
                            <input type="text" name="fullname" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off" value="<?php echo $_SESSION['inputTeacherName']; ?>">
                            <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['nameError'])) echo 'style="display:block"'; ?>>
                                <?php echo $_SESSION['nameError'];
                                unset($_SESSION['nameError'], $_SESSION['inputTeacherName']) ?>
                            </label>
                        </div>

                        <div class="form-item">
                            <p class="title">Permanent Address</p>
                            <input type="text" name="address" class="input" id="fullname" required placeholder="Enter your full address" autocomplete="off" value="<?php if (isset($_SESSION['inputTeacherAdd'])) echo $_SESSION['inputTeacherAdd'];
                                                                                                                                                                    unset($_SESSION['inputTeacherAdd']) ?>">
                        </div>

                        <div class="form-item">
                            <p class="title">Gender</p>
                            <input type="radio" class="radio" name="gender" value="Male" required <?php if ($_SESSION['inputTeacherGender'] && $_SESSION['inputTeacherGender'] == "Male") echo "checked";
                                                                                                    unset($_SESSION['inputTeacherGender']); ?>><span>Male</span>
                            <input type="radio" class="radio" name="gender" value="Female" required <?php if ($_SESSION['inputTeacherGender'] && $_SESSION['inputTeacherGender'] == "Female") echo "checked";
                                                                                                    unset($_SESSION['inputTeacherGender']); ?>><span>Female</span>
                            <input type="radio" class="radio" name="gender" value="Other" required <?php if ($_SESSION['inputTeacherGender'] && $_SESSION['inputTeacherGender'] == "Other") echo "checked";
                                                                                                    unset($_SESSION['inputTeacherGender']); ?>><span>Other</span>
                        </div>

                        <div class="form-item">
                            <p class="title">Qualification</p>
                            <textarea type="text" class="input" name="qualification" required placeholder="Enter Qualification" autocomplete="off" onkeyup="adjustHeight(this)" style="min-height:40px; min-width:100%; max-height: 8rem; max-width: 100%; padding-top: 0.5rem; font-size:14px; padding-bottom: 0.5rem; overflow:auto;"><?php echo $_SESSION['inputTeacherQualification']; unset($_SESSION['inputTeacherQualification']); ?></textarea>
                        </div>

                        <div class="form-item">
                            <div class="contact two-column">
                                <div class="email col-1">
                                    <p class="title">Email</p>
                                    <input type="email" class="input" id="fullname" name="email" required placeholder="example@gmail.com" autocomplete="off" value="<?php echo $_SESSION['inputTeacherEmail']; ?>">
                                    <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['emailError'])) echo 'style="display:block"'; ?>>
                                        <?php echo $_SESSION['emailError'];
                                        unset($_SESSION['emailError'], $_SESSION['inputTeacherEmail']) ?>
                                    </label>
                                </div>

                                <div class="phone col-2">
                                    <p class="title">Phone</p>
                                    <input type="tel" class="input" id="phone" name="phone" placeholder="Must be 10 digits" required autocomplete="off" value="<?php echo $_SESSION['inputTeacherPhone']; ?>">
                                    <label for="fullname" class="errorMsg invalid" <?php if (isset($_SESSION['phoneError'])) echo 'style="display:block"'; ?>>
                                        <?php echo $_SESSION['phoneError'];
                                        unset($_SESSION['phoneError'], $_SESSION['inputTeacherPhone']) ?>
                                    </label>
                                    <!-- <p class="errorMsg">Invalid Phone Number. Should be 10 digit long</p> -->


                                </div>
                            </div>
                        </div>


                        <div class="form-item two-column">
                            <input type="reset" value="Reset" class="input col-1">
                            <input type="submit" value="Submit" name="submitBtn" id="submitBtn" class="input col-2">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            document.title = "Add Teacher";

            function adjustHeight(el) {
                el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight) + "px" : "40px";
            }
        </script>
        <!-- <script src="<?php echo URL ?>js/validate.js"></script> -->
        <script src="<?php echo URL ?>js/alertBox.js"></script>
</body>

</html>