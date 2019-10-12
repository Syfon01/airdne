<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ariadne Class</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/topnav.css">

</head>

<body>
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

  <div class="container">
    <p>
      <h3>Learn<br>Anywhere<br>Anyday</h3>
    </p>
  </div>
  <div>
    <p>
      <h4>Get Started as a ...</h4>
    </p>
    <div>
      <p>
        <h2><a href="sign-up.php">Teacher</a>
          <a href="sign-up.php">Student</a></h2>
      </p>
    </div>
    <div>
      <footer class="pt-3">
        <p>Copyright © 2019 All rights reserved | Team Ariadne</p>
      </footer>


    </div>
</body>


</html>