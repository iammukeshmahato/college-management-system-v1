<?php
  session_start(); 
  if(isset($_SESSION['logged_user_name'])){
    header("location: ./php/home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login form</title>
  <link rel="stylesheet" href="./css/login-style.css">
</head>

<body>
  <header>
    <h1 class="heading">Nepal Banepa Polytechnic Institute</h1>
  </header>
  <div id="main">
    <img src="./img/wave.png" alt="" class="first">
    <img src="./img/bg.svg" alt="" class="second">
  </div>

  <div class="container">
    <div class="login-box">
      <div class="logo">
        <div class="errorText <?php if (isset($_SESSION['msg'])) {
              echo "showErrorText";
              // session_unset();
            }?>">
          <?php
            if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              session_unset();
            }
            //  else {
            //   echo "Please Login to continue!!!";
            // }
          ?>
        </div>
        <img src="./img/avatar.svg" width="80 px" height="80px" />

        <h2>WELCOME</h2>

        <form method="post" action="./php/login.php" id="login-form">
          <div class="user-box">
            <img src="./img/person.png" id="user">
            <input type="text" name="Username" required class="username"/>
            <label>Username</label>
          </div>

          <div class="user-box">
            <img src="./img/lock.png" id="pwd">
            <input type="password" name="Password" required class="password" id="password"/>
            <label>Password</label>
            <img src="./img/hide.png" id="ShowHideToggle">
          </div>

          <div class="button"><input type="submit" value="login" name="submit"></div>
        </form>
      </div>

    </div>
  </div>

  <script src="./js/showHideToggle.js"></script>
</body>

</html>