<?php
include "./php/header.php";
include "./php/conn.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Student</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="./view-student.css">

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
                <a href="./add-student.php">
                    <img src="./img/person_add_FILL0_wght400_GRAD0_opsz48.png " id="student">
                    <p1>Add student</p1>
                </a>
                <a href="./view-teacher.php">
                    <img src="./img/pageview_FILL0_wght400_GRAD0_opsz48.png" id="viewteacher">
                    <p1>View teacher</p1>
                </a>
                <a href="./view-student.php" class="active">
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
                <h1 class="main-title">College Management System | View Student</h1>
            </div>
     
            <div class="table">
                <table>
                    <thead>
                        <!-- <tr> -->
                            <th>SN.</th>
                            <th class="std_id">Student ID</th>
                            <th>Name</th>
                            <th>Adress</th>
                            <th>Gender</th>
                            <th>Faculty</th>
                            <th>Parent's</th>
                            <th>Phone</th>
                            <th class="dob-field">Date Of Birth</th>
                            <th>Year Of Joining</th>
                            <th>Action</th>
                        <!-- </tr> -->
                    </thead>


                    <?php
                    
                    // echo "mkm";
                    // $sql = "SELECT s.std_name, s.address, s.gender,  s.phone, s.dob, f.faculty_short, b.batch_name
                    //         from students s
                    //         INNER JOIN faculty f on s.faculty_id = f.faculty_id
                    //         INNER JOIN batch b on s.yoj = b.batch_id ";
                            
                    $sql = "SELECT * 
                            FROM students 
                            INNER JOIN faculty  ON students.faculty_id = faculty.faculty_id left join batch on students.yoj = batch.batch_id
                            ";

                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        // echo "data found";
                        $i = 1;
                        while ($data = mysqli_fetch_assoc($res)) {
                    ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td>DIT-2079-0120</td>
                                <td><?php echo $data['std_name'] ?></td>
                                <td><?php echo $data['address'] ?></td>
                                <td><?php echo $data['gender'] ?></td>
                                <td><?php echo $data['faculty_short'] ?></td>
                                <td>
                                    <?php 
                                    echo $data['parents_name'] 
                                    ?>
                                </td>
                                <td><?php echo $data['phone'] ?></td>
                                <td><?php echo $data['dob'] ?></td>
                                <td><?php echo $data['batch_name'] ?></td>
                                <td>
                                    <span class="button">
                                        <form action="edit.php" method="post">
                                            <!-- <a href="#" class="editBtn">Edit</a> -->
                                            <input type="submit" class="editBtn" value="Edit" name="edit">
                                            <!-- <input type="submit" value=""> -->
                                        </form>

                                        <!-- <a href="#" class="deleteBtn">Delete</a> -->

                                        <form action="delete.php" method="post">
                                            <input type="text" name="delete_id" value="<?php echo $data['std_id'] ?>" style="visibility: hidden; display:none;">
                                            <input type="submit" value="Delete" class="deleteBtn" name="deleteBtn" onClick="return confirm('Are you sure?')">
                                        </form>
                                    </span>
                                </td>
                            </tr>
                    <?php }
                    } else {?>
                    <tr>
                        <td colspan="9">No Record Found.</td>
                    </tr>
                        <!-- echo "no record found"; -->
                    <?php } ?>

                    

                </table>
            </div>
        </div>
</body>

</html>