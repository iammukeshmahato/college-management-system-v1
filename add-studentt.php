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
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="add-student-style.css">
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
                <a href="./home.php">
                    <img src="./img/home_FILL0_wght400_GRAD0_opsz48.png" id="home">
                    <p1>Home</p1>
                </a>
                <a href="./add-teacher.php">
                    <img src="./img/person_add_FILL0_wght400_GRAD0_opsz48.png " id="teacher">
                    <p1>Add teacher</p1>
                </a>
                <a href="./add-student.php" class="active">
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

        <div class="main">
            <div class="title-bar">
                <h1 class="main-title">College Management System | Add Student</h1>
            </div>
            <div class="form">
                <div class="form-container">

                    <form action="#">
                        <div class="form-item">
                            <p class="title">Full Name</p>
                            <input type="text" class="input" id="fullname" required placeholder="Enter Your Full Name" autocomplete="off">
                            <!-- <label for="fullname" class="errorMsg">Full Name</label> -->
                        </div>

                        <div class="form-item">
                            <p class="title">Permanent Address</p>
                            <input type="text" class="input" id="fullname" required placeholder="Enter your full address" autocomplete="off">
                            <!-- <label for="fullname" class="errorMsg">Full Name</label> -->
                        </div>

                        <div class="form-item">
                            <p class="title">Gender</p>
                            <input type="radio" name="fullname" class="radio" required><span>Male</span>
                            <input type="radio" name="fullname" class="radio" required><span>Female</span>
                            <input type="radio" name="fullname" class="radio" required><span>Other</span>
                        </div>

                        <!-- <div class="form-item">
                            <p class="title">Name of Father/Mother</p>
                            <input type="text" class="input" id="fullname" required placeholder="Enter your father's or mother's name">
                            <label for="fullname" class="errorMsg">Full Name</label>
                        </div> -->

                        <div class="form-item">
                            <p class="title">Faculty</p>
                            <select name="" id="" class="input" required>
                                <option>Select Faculty</option>
                                <?php
                                $res = mysqli_query($conn, "Select faculty_name from faculty");
                                while ($data = mysqli_fetch_assoc($res)) {
                                    // $data = mysqli_fetch_assoc($res);
                                    echo '<option value="' . $data['faculty_name'] . '">' . $data['faculty_name'] . '</option>';
                                }
                                ?>
                                <!-- <option value="DIT">Diploam In Information Technology</option>
                                <option value="DCE">Diploam In Civil Engineering</option>
                                <option value="DEE">Diploam In Electrical Engineering</option>
                                <option value="DGE">Diploam In Geomatics Engineering</option>
                                <option value="DHM">Diploam In Hotel Management</option> -->
                            </select>
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

                        

                        <div class="form-item">
                            <div class="contact two-column">
                                <div class="email col-1">
                                    <p class="title">Email</p>
                                    <input type="email" class="input" id="fullname" required placeholder="example@gmail.com" autocomplete="off">
                                    <!-- <label for="email" class="errorMsg">example@gmail.com</label> -->
                                </div>

                                <div class="phone col-2">
                                    <p class="title">Phone</p>
                                    <input type="tel" class="input" id="fullname" placeholder="Must be 10 digits" required autocomplete="off">
                                    <!-- <label for="email" class="errorMsg">98XXXXXXXX</label> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-item two-column">
                            <div class="col-1">
                                <p class="title">Date Of Birth (in A.D)</p>
                                <input type="date" class="input" id="fullname" required>
                            </div>

                            <div class="col-2">
                                <p class="title">Year Of Joining</p>
                                <!-- <input type="date" class="input" id="fullname" required> -->

                                <select name="year_of_joining" id="" class="input">
                                    <option value="2079">2079</option>
                                    <option value="2078">2078</option>
                                    <option value="2077">2077</option>
                                    <option value="2076">2076</option>
                                    <option value="2075">2075</option>
                                    <option value="2074">2074</option>
                                    <option value="2073">2073</option>
                                    <option value="2072">2072</option>

                                </select>
                            </div>

                            <!-- <label for="fullname" class="errorMsg">Enter your Birthdate</label> -->
                        </div>

                        

                        <div class="form-item two-column">
                            <input type="reset" value="Reset" class="input col-1">
                            <input type="submit" value="Submit" class="input col-2">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>