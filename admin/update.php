<?php
include "include/connect.php";
session_start();
if(!$_SESSION['username']){
    header("location:login.php");
}
?>
<?php
if(isset($_GET['edit'])){
    $edit = $_GET['edit'];
$query = "select * from students where id='$edit'";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
    $student_roll = $row['id'];
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $father = $row['father'];
    $about = $row['about'];
    $email = $row['email'];
    $contact = $row['contact'];
    $nation = $row['nation'];
    $gender = $row['gender'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $doa = $row['doa'];
    $fees = $row['fees'];
    $dob = $row['dob'];
    $status = $row['status'];
    $rank = $row['rank'];
    $img = $row['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Update <?php echo"$fname";?> profile | Code with sadique</title>
</head>
<body>
<div class="container p-3">
        <div class="col-lg-3">
            <img src="img/logo.png" alt="code with sadiq logo" class="img-fluid">
        </div>
        <div class="col-lg-9">
            <span class="float-xs-right">
                <span class="lead"><?php echo"$fname";?></span>
                <a href="logout.php" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></a>
            </span>
        </div>
    </div>
    <nav class="navbar navbar-light bg-faded navbar-full mb-2">
        <div class="nav navbar-nav">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="students.php" class="nav-item nav-link active">Students</a>
            <a href="admission.php" class="nav-item nav-link active">Admission</a>
        </div>
    </nav>
    <form class="form" method="post" action="update.php?edit=<?php echo"$edit";?>" enctype="multipart/form-data">
    <div class="col-lg-3">
        <div class="card">
           <img src="<?php echo "../img/applyimg/$img"?>" alt="my profile picture" class="card-img-top img-fluid"> 
           <input type="file" name="img" class="w-100" value="<?php echo"$img";?>">
        </div>
        <div class="card-block m-0 p-0">
           <div class="form-group">
            <label for="about">About Me</label>
            <input type="text" name="about" id="about" class="form-control" value="<?php echo"$about";?>">
           </div>
        </div>
    </div>
    <div class="col-lg-9">
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Personal Details</h2>
                    <div class="col-lg-6">
                        <label for="fname" class="m-0 p-0"><small>First Name:</small></label>
                        <input type="text" class="form-control form-control-sm" id="fname" name="fname" value="<?php echo"$fname";?>">
                    </div>
                <div class="col-lg-6">
                    <label for="lname" class="m-0 p-0"><small>Last Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="lname" name="lname" value="<?php echo"$lname";?>">
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="faname" class="m-0 p-0"><small>Father's Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="faname" name="father" value="<?php echo"$father";?>">
                </div>
                   <div class="col-lg-12 mt-1">
                    <label for="contact" class="m-0 p-0"><small>Contact Number:</small></label>
                    <input type="text" class="form-control form-control-sm" id="contact" name="contact" value="<?php echo"$contact";?>">
                </div>
                   <div class="col-lg-6 mt-1">
                    <label for="national" class="m-0 p-0"><small>Nationality:</small></label>
                    <input type="text" class="form-control form-control-sm" id="national" name="nation" value="<?php echo"$nation";?>">
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="gender" class="m-0 p-0"><small>Gender:</small></label>
                    <input type="text" class="form-control form-control-sm" id="gender" name="gender" value="<?php echo"$gender";?>">
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="street" class="m-0 p-0"><small>Street:</small></label>
                    <input type="text" class="form-control form-control-sm" id="street" name="street" value="<?php echo"$street";?>">
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="address" class="m-0 p-0"><small>City:</small></label>
                    <input type="text" class="form-control form-control-sm" id="city" name="city" value="<?php echo"$city";?>">
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="state" class="m-0 p-0"><small>State:</small></label>
                    <input type="text" class="form-control form-control-sm" id="state" name="state" value="<?php echo"$state";?>">
                </div>
            </div>
        </div>
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Basic Information</h2>
                    <div class="col-lg-6">
                        <label for="rank" class="m-0 p-0"><small>Your Rank:</small></label>
                        <input type="text" class="form-control form-control-sm" id="rank" value="25">
                    </div>
                    <div class="col-lg-6">
                        <label for="roll" class="m-0 p-0"><small>Roll No:</small></label>
                        <input type="text" class="form-control form-control-sm" id="roll" name="roll" value="<?php echo"$student_roll";?>">
                    </div>
                    <div class="col-lg-12">
                    <label for="doa" class="m-0 p-0 mt-1"><small>Date of Admission:</small></label>
                    <input type="text" class="form-control form-control-sm" id="doa" name="doa" value="<?php echo"$doa";?>">
                    </div>
                </div>
              </div>
              <div class="col-lg-">
                  <input type="submit" class="btn btn-danger btn-block" name="submit" value="update">
              </div>
    </div>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $father = $_POST['father'];
            $about = $_POST['about'];
            $contact = $_POST['contact'];
            $nation = $_POST['nation'];
            $gender = $_POST['gender'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            
            $img = $_FILES['img'] ['name'];
            $tmp_img = $_FILES ['img'] ['tmp_name'];
            move_uploaded_file($tmp_img,"..img/applyimg/$img");
            
            $query = "update students set fname='$fname',lname='$lname',gender='$gender', father='$father',about='$about',contact='$contact',nation='$nation',street='$street',city='$city',state='$state',img='$img' where id='$edit'";
            $run = mysql_query($query);
            echo"<script>alert('successfully updated!')</script>";
            echo"<script>window.open('profile.php?student=$student_roll','_self')</script>";
        }
    ?>
</body>
</html>
<?php }}?>