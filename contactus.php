<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Contact form</title>
	<link rel="stylesheet" type="text/css" href="css/contactus.css">
</head>
<header>
<div class="header">

<?php 
include "header.php" ;?> 
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
<body onload="init();">
  <div>
  	<div class="formContent">
        <form  class="form" action="#" method="post" id="form">
            <h1>Contact Us</h1>
            <label for="">Full Name</label>
            <span id="ErrorName" style="color: red; margin-left: 15px;"> </span>                
            <input type="text" name="name" id="name" placeholder="Your name" required="required" minlength="4"><br>
            <label for="">Email</label>
            <span id="ErrorEmail" style="color: red; margin-left: 15px;"> </span>               
            <input type="text" name="email" id="emailaddress" placeholder="Email address" required="required"><br>
            <span id="ErrorSubject" style="color: red; margin-left: 15px;"> </span>             
            <textarea name="subject" id="subject" placeholder="Leave a message..." minlength="20" style="height: 350px" required="required"></textarea><br>
            <input type="submit" value="Submit" id="submit">
        </form>
    </div>
    <footer>
        <p>Copyright © 2019 All rights reserved | Team Ariadne</p>
    </footer>
    <script type="text/javascript">
        //With init() addEventListener can call each variables easily. 
        function init(){
            var name = document.getElementById("name");
            var emailaddress = document.getElementById("emailaddress");
            var subject = document.getElementById("subject");
            var form = document.getElementById("form");
            name.addEventListener("blur", checkName);                   
            emailaddress.addEventListener("keyup", checkEmail);                 
            form.addEventListener("submit", validateForm);  
        }
        //To check and validate the value entered.
        function checkName(){
            text = document.getElementById("name");
            if (text.value.length < 4 ) 
            {
                document.getElementById("ErrorName").innerHTML = "Name must be more than 4 char";
                text.focus();   //focus() makes sure inputs entered is correct.
                return false;
            }else
            {
                document.getElementById("ErrorName").innerHTML = "";
                return true
            }
        }

        function checkEmail(){
            text = document.getElementById("emailaddress");
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //regex - for email validation
            if (!re.test(String(text.value).toLowerCase())) 
            {
                document.getElementById("ErrorEmail").innerHTML = "Enter a valid mail";
                text.focus(); //focus() makes sure inputs entered is correct.               
                return false;
            }else
            {
                document.getElementById("ErrorEmail").innerHTML = "";
                return true
            }
        }
        // submit form 
        function validateForm(){
            if (checkName() == false) { return false;}
            if (checkEmail() == false) { return false;}
            alert('Your message was sent succesfully. We respond as soon as possible...');
            return true;
        }
    </script>
</body>
</html>