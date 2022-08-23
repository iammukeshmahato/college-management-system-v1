<?php
include "./php/header.php";

if (!isset($_POST['submitBtn']) && ($_SESSION['isDeleted'] != "yes") && $_SESSION['isUpdated'] != "yes") {
    header("location: " . URL . "php/view-student.php");
}

$userInput = $_POST['userInput'];
if ($userInput == "") {
    $userInput = $_SESSION['$userInput'];
} else {
    $_SESSION['$userInput'] = $userInput;
}
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
            Showing results for "<?php echo $userInput ?>".
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
                $sql = "SELECT * 
                    FROM students 
                    INNER JOIN faculty  ON students.faculty_id = faculty.faculty_id left join batch on students.yoj = batch.batch_id
                    WHERE std_id = '$userInput' OR std_name like '%$userInput%' OR parents_name like '%$userInput%' OR phone like '%$userInput%' OR dob = '$userInput'
                    ";

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

<script>
    document.title = `Showing results for "<?php echo $userInput ?>"`;
</script>
<script src="<?php echo URL ?>js/alertBox.js"></script>