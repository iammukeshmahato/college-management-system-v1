<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Gender</th>
        <th scope="col">Faculty</th>
        <th scope="col">email</th>
        <th scope="col">Phone</th>
        <th scope="col">dob</th>
        <th scope="col">yoj</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "./conn.php";
      $sql = "SELECT s.std_name, s.address, s.gender, s.email, s.phone, s.dob, f.faculty_short, b.batch_name
      from students s
      INNER JOIN faculty f on s.faculty_id = f.faculty_id
      INNER JOIN batch b on s.yoj = b.batch_id
      ";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        // echo "data found";
        while ($data = mysqli_fetch_assoc($res)) {
      ?>
          <tr>
            <td>1</td>
            <td><?php echo $data['std_name'] ?></td>
            <td><?php echo $data['address'] ?></td>
            <td><?php echo $data['gender'] ?></td>
            <td><?php echo $data['faculty_short'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['phone'] ?></td>
            <td><?php echo $data['dob'] ?></td>
            <td><?php echo $data['batch_name'] ?></td>
            <td>
              <button>Edit</button>
              <button>Delete</button>
            </td>
          </tr>
      <?php }
      }else{
        echo "no record found";
      } ?>
    </tbody>
  </table>
</body>

</html>