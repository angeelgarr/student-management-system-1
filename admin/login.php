<?php
include "include/connect.php";
session_start();
if(isset($_SESSION['username'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body class="bg-faded">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 mt-3">
        <div class="card card-block">
            <h4 class="card-title m-0 p-0">Admin Login</h4>
            <form action="login.php" method="post">
                <div class="form-group mt-2">
                    <label for="username" class="m-0 p-0">Username or email</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                </div> 
                <div class="form-group mt-2">
                    <label for="pass" class="m-0 p-0">Password</label>
                    <input type="password" class="form-control" name="word" id="pass" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" name="login" value="Secure Login">
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4"></div>
    <div class="col-lg-12">
        <div class="container text-xs-center">
            <p class="text-muted"><small><b>Note:</b> This login is only for Administration. So you are visitor or student please <a href="../login.php" class="nav-link">Go Back</a></small></p>
        </div>
    </div>
    
</body>
</html>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $word = $_POST['word'];
        $query = "select * from admini where name='$username' OR email='$username' AND word='$word'";
        $run = mysql_query($query);
        $count = mysql_num_rows($run);
        if($count>0){
            $_SESSION['username'] = $username;
            echo"<script>window.open('index.php','_self')</script>";
        }
        else{
            echo"<script>alert('Fail! your Username or Password os Incorrect.Try Again')</script>";
        }
    }
?>