<header>
<div class="header">
    
    <div class="topnav" id="myTopnav">
    <div class="logo">
    <a href="index.php"><img
        src="https://res.cloudinary.com/enema/image/upload/v1569433441/Ariadne_Class_pnlixb.png"
        style="width: 110px;" alt="logo">
    </a>
    </div>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()"><img src="https://res.cloudinary.com/oyinka/image/upload/v1570139235/ham_z57pdv.png" style="width: 50px; color: black;">
        </a>
<?php
if (isset($_SESSION['login_success'])) {
echo <<<_END
        <a href="Index.php">Home</a>
        <a href="createclass.php">Create Class</a>
        <a href="chooseCourse.html">Choose Course(s)</a>
        <a href="contactus.php">Contact Us</a>
_END;
} else {
echo <<<_END
        <a href="Index.php">Home</a>
        <a href="sign-up.php">Create An Account</a>
        <a href="login.php">Login</a>
        <a href="chooseCourse.html">Choose Course(s)</a>
        <a href="contactus.php">Contact Us</a>
_END;
}
?>
  </div>
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
