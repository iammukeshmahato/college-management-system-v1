<?php
include("./header.php")
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Setting</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL ?>/css/edit-profile.css">
    <style>
        .form-container {
            padding: 1rem 1rem;
        }

        .form-item {
            margin-bottom: .5rem;
            position: relative;
        }

        .form-item:last-child {
            margin-bottom: 0;
        }

        .title {
            width: 8rem;
        }

        b>span {
            height: 32px;
            width: 32px;
            POSITION: ABSOLUTE;
            RIGHT: 0.75rem;
            top: 12px;
            padding: 0;
            background-image: url("<?php echo URL ?>/img/editt.png");
            background-size: cover;
            cursor: pointer;
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
                <a href="<?php echo URL ?>php/setting.php" class="active">
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
                <h1 class="main-title">College Management System | Edit Profile</h1>
            </div>

            <!-- profile section -->
            <div class="edit-profile-sec">
                <div class="profile-pic">
                    <img src="<?php echo URL . "pp/" . $_SESSION['logged_user_pp'] ?>" id="avtar">

                    <div class="upload-image">
                        <form action="#" method="post" enctype="multipart/form-data" id="imageUploadForm">
                            <label for="uploadImage">
                                <img src="<?php echo URL ?>/img/editt.png" alt="">
                            </label>
                            <input type="file" id="uploadImage" style="display: none" name="ProfileImage" accept="image/png,image/gif,image/jpeg,image/jpg">
                        </form>
                    </div>

                    <label id="pp-error" for="uploadImage">Only JPG and PNG file supported</label>
                </div>

                <div class="ac-info">
                    <div class="info-sec">
                        <h3 class="info-title">Account Information</h3>

                        <div class="form-container" style="margin-left:0rem; box-shadow: none;">
                            <form>
                                <!-- Name -->
                                <div class="form-item">
                                    <div class="flex">
                                        <p class="title" style="margin-bottom:0;">Full Name:</p>
                                        <b class="input" id="updateName">
                                            <!-- populating logged user name  -->
                                            <?php echo $_SESSION['logged_user_name'] ?>
                                            <!-- edit Btn -->
                                            <!-- <span id="editName" onclick="nameEditBtnClick()"></span> -->
                                        </b>
                                    </div>
                                </div>

                                <!-- username -->
                                <div class="form-item" style="margin-bottom: 0;">
                                    <div class="flex">
                                        <p class="title" style="margin-bottom:0;">Username:</p>
                                        <b class="input" id="updateUsername">
                                            <?php
                                            $id = $_SESSION['logged_user_id'];

                                            // $sql = "SELECT username FROM Admin_list WHERE id = $id";
                                            // $res = mysqli_query($conn,$sql);
                                            // $data = mysqli_fetch_assoc($res);
                                            // $username = $data['username'];
                                            // echo $username;

                                            $username = mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM Admin_list WHERE id = $id"))['username'];
                                            echo $username;
                                            ?>
                                            <!-- edit Btn -->
                                            <!-- git <span id="editName" onclick="usernameEditBtnClick()"></span> -->
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="password-sec">
                        <h3 class="info-title">Change Password</h3>
                        <div class="form-container" style="margin-left:0rem; box-shadow: none;">
                            <form method="POST" id="changePasswordForm">
                                <div class="form-item">
                                    <div class="flex">
                                        <p class="title" style="margin-bottom:0; width: 14rem;">Current Password:</p>
                                        <input type="password" name="currentPassword" id="currentPassword" class="input pass" required>
                                        <span class="hideShowBtn"></span>
                                    </div>
                                    <div style="margin-top: 0.5rem; margin-left: 10rem;">
                                        <label for="currentPassword" id="currentPassError" style="display: none; color:red;"> Invalid Password: Please enter a valid passwod. </label>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="flex">
                                        <p class="title" style="margin-bottom:0; width: 14rem;">New Password:</p>
                                        <input type="password" name="newPassword" id="newPassword" class="input pass" oninput="checkPassword()" required>
                                        <span class="hideShowBtn"></span>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="flex">
                                        <p class="title" style="margin-bottom:0; width: 14rem;">Re-type Password:</p>
                                        <input type="password" name="confirmPassword" id="confirmPassword" class="input pass" oninput="checkPassword()" required>
                                        <span class="hideShowBtn"></span>
                                    </div>
                                    <div style="margin-top: 0.5rem; margin-left: 10rem;">
                                        <label for="confirmPassword" id="cPassErrpr"> Passwords does not matched </label>
                                    </div>
                                </div>
                                <div class="ac-info-submit">
                                    <input type="submit" value="Submit" name="submitBtn" class="button input" style="width: 4rem; height:2rem;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Popup message -->
            <div class="popup-wrapper">
                <div class="popup-name">
                    <div class="form-container" style="margin-left:0rem; box-shadow: none;">
                        <form id="nameForm" method="POST">
                            <div class="form-item">
                                <p class="title">Full Name:</p>
                                <input type="text" class="input" id="admin_name" required placeholder="Enter Your Full Name" autocomplete="off" name="admin_name" value="<?php echo $_SESSION['logged_user_name']; ?>">
                                <label for="fullnameSend" class="errorMsg invalid" id="nameErrorMsg">
                                    <!-- Error messages will be shown here -->
                                </label>
                            </div>
                            <div class="ac-info-submit">
                                <input type="button" value="Cancel" name="submitBtn" id="submitBtn" class="button input" style="width: 4rem; height:2rem; margin-right:1rem;" onclick="cancelForm('popup-name')">
                                <input type="submit" id="nameSubmitBtn" class="button input" style="width: 4rem; height:2rem;">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="popup-username">
                    <div class="form-container" style="margin-left:0rem; box-shadow: none;">
                        <form id="usernameForm" method="POST">
                            <div class="form-item">
                                <p class="title">Username:</p>
                                <input type="text" class="input" id="admin_username" name="admin_username" required placeholder="Enter your username" autocomplete="off" value="<?php echo $username; ?>">
                                <label for="emailSend" class="errorMsg invalid" id="usernameErrorMsg">
                                    <!-- Error messages will be shown here -->
                                </label>
                            </div>
                            <div class="ac-info-submit">
                                <input type="button" value="Cancel" class="button input" style="width: 4rem; height:2rem; margin-right:1rem;" onclick="cancelForm('popup-username')">
                                <input type="submit" value="Submit" name="submitBtn" id="usernameSubmitBtn" class="button input" style="width: 4rem; height:2rem;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- success message for password changed -->
            <div class="succss-wrapper">
                <div class="success">
                    <img src="<?php echo URL?>img/success.gif" alt="success">
                    <h3>Password Changed successfully</h3>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URL ?>/js/edit-profile.js"></script>
    <script src="<?php echo URL ?>/js/uploadImage.js"></script>
</body>

</html>