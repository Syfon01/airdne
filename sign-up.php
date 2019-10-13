
<?php
session_start();
$con = mysqli_connect('localhost', 'root', '6yt5^YT%') or die("Cannot connect to localhost");
mysqli_select_db($con, 'classroom') or die("Cannot Select Database");
//require 'includes/config.php';
// Function to sanitize user input
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//Function to set error message if user input is empty
function display_input_error(&$input, $session_name, $error_message)
{
  $input = trim($input);
  if ((isset($input) === true) && ($input === '')) {
    $_SESSION[$session_name] = $error_message;
    return 1;
  } else {
    $input = test_input($input);
    return 0;
  }
}
$fullname = $username = $email = $password = $cpassword = '';
$errors = $empty_email_flag = 0;
if (isset($_POST['register'])) {
  // Extract and store form data
  $_SESSION['fullname'] = $fullname = $_POST['fullname'];
  $_SESSION['username'] = $username = $_POST['username'];
  $_SESSION['email'] = $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['password_confirm'];
  $errors += display_input_error($fullname, 'empty_fullname', '-Enter name', $errors);
  $errors += display_input_error($username, 'empty_username', '-Enter username', $errors);
  //Set error message if email field is empty
  if (empty($email)) {
    $_SESSION['empty_email'] = "-Enter your email";
    $empty_email_flag = 1;
    $errors += 1;
  } else {
    $email = test_input($email);
    $empty_email_flag = 0;
  }
  //Validate email format
  if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && $empty_email_flag == 0) {
    $_SESSION['incorrect_email'] = "-Invalid email format";
    $errors += 1;
  }
  // Set error message if password field is empty
  $password_length = strlen($password);
  if (empty($password)) {
    $_SESSION['blank_password'] = "-Enter password";
    $errors += 1;
  } else if ($password_length < 8) {
    $_SESSION['short_password'] = "-Password shouldn't be less than 8 characters";
    $errors += 1;
  } else if ($password_length > 50) {
    $_SESSION['long_password'] = "-Password is too long";
    $errors += 1;
  } else if (!preg_match("#[0-9]+#", $password)) {
    $_SESSION['invalid_password'] = "-Password must contain at least one number,capital letter and lowercase letter";
    $errors += 1;
  } else if (!preg_match("#[A-Z]+#", $password)) {
    $_SESSION['invalid_password'] = "-Password must contain at least one number,capital letter and lowercase letter";
    $errors += 1;
  } else if (!preg_match("#[a-z]+#", $password)) {
    $_SESSION['invalid_password'] = "-Password must contain at least one number,capital letter and lowercase letter";
    $errors += 1;
  } else if ($password !== $cpassword) {
    $_SESSION['password_mismatch'] = "-Passwords do not match";
    $errors += 1;
  }
  // If there are no errors, check if email is already linked to an account, if there are errors redirect back to sign up page
  if ($errors == 0) {
    $check_email = mysqli_prepare($con, "SELECT * from users WHERE email = ?");
    mysqli_stmt_bind_param($check_email, 's', $email);
    mysqli_stmt_execute($check_email);
    mysqli_stmt_store_result($check_email);
    $email_row = mysqli_stmt_num_rows($check_email);
    mysqli_stmt_close($check_email);
    /* If email already exists, redirect back to sign up page else, hash password and store all user input */
    if ($email_row > 0) {
      $_SESSION['emailerr'] = "-A user with this email already exists";
      if ($con) {
        mysqli_close($con);
      }
      header('location: sign-up.php');
      exit();
    } else {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $insert = mysqli_prepare($con, "INSERT INTO users (`fullname`, `username`, `email`, `password`) VALUES (?,?,?,?)");
      mysqli_stmt_bind_param($insert, 'ssss', $fullname, $username, $email, $password);
      mysqli_stmt_execute($insert);
      mysqli_stmt_close($insert);
      $_SESSION['fullname'] = $fullname;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      $_SESSION['login_success'] = 'Signup successul, you may now login !';
      if ($con) {
        mysqli_close($con);
      }
      header('Location: login.php');
      exit();
    }
  } else {
    if ($con) {
      mysqli_close($con);
    }
    header('Location: sign-up.php');
    exit();
  }
}
if ($con) {
  mysqli_close($con);
}
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
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<header>
  <div class="header">

    <?php
    include "header.php"; ?>


</header>

<body>
  <div class="container">
  <div class="row">
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
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-12 p-4 p-md-5 order-md-last bg-light">

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
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <button type="submit" name='register' class="btn btn-primary py-3 px-5">Sign Up</button>
              </div>
              <b>
            <p> <a href="login.php">Already have an Account? Signin </a></p>
          </b>
            </form>
					</div>
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
