<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <title>Sign Up form</title>
  <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<header>
<div class="header">

      <?php
  include "header.php";?>
 
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
<form action="" method="post">
  <div class="imgcontainer">
    <img src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png" alt="Avatar" class="avatar" height="100" width="50">
  </div>
    <div class="login_successful">
        <?php
            if(isset($_SESSION['login_success'])){
                 echo $_SESSION['login_success']."</br>";
                 unset($_SESSION['login_success']);
             }
        ?>
    </div>
  <div class="container">
<form action="" method="post">
          <input type="text" name="username" autocomplete="off" class="box"/><br /><br />
          <input type="password" name="password" autocomplete="off" class="box" /><br/><br />
          <input type="submit" name='login' value="Login" class='submit'/><br />
        </form>
  </div>

  <div class="container" style="background-color:#f1f1f1">

  </div>
</form>
<section>
  <footer>
    <img src="https://res.cloudinary.com/enema/image/upload/v1569508194/screencapture-file-C-Users-pc-Desktop-TEAM-ARIADNE-HOMEPAGE-homepage-html-2019-09-25-21_51_33_vqmtxf.png" width="100%">
  </footer>
</section>
</body>
</html>
