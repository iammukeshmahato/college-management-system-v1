<?php
include "./header.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Teacher</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mystyle.css">
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
                <a href="<?php echo URL ?>php/view-teacher.php" class="active">
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
                <h1 class="main-title">College Management System | View Teacher</h1>
            </div>

            <!-- <div class="alertBox <?php if ($_SESSION['isDeleted'] == "yes") echo "deleted" ?>" <?php if ((isset($_SESSION['isDeleted']) && ($_SESSION['isDeleted'] == "yes")) || $_SESSION['isUpdated'] == "yes") {
                                                                                                        echo 'style="display:flex"';
                                                                                                    } ?>>
                <strong>
                    <?php
                    // if ($_SESSION['isDeleted'] == "yes") {
                    //     echo "Teacher Deleted Successfully!!!";
                    //     $_SESSION['isDeleted'] = "no";
                    //     unset($_SESSION['isDeleted']);
                    // }
                    // if ($_SESSION['isUpdated'] == "yes") {
                    //     echo "Teacher Updated Successfully!!!";
                    //     $_SESSION['isUpdated'] = "no";
                    //     unset($_SESSION['isUpdated']);
                    // }
                    ?>
                </strong>
                <button type="button" class="btn-close"></button>
            </div> -->

            <div class="alertBox <?php if (isset($_SESSION['isDeleted'])) echo "deleted" ?>" <?php if ((isset($_SESSION['isDeleted']) && ($_SESSION['isDeleted'] == "yes")) || $_SESSION['isUpdated'] == "yes") {
                                                                                                    echo 'style="display:flex"';
                                                                                                } ?>>
                <strong>
                    <?php
                    if (isset($_SESSION['isDeleted'])) {
                        echo "Teacher Deleted Successfully!!!";
                        // $_SESSION['isDeleted'] = "no";
                        unset($_SESSION['isDeleted']);
                    }
                    if (isset($_SESSION['isUpdated'])) {
                        echo "Teacher Updated Successfully!!!";
                        // $_SESSION['isUpdated'] = "no";
                        unset($_SESSION['isUpdated']);
                    }
                    ?>
                </strong>
                <button type="button" class="btn-close"></button>
            </div>

            <!-- showing result div for post method -->
            <!-- <div class="ShowingResultTitle" style="display: <?php if (($_POST['searchText'] == "") || $_POST['searchText'] == " ") echo "none;" ?>">
                <a href="<?php echo URL ?>php/view-teacher.php"><button class="backBtn"></button></a>
                Showing results for "<?php echo $_POST['searchText'] ?>".
            </div> -->

            <!-- showing result div for get method -->
            <div class="ShowingResultTitle" style="display: <?php if (($_GET['searchText'] == "") || $_GET['searchText'] == " ") echo "none;" ?>">
                <a href="<?php echo URL ?>php/view-teacher.php"><button class="backBtn"></button></a>
                Showing results for "<?php echo $_GET['searchText'] ?>".
            </div>

            <!-- main search box -->
            <!-- <form method="post" id="SearchForm">

                <div class="searchBox">
                    <div class="sort">
                        <label for="sortBy">Sort By</label>
                        <select name="sortBy" id="sortBy" class="input">
                            <option value="name">Name Asc</option>
                            <option value="name">Name Desc</option>
                            <option value="name">Recently Added</option>
                        </select>
                    </div>
                    <input type="text" id="searchBox" class="input" name="searchText" value="" placeholder="Type to search" style="width: 12rem; font-size: 1rem; font-family:'Times New Roman', Times, serif;" autocomplete="off">
                    <Button type="submit" class="searchBtn" name="searchBtn" style="display: none;">Search</Button>
                </div>
            </form> -->

            <!-- trying get method -->
            <form method="get" id="SearchForm">
                <div class="searchBox">
                    <input type="text" id="searchBox" class="input" name="searchText" placeholder="Type to search" style="width: 12rem; font-size: 1rem; font-family:'Times New Roman', Times, serif;" autocomplete="off">
                </div>
            </form>

            <div class="table" style="height: calc(100vh - 160px);">
                <table>
                    <thead>
                        <th>SN.</th>
                        <th>Name</th>
                        <th>Adress</th>
                        <th>Gender</th>
                        <th>Qualification</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </thead>

                    <?php
                    // if (isset($_POST['searchBtn'])) {
                    if (isset($_GET['searchText'])) {
                        // $searchText = mysqli_escape_string($conn, $_POST['searchText']);
                        $searchText = mysqli_escape_string($conn, $_GET['searchText']);

                        $sql = "SELECT * FROM teachers WHERE t_name like '$searchText%'";
                        // $sql = "SELECT * FROM teachers WHERE t_name like '%$searchText%' ORDER BY t_name ASC";
                        // $_POST['searchText'] = " ";
                        $res = mysqli_query($conn, $sql);
                    } else {
                        $sql = "SELECT * FROM teachers";
                        // $sql = "SELECT * FROM teachers ORDER BY t_name ASC";
                        $res = mysqli_query($conn, $sql);
                    }
                    if (mysqli_num_rows($res) > 0) {
                        $sn = 1;
                        while ($data = mysqli_fetch_assoc($res)) { ?>

                            <tr>
                                <td><?php echo $sn ?></td>
                                <td><?php echo $data['t_name'] ?></td>
                                <td><?php echo $data['t_address'] ?></td>
                                <td><?php echo $data['t_gender'] ?></td>
                                <td><?php echo $data['t_qualification'] ?></td>
                                <td><?php echo $data['t_email'] ?></td>
                                <td><?php echo $data['t_contact'] ?></td>

                                <td>
                                    <span class="button">
                                        <form action="<?php echo URL ?>php/edit-teacher-form.php" method="post">
                                            <input type="text" name="edit_id" value="<?php echo $data['t_id'] ?>" style="visibility: hidden; display:none;">
                                            <input type="submit" class="editBtn" value="Edit" name="edit">
                                        </form>

                                        <form action="<?php echo URL ?>php/delete-teacher.php" method="post">
                                            <input type="text" name="delete_id" value="<?php echo $data['t_id'] ?>" style="visibility: hidden; display:none;">
                                            <input type="submit" value="Delete" class="deleteBtn" name="deleteBtn" onClick="return confirm('Are you sure want to delete?')">
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        <?php
                            $sn++;
                        }
                    } else { ?>
                        <tr>
                            <td colspan="8">No Record Found.</td>
                        </tr>
                    <?php }
                    ?>
                    <!--  -->
                    <!-- <tr>
                        <td>1</td>
                        <td>sanjeev kumar pandit</td>
                        <td>shambhunath-8, pokhariya</td>
                        <td>Male</td>
                        <td>bachelor in computer engineering</td>
                        <td>example@gmail.com</td>
                        <td>9811752180</td>

                        <td>
                            <span class="button">
                                <form action="edit.php" method="post">
                                    <input type="submit" class="editBtn" value="Edit" name="edit">
                                </form>

                                <form action="delete.php" method="post">
                                    <input type="text" name="delete_id" value="<?php echo $data['std_id'] ?>" style="visibility: hidden; display:none;">
                                    <input type="submit" value="Delete" class="deleteBtn" name="deleteBtn" onClick="return confirm('Are you sure?')">
                                </form>
                            </span>
                        </td>
                    </tr> -->

                </table>
            </div>
        </div>

        <script src="<?php echo URL ?>js/alertBox.js"></script>
</body>

</html>