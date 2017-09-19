<?php
include "include/connect.php";
session_start();
if(isset($_SESSION['student'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="css/animate.css" type="text/css" rel="stylesheet">
   <script src="css/jquery.min.js"></script>
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <script src="css/jquery-3.1.1.slim.min.js"></script>
<script src="css/tether.min.js"></script>
<script src="css/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Student Login</title>
</head>
<body>
   <div class="linkdin">
   <div class="float-sm-right mt-2 mr-3">
            <a href="apply.php" class="btn btn-danger ml-1 animated rubberBand"> <small>Apply For Admission</small></a>
        </div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4 mt-3 p-3">
        <div class="card card-trans p-2 mt-3">
            <h4 class="card-title m-0 p-0">Student Login</h4>
            <form action="login.php" method="post">
                <div class="form-group mt-2">
                    <label for="username" class="m-0 p-0">Username or email</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div> 
                <div class="form-group mt-2">
                    <label for="pass" class="m-0 p-0">Password</label>
                    <input type="password" class="form-control" name="word" id="pass" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="login" value="Secure Login">
                </div>
            </form>
            <div class="text-xs-center"><a href="forgetpass.php"><small>Forgot Password?</small></a></div>
        </div>
    </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="text-xs-center">
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">Learn to code interactively in class</h1>
        <p class="lead mt-2"><img src="img/OpenSocialCase-alpha.png" class="img img-fluid" width="210px"> <img src="img/code.jpg" class="img img-fluid ml-2" width="210px"><img src="img/code1.png" class="img img-fluid ml-2" width="170px"></p>
    </div>
    </div>
    <div class="link2">
        <div class="col-lg-12"><h1 class="text-faded">Apply for the admission!</h1></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 mt-3"><div class="text-xs-center">
            <a href="apply.php" class="btn btn-danger animated rubberBand"> <small>Apply For Admission</small></a>
        </div></div>
        <div class="col-lg-4"></div>
    </div>
    <div class="text-xs-center">
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">Learn to code interactively in class</h1>
        <p class="lead mt-2"><img src="img/OpenSocialCase-alpha.png" class="img img-fluid" width="210px"> <img src="img/code.jpg" class="img img-fluid ml-2" width="210px"><img src="img/code1.png" class="img img-fluid ml-2" width="170px"></p>
    </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $word = $_POST['word'];
        $query = "select * from students where email='$username' AND password='$word'";
        $run = mysql_query($query);
        $count = mysql_num_rows($run);
        if($count>0){
            $_SESSION['student'] = $username;
            echo"<script>window.open('index.php','_self')</script>";
        }
        else{
            echo"<script>alert('Fail! your Username or Password os Incorrect.Try Again')</script>";
        }
    }
?>