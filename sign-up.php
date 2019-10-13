
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
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<header>
  <div class="header">

    <?php
    include "header.php"; ?>


</header>

<body>
  <div class="container row ml-0">
    <div class="col-md-7 px-5 col-sm-12">
      <h2>Welcome to Ariadne Class, <br>Enrol today and enjoy the definition of online education.</h2>
    </div>

    <form action="" method="post" class='col-md-5 col-sm-12 ml-auto bg-white py-4'>
      <div class="imgcontaine">
        <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" alt="Avatar" class="avatar img-fluid" height="100" width="50">
      </div>
      <div class="signup_errors">
        <?php
        function msg_toggle($sess_name)
        {
          if (isset($_SESSION[$sess_name])) {
            echo $_SESSION[$sess_name];
            unset($_SESSION[$sess_name]);
            return 1;
          }
        }
        if (msg_toggle('empty_fullname')) echo "</br>";
        if (msg_toggle('empty_username')) echo "</br>";
        if (msg_toggle('empty_email')) echo "</br>";
        if (msg_toggle('incorrect_email')) echo "</br>";
        if (msg_toggle('blank_password')) echo "</br>";
        if (msg_toggle('short_password')) echo "</br>";
        if (msg_toggle('long_password')) echo "</br>";
        if (msg_toggle('invalid_password')) echo "</br>";
        if (msg_toggle('password_mismatch')) echo "</br>";
        if (msg_toggle('emailerr')) echo "</br>";
        ?>
      </div>
      	
			<div class="container">
				<div class="">
					<div class="">
						<form action="#">
              <div class="form-group">
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php msg_toggle('fullname') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php msg_toggle('username') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php msg_toggle('email') ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <button type="submit" name='register' class="btn btn-primary py-3 px-5">Sign Up</button>
              </div>

              <b>
            <p> <a href="login.php">Already Have an Account? Signin </a></p>
          </b>
              
            </form>
					</div>
				</div>
			</div>
		
     
  <section>
    <div class="footer">
      <?php
      include "footer.php"; ?>
    </div>
  </section>
</body>

</html>
