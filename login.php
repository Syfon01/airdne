<?php
session_start();
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <title>Sign Up form</title>
  <link rel="stylesheet" type="text/css" href="css/signup.css">
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
  <br>
  <br>
  
  <?php
  /* Process login form */
  $con = mysqli_connect('localhost', 'root', '6yt5^YT%') or die("Cannot connect to localhost");
mysqli_select_db($con, 'classroom') or die("Cannot Select Database");
if (isset($_POST['submitLog'])) {
    // Get form data and store in variable
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // The password was encrypted by salting the inputed password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

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
            if(!password_verify($password, $passwordHash)){
                header('Location: index.php?err=danger &msg=Wrong password');
                exit();
			} else {
                session_start();

				$id = $_SESSION['uid'];
				$email = $_SESSION['email'];

				header('location: createclass.php?err=success &msg=You logged in successfully');
            }
        }
    }
} else {
    header('Location: index.php?err=warning &msg=Try again');
    exit();
}


?>

  <form action="" method="post">
    <!-- <div class="imgcontainer">
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
    <div class="wrapper ">
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
    <footer>
      <img src="https://res.cloudinary.com/enema/image/upload/v1569508194/screencapture-file-C-Users-pc-Desktop-TEAM-ARIADNE-HOMEPAGE-homepage-html-2019-09-25-21_51_33_vqmtxf.png" width="100%">
    </footer>
  </section>
</body>

</html>
