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
<?php
  /* Process login form */
  $con = mysqli_connect('localhost', 'root', '6yt5^YT%') or die("Cannot connect to localhost");
mysqli_select_db($con, 'classroom') or die("Cannot Select Database");
if (isset($_POST['submitLog'])) {
    // Get form data and store in variable
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    // Validate user input
    if (empty($email) || empty($password)) { // Check if the form is empty
        header('Location: index.php?err=warning &msg=Empty-field');
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Validate user email
        header('Location: index.php?err=danger &msg=Invalid-email');
        exit();
    } else {
        // Log in the user if no error
        $query = "SELECT * FROM users WHERE email = '$email'";
        $results = mysqli_query($con, $query);
        $row = mysqli_num_rows($results);

        // Check if user is registered
       if (!$row == 1) {
            header('Location: index.php?err=danger &msg=User not found');
            exit();
        } else {
            $fetch = mysqli_fetch_array($results);
            $passwordHash = $fetch['password'];
            $id = $fetch['id'];
            $email = $fetch['email'];
            if(!password_verify($password, $passwordHash)){
                header('Location: index.php?err=danger &msg=Wrong password');
                exit();
			} else {
                session_start();

				$_SESSION['uid'] = $id;
				$_SESSION['email'] = $email;

				header('location: createclass.php?err=success &msg=You logged in successfully');
            }
        }
    }
} else {
    header('Location: index.php?err=warning &msg=Try again');
    exit();
}


?>
  <br>
  <br>
  <br>

  <br>
  <br>
  
  



  <form action="" method="post" class="col-md-5 col-sm-12 ml-auto bg-white py-4">
    <!-- <div class=" imgcontainer">
    <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" alt="Avatar" class="avatar" height="100" width="50">
    </div> -->
    <div class="login_successful">
    <?php if(isset($_GET['err'])) { ?>
  <div class="alert alert-dismissable alert-<?php echo $_GET['err']; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $_GET['msg']; ?></p>
  </div>
<?php } ?> 
    </div>
    <div class=" ">
      <form class="form-signin ">
        <form action="" method="post">
          <div class="imgcontainer">
            <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" style="width: 110px;" alt="logo">
            </a>
          </div>
          <h1 class="form-signin-heading ">Welcome</h1>
          <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
          <input type="password" class="form-control" name="password" placeholder="Password" required="" />
          <label class="checkbox">
            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
          </label>
          <button type="button" name="submitLog" class="btn btn-warning">Login</button>
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
