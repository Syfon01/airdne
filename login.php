<?php
session_start();
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <title>Sign Up form</title>
  <link rel="stylesheet" type="text/css" href="css/topnav.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/signup.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<header>
  <div class="header">

    <?php
    include "header.php"; ?>

  </div>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>
</header>

<body>
  <br>
  <br>
  <br>



  <form action="" method="post" class="col-md-5 col-sm-12 ml-auto bg-white py-4">
    <!-- <div class=" imgcontainer">
    <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" alt="Avatar" class="avatar" height="100" width="50">
    </div> -->
    <div class="login_successful">
      <?php
      if (isset($_SESSION['login_success'])) {
        echo $_SESSION['login_success'] . "</br>";
        unset($_SESSION['login_success']);
      }
      ?>
    </div>
    <div class=" ">
      <form class="form-signin ">
        <form action="action_page.php" method="post">
          <div class="imgcontainer">
            <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" style="width: 110px;" alt="logo">
            </a>
          </div>
          <h1 class="form-signin-heading ">Welcome</h1>
          <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
          <input type="password" class="form-control" name="password" placeholder="Password" required="" />
          <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
          </label>
          <button type="button" class="btn btn-warning">Login</button>
          <b>
            <p> <a href="sign-up.php">Not a Member? Signup </a></p>
          </b>
        </form>
    </div>

  </form>
  <section>
    <footer class="mt-3 text-center pt-3">
      <!--<img src="https://res.cloudinary.com/enema/image/upload/v1569508194/screencapture-file-C-Users-pc-Desktop-TEAM-ARIADNE-HOMEPAGE-homepage-html-2019-09-25-21_51_33_vqmtxf.png" width="100%">-->
      <p>Copyright &copy; 2019 All Rights Reserved - Team Ariadne</p>
    </footer>
  </section>
</body>

</html>