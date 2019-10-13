<?php
session_start();
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<head>
  <title>Ariadne Class</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<header>
  <div class="header">

    <?php
    include "header.php"; ?>


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
    <div class="footer">
      <?php
      include "footer.php"; ?>
    </div>
  </section>
</body>

</html>