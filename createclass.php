<?php
//require_once "includes/config.php";
$error = $msg = "";

$con=mysqli_connect('localhost','root','6yt5^YT%') or die("Cannot connect to localhost");
    mysqli_select_db($con,'classroom') or die("Cannot Select Database");
function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $var;
}

$query = "SELECT user_id, username, fullname FROM user";
$result = mysqli_query($con,$query);
$user = mysqli_fetch_assoc($result);

if ($result->num_rows > 0) {
    // output data of each row
    $username = $user['username'];
   /* while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }*/
} else {
    echo "0 results";
    $username = "";
}


if (isset($_POST['classname'])) {
    $name = sanitizeString($_POST['classname']);
    $name_length = strlen($name);
    $title = sanitizeString($_POST['title']);
    $title_length = strlen($title);
    $category = sanitizeString($_POST['category']);
    $level = sanitizeString($_POST['level']);
    $exercise = sanitizeString($_POST['exercise']);
    $quiz = sanitizeString($_POST['quiz']);
    $video = "";
    

    if ($name != "" && $title != "" && $category != "" && $level != "") {
        if ($name_length < 4) {
            $error = "Class name must be at least four characters";
        } elseif ($name_length > 100) {
            $error = "Class name can't be more than 100 characters";
        } elseif ($title_length < 4) {
            $error = "Class title must be at least four characters";
        } elseif ($title_length > 100) {
            $error = "Class title can't be more than 100 characters";
        } else {
            $sql = "INSERT INTO class (class_id, username, class_name, course_title, category, course_level, exercise, quiz, video)
            VALUES (NULL, '$username', '$name', '$title', '$category', '$level', '$exercise', '$quiz', '$video')";

            if (mysqli_query($con,$sql) === TRUE) {
                $msg = "New class created successfully";
                $last_id = mysqli_insert_id($con); //get id of the new class in the table
                $lname = $name . "-" . $username . "(" . $last_id . ")"; //video name

                $target_dir = "classvideos/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($fileType != "mp4" && $fileType != "avi" && $fileType != "mov" && $fileType != "webm" && $fileType != "3gp") {
                    echo "Sorry, only mp4, avi, mov, webm & 3gp files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                
            } else {
                $msg = "Class not created, try again later";
            }
        }
    } else {
        $error = "Please ensure Class Name, Course Title, Subjects and Level fields are not empty";
    }
}
if($con){
mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">

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
  <link rel="stylesheet" type="text/css" href="createclass.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css/topnav.css" /> -->

</head>

<body>

        <header>
            <div class="header">

                <?php
                include "header.php"; ?>
            </div>
            
        </header>
    <div class="container ">

        <form id="form" action="createclass.php" method="post" class="content col-md-8 mx-auto my-5 p-5 col-12 col-sm-12 " enctype="multipart/form-data">
            <h2>Create a class for your students</h2>
            <h4 id="subheader">Enter the details about your class, courses and grades</h4>

            <div>
                <div id="error"><?php echo $error.$msg; ?></div>
                <div class="form-row formtable">
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputEmail4">Class Name</label>
                        <input type="text" name="classname" class="form-control" id="className" placeholder="Enter Class Name" autocomplete="on">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputPassword4">Course Title</label>
                        <input type="text" name="title" class="form-control" id="className" placeholder="Enter Class Title" autocomplete="on">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="class">Select Class Category</label>
                        <select name="category" class="subjects form-control" id="select1">
                            <option value="">--Please choose an option--</option>
                            <option value="Web Development">Web Development</option>
                            <option value="Data Science">Data Science</option>
                            <option value="AI">Artificial Intelligence</option>
                            <option value="Machine Learning">Machine Learning</option>
                            <option value="Oracle DataBase">Oracle DataBase</option>
                            <option value="Cisco Networking">Cisco Networking</option>
                            <option value="RedHat Linux">RedHat Linux</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Microsoft">Microsoft System Administration</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputPassword4">Select Course Level</label>
                        <select name="level" class="courselevel form-control" id="select1">
                            <option value="">--Please choose an option--</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="expert">Expert</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputEmail4">Add an Exercise</label>
                        <select name="exercise" class="exercise form-control" id="select2">
                            <option value="">--Select an option--</option>
                            <option value="Web Development">Build a Calculator</option>
                            <option value="Data Science">Build a Facebook Login page</option>
                            <option value="AI">Build an estate management system</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-12 col-sm-12">
                        <label for="inputPassword4">Add an Quiz</label>
                        <select name="quiz" class="quiz form-control" id="select2">
                            <option value="">--Select an option--</option>
                            <option value="What do you intend achieving after this course?">What do you intend achieving after this course?</option>
                            <option value="What Career path do you desire?">What Career path do you desire?</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="row formtable">
                    <tr class="tablerows">
                        <div class="col-md-6 col-sm-12 ">
                            Class Name
                            <input type="text" id="className" placeholder="Enter Class Name" autocomplete="on">

                        </div>
                        <th>Course Title</th>
                        </tr>

                        <div id="error"></div>
                    <tr>
                        <td><input type="text" id="className" placeholder="Enter Class Name" autocomplete="on"></td>
                        <td><input type="text" id="classTitle" placeholder="Enter Class Title" autocomplete="on"></td>
                    </tr>

                    <tr>
                        <th class="headertwo">Select Class Category</th>
                        <th class="headertwo">Select Course Level</th>
                    </tr>

                    <div id="error"></div>
                    <tr>
                        <td>
                            <select name="subjects" class="subjects" id="select1">
                                <option value="">--Please choose an option--</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Data Science">Data Science</option>
                                <option value="AI">Artificial Intelligence</option>
                                <option value="Machine Learning">Machine Learning</option>
                                <option value="Oracle DataBase">Oracle DataBase</option>
                                <option value="Cisco Networking">Cisco Networking</option>
                                <option value="RedHat Linux">RedHat Linux</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Microsoft">Microsoft System Administration</option>
                            </select>
                        </td>

                        <td>
                            <select name="subjects" class="courselevel" id="select1">
                                <option value="">--Please choose an option--</option>
                                <option value="beginner">Beginner</option>
                                <option value="intermediate">Intermediate</option>
                                <option value="expert">Expert</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>Add an Exercise</th>
                        <th>Add a Quiz</th>
                    </tr>

                    <div id="error"></div>
                    <tr>
                        <td>
                            <select name="subjects" class="exercise" id="select2">
                                <option value="">--Select an option--</option>
                                <option value="Web Development">Build a Calculator</option>
                                <option value="Data Science">Build a Facebook Login page</option>
                                <option value="AI">Build an estate management system</option>
                            </select>
                        </td>
                        <td>
                            <select name="subjects" class="quiz" id="select2">
                                <option value="">--Select an option--</option>
                                <option value="">What do you intend achieving after this course?</option>
                                <option value="">What Career path do you desire?</option>
                            </select>
                        </td>
                    </tr>
                    </table>
                </div> -->

            <div>
                <ul class="px-0">
                    <li><label for="fileupload" id="fileupload"> Upload a Course Video</label></li>
                    <input id="file-upload" class="form-control" type="video" />

                    <li><input type="file" class="form-control mt-2" name="fileToUpload" value="fileToUpload" id="fileupload" accept="video/*" /></li>


                    <button id="createbutton" class="form-control mt-2" type="submit">Create Classroom</button>

                </ul>
            </div>
        </form>


    </div>
    <div>
        <header>
            <div class="footer">

                <?php
                include "footer.php"; ?>
            </div>
            
        </header>
    </div>

    <script type="text/javascript" src="createclass.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
