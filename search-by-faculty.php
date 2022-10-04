<?php
include "./php/header.php";
// echo $_SERVER['HTTP_REFERER']; 

if (!isset($_POST['submitBtn']) && ($_SESSION['isDeleted'] != "yes") && $_SESSION['isUpdated'] != "yes") {
    header(URL . "php/view-student.php");
} else {
?>

    <div class="container">
        <div class="main" style="width: 100%;">

            <div class="alertBox <?php if ($_SESSION['isDeleted'] == "yes") echo "deleted" ?>" <?php if ((isset($_SESSION['isDeleted']) && ($_SESSION['isDeleted'] == "yes")) || $_SESSION['isUpdated'] == "yes") {
                                                                                                    echo 'style="display:flex"';
                                                                                                } ?>>
                <strong>
                    <?php
                    if ($_SESSION['isDeleted'] == "yes") {
                        echo "Student Deleted Successfully!!!";
                        // $_SESSION['isDeleted'] = "no";
                        unset($_SESSION['isDeleted']);
                    }
                    if ($_SESSION['isUpdated'] == "yes") {
                        echo "Student Updated Successfully!!!";
                        // $_SESSION['isUpdated'] = "no";
                        unset($_SESSION['isUpdated']);
                    }
                    ?>
                </strong>
                <button type="button" class="btn-close"></button>
            </div>

            <div class="ShowingResultTitle">
                <a href="<?php echo URL ?>php/view-student.php"><button class="backBtn"></button></a>
                <?php

                $faculty_id = $_POST['std_faculty'];
                $batch = $_POST['batch'];

                if ($faculty_id == "" && $batch == "") {
                    $faculty_id = $_SESSION['f_id'];
                    $batch = $_SESSION['batch'];
                } else {
                    $_SESSION['f_id'] = $faculty_id;
                    $_SESSION['batch'] = $batch;
                }

                $sql_1 = "SELECT * FROM faculty WHERE faculty_id = $faculty_id";
                $res_1 = mysqli_query($conn, $sql_1);

                $sql_2 = "SELECT * FROM batch WHERE batch_id = $batch";
                $res_2 = mysqli_query($conn, $sql_2);
                ?>

                Showing results for "<?php echo (mysqli_fetch_assoc($res_1))['faculty_short'] . " " .  (mysqli_fetch_assoc($res_2))['batch_name'] . " Batch";  ?>".
            </div>

            <div class="table" style="height: calc(100vh - 154px);">
                <table>
                    <thead>
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
                    </thead>


                    <?php

                    $sql = "SELECT * FROM students
                    INNER JOIN faculty on students.faculty_id = faculty.faculty_id
                    LEFT JOIN batch on students.yoj = batch.batch_id
                    WHERE students.faculty_id = $faculty_id AND students.yoj = $batch";


                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        $i = 1;
                        while ($data = mysqli_fetch_assoc($res)) {
                    ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $data['std_id'] ?></td>
                                <td><?php echo $data['std_name'] ?></td>
                                <td><?php echo $data['address'] ?></td>
                                <td class="center"><?php echo $data['gender'] ?></td>
                                <td class="center"><?php echo $data['faculty_short'] ?></td>
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
                                            <input type="submit" value="Delete" class="deleteBtn" name="deleteBtn" onClick="return confirm('Are you sure want to delete?')">
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
<?php
}
?>

<script>
    document.title = document.querySelector(".ShowingResultTitle").innerText;
</script>
<script src="<?php echo URL ?>js/alertBox.js"></script>