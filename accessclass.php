

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ariadne Class</title>
  <link rel="stylesheet" href="css/accessclass.css">
</head>

<body>
  <div class="header">
    <?php 
include "header.php" ;?>
    <div class="topnav" id="myTopnav">
        <a href="logout.php">Log Out</a>
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

<div class="container">
    <div class="header">
        <form>
            <h1>Search for Class Items</h1>
            <div class="form-box"></div>
            <input type="text" class="searche-field items" placeholder="Courses, Tutorials..">
            <button class="search-btn" type="button">Search</button>
                <p>EXPLORE OUR AVAILABLE COURSES</p>
                <button class="button">Web Development</button>
                <button class="button">Data Science</button>
                <button class="button">Artificial Intelligence</button>
                <button class="button">Machine Learning</button>
                <button class="button">Digital Marketing</button>

        </form>
    </div>
    <br>
</div>
<div>
        <footer>
          <p>Copyright © 2019 All rights reserved | Team Ariadne</p>
        </footer>
    </div>
</body>
</html>
