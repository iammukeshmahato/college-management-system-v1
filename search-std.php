<?php
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student</title>
</head>

<body>
    <div class="find">
        <form action="view-individual-std.php" method="post">
            Type to search
            <input type="text" name="userInput" id="">
            <input type="submit" name="search" value="search">
        </form>
    </div>
    <br>
    <div class="group">
        <div class="faculty col-1">
            <form action="view-student-by-group.php" method="post">
                <select name="std_faculty" id="" class="input" required>
                    <option>Select Faculty</option>
                    <?php
                    $res = mysqli_query($conn, "Select * from faculty");
                    while ($data = mysqli_fetch_assoc($res)) {
                        // $data = mysqli_fetch_assoc($res);
                        echo '<option value="' . $data['faculty_id'] . '">' . $data['faculty_name'] . '</option>';
                    }
                    ?>

                </select>

                <select name="std_yoj" class="input" required>
                    <?php
                    $res = mysqli_query($conn, "Select * from batch order by batch_id desc");
                    while ($data = mysqli_fetch_assoc($res)) {
                        // $data = mysqli_fetch_assoc($res);
                        echo '<option value="' . $data['batch_id'] . '">' . $data['batch_name'] . '</option>';
                    }
                    ?>

                </select>
                <input type="submit" name="search" value="search">
            </form>
        </div>

    </div>
</body>

</html>