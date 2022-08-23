<?php
include "./header.php";
?>

<!DOCTYPE html>
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
                <h1 class="main-title">College Management System | Update Teacher</h1>
            </div>

            <!-- <div class="alertBox" <?php if (isset($_SESSION['isAdded'])) {
                                            echo 'style="display:flex"';
                                            unset($_SESSION['isAdded']);
                                        } ?>>
                <strong>
                    Teacher Added Successfully!!!
                </strong>
                <button type="button" class="btn-close"></button>
            </div> -->

            <div class="form">
                <div class="form-container">
                    <div class="form-title-bar">
                        <h1 class="form-title">Teacher Registration Form</h1>
                    </div>

                    <!-- fetching teacher's data -->
                    <?php
                    $edit_id = $_POST['edit_id'];
                    // echo "delete id = " .$delete_id;
                    $sql = "SELECT * FROM teachers WHERE t_id = $edit_id";
                    $res = mysqli_query($conn, $sql);
                    // echo mysqli_num_rows($res);
                    $data = mysqli_fetch_assoc($res);
                    // print_r($data);
                    ?>

                    <form action="update-teacher.php" method="post">
                        <input type="text" value="<?php echo $edit_id ?>" name="updateId" style="display: none;">
                        <div class="form-item">
                            <p class="title">Name</p>
                            <input type="text" name="fullname" value="<?php echo $data['t_name']; ?>" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off">
                        </div>

                        <div class="form-item">
                            <p class="title">Permanent Address</p>
                            <input type="text" name="address" value="<?php echo $data['t_address']; ?>" class="input" id="fullname" required placeholder="Enter your full address" autocomplete="off">
                        </div>

                        <div class="form-item">
                            <p class="title">Gender</p>
                            <input type="radio" class="radio" name="gender" value="Male" required <?php if ($data['t_gender'] == "Male") echo "checked" ?>><span>Male</span>
                            <input type="radio" class="radio" name="gender" value="Female" required <?php if ($data['t_gender'] == "Female") echo "checked" ?>><span>Female</span>
                            <input type="radio" class="radio" name="gender" value="Other" required <?php if ($data['t_gender'] == "Other") echo "checked" ?>><span>Other</span>
                        </div>

                        <div class="form-item">
                            <p class="title">Qualification</p>
                            <textarea type="text" class="input" name="qualification" required placeholder="Enter Qualification" autocomplete="off" onkeyup="adjustHeight(this)" style="min-height:40px; min-width:100%; max-height: 8rem; max-width: 100%; padding-top: 0.5rem; font-size:14px; padding-bottom: 0.5rem; overflow:auto;"><?php echo $data['t_qualification']; ?></textarea>
                        </div>

                        <div class="form-item">
                            <div class="contact two-column">
                                <div class="email col-1">
                                    <p class="title">Email</p>
                                    <input type="email" class="input" value="<?php echo $data['t_email']; ?>" id="fullname" name="email" required placeholder="example@gmail.com" autocomplete="off">
                                </div>

                                <div class="phone col-2">
                                    <p class="title">Phone</p>
                                    <input type="tel" class="input" value="<?php echo $data['t_contact']; ?>" id="phone" name="phone" placeholder="Must be 10 digits" required autocomplete="off">
                                    <p class="errorMsg">Invalid Phone Number. Should be 10 digit long</p>
                                </div>
                            </div>
                        </div>


                        <div class="form-item">
                            <!-- <input type="reset" value="Reset" class="input col-1"> -->
                            <input type="submit" value="Update" name="updateBtn" class="input">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            function adjustHeight(el) {
                el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight) + "px" : "40px";
            }
        </script>
        <script src="<?php echo URL ?>js/validate.js"></script>
        <script src="<?php echo URL ?>js/alertBox.js"></script>
</body>

</html>