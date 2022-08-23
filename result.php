<?php
include "./php/header.php";
// include "./php/conn.php";
// session_start();
// echo "this is view-individual-std.php file";

if (!isset($_POST['submitBtn']) && ($_SESSION['isDeleted'] != "yes") && $_SESSION['isUpdated'] != "yes") {
    header("location: " . URL . "php/view-student.php");
}

$userInput = $_POST['userInput'];
// echo "user input = ".$userInput;
if ($userInput == "") {
    $userInput = $_SESSION['$userInput'];
} else {
    $_SESSION['$userInput'] = $userInput;
}
// echo "session user input = ".$_SESSION['$userInput'];
// $userInput = "ccc";
// echo $userInput;

// print_r($_POST);

// $sql = "SELECT * FROM students WHERE 
//     std_name = $userInput OR parents_name = $userInput OR phone = $userInput OR dob = $userInput
//     ";

// $sql = "SELECT * FROM students
// inner join 
//  WHERE 
//     std_name = '$userInput' OR parents_name = '$userInput' OR phone = '$userInput' OR dob = '$userInput' ";
// $res = mysqli_query($conn, $sql);


?>

<div class="container">
    <div class="main" style="width: 100%;">

        <div class="alertBox<?php if ($_SESSION['isDeleted'] == "yes") echo "deleted"?>" <?php if ((isset($_SESSION['isDeleted']) && ($_SESSION['isDeleted'] == "yes")) || $_SESSION['isUpdated'] == "yes") {
                                                                                                echo 'style="display:flex"';
                                                                                                // $_SESSION['isDeleted'] = "no";
                                                                                                // $_SESSION['isUpdated'] = "no";
                                                                                            } ?>>
            <strong>
                <?php
                if ($_SESSION['isDeleted'] == "yes") {
                    echo "Student Deleted Successfully!!!";
                    $_SESSION['isDeleted'] = "no";
                }
                if ($_SESSION['isUpdated'] == "yes") {
                    echo "Student Updated Successfully!!!";
                    $_SESSION['isUpdated'] = "no";
                }
                ?>
            </strong>
            <button type="button" class="btn-close"></button>
        </div>

        <!-- <div class="alertBox deleted" <?php if (isset($_SESSION['isDeleted']) && ($_SESSION['isDeleted'] == "yes")) {
                                                echo 'style="display:flex"';
                                                $_SESSION['isDeleted'] = "no";
                                            } ?>>
            <strong>
                Student Deleted Successfully!!!
            </strong>
            <button type="button" class="btn-close"></button>
        </div> -->
        <div class="ShowingResultTitle">
        <a href="<?php echo URL ?>php/view-student.php"><button class="backBtn"></button></a>
            Showing results for "<?php echo $userInput ?>".
        </div>

        <div class="table" style="height: calc(100vh - 154px);">
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
                // $sql = "SELECT * 
                //     FROM students 
                //     INNER JOIN faculty  ON students.faculty_id = faculty.faculty_id left join batch on students.yoj = batch.batch_id
                //     -- where std_id = 100
                //     WHERE  std_name = '$userInput' OR parents_name = '$userInput' OR phone = '$userInput' OR dob = '$userInput'
                //     -- WHERE  std_name = '%$userInput%' OR parents_name = '%$userInput%' OR phone = '%$userInput%' OR dob = '$userInput'
                //     ";
                $sql = "SELECT * 
                    FROM students 
                    INNER JOIN faculty  ON students.faculty_id = faculty.faculty_id left join batch on students.yoj = batch.batch_id
                    -- where std_id = 100
                    WHERE std = '$userInput' OR std_name like '%$userInput%' OR parents_name like '%$userInput%' OR phone like '%$userInput%' OR dob = '$userInput'
                    -- WHERE  std_name = '%$userInput%' OR parents_name = '%$userInput%' OR phone = '%$userInput%' OR dob = '$userInput'
                    ";

                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    // echo "data found";
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($res)) {
                ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['std'] ?></td>
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
                            <td class="center"><?php echo $data['dob'] ?></td>
                            <td class="center"><?php echo $data['batch_name'] ?></td>
                            <td>
                                <span class="button">
                                    <form action="<?php echo URL ?>php/edit-student.php" method="post">
                                        <input type="text" name="edit_id" value="<?php echo $data['std_id'] ?>" style="visibility: hidden; display:none;">
                                        <input type="submit" class="editBtn" value="Edit" name="edit">
                                    </form>

                                    <!-- <a href="<?php echo URL . "php/edit.php?edit_id=" . md5($data['std_id']) ?>" class="editBtn">Edit</a> -->

                                    <!-- <a href="#" class="deleteBtn">Delete</a> -->

                                    <form action="<?php echo URL . 'php/delete.php' ?>" method="post">
                                        <input type="text" name="delete_id" value="<?php echo $data['std_id'] ?>" style="visibility: hidden; display:none;">
                                        <input type="submit" value="Delete" class="deleteBtn" name="deleteBtn" onClick="return confirm('Are you sure?')">
                                    </form>

                                    <!-- <a href="<?php echo URL . "php/delete.php?delete_id=" . md5($data['std_id']) ?>" class="deleteBtn">Delete</a> -->
                                </span>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="11">No Record Found.</td>
                    </tr>
                <?php } ?>



            </table>
        </div>
    </div>
</div>
<script src="<?php echo URL ?>js/alertBox.js"></script>