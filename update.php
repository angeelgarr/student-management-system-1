<?php
include "include/connect.php";
session_start();
if(!$_SESSION['student']){
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
    <?php include"include/nav.php";?>
    <form class="form" method="post" action="update.php?edit=<?php echo "$edit";?>" enctype="multipart/form-data">
    <div class="col-lg-3">
        <div class="card">
           <img src="<?php echo "img/applyimg/$img"?>" alt="my profile picture" class="card-img-top img-fluid"> 
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
                <div class="col-lg-12">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Personal Details</h2>
                    <div class="col-lg-6">
                        <label for="fname" class="m-0 p-0"><small>First Name:</small></label>
                        <input type="text" class="form-control form-control-sm" id="fname" value="<?php echo"$fname";?>" readonly>
                    </div>
                <div class="col-lg-6">
                    <label for="lname" class="m-0 p-0"><small>Last Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="lname" value="<?php echo"$lname";?>" readonly>
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="faname" class="m-0 p-0"><small>Father's Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="faname" name="father" value="<?php echo"$father";?>" required>
                </div>
                   <div class="col-lg-12 mt-1">
                    <label for="contact" class="m-0 p-0"><small>Contact Number:</small></label>
                    <input type="text" class="form-control form-control-sm" id="contact" name="contact" value="<?php echo"$contact";?>" required>
                </div>
                   <div class="col-lg-6 mt-1">
                    <label for="national" class="m-0 p-0"><small>Nationality:</small></label>
                    <input type="text" class="form-control form-control-sm" id="national" name="nation" value="<?php echo"$nation";?>" required>
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="gender" class="m-0 p-0"><small>Gender:</small></label>
                    <input type="text" class="form-control form-control-sm" id="gender" name="gender" value="<?php echo"$gender";?>" readonly>
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="street" class="m-0 p-0"><small>Street:</small></label>
                    <input type="text" class="form-control form-control-sm" id="street" name="street" value="<?php echo"$street";?>" required>
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="address" class="m-0 p-0"><small>City:</small></label>
                    <input type="text" class="form-control form-control-sm" id="city" name="city" value="<?php echo"$city";?>" required>
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="state" class="m-0 p-0"><small>State:</small></label>
                    <input type="text" class="form-control form-control-sm" id="state" name="state" value="<?php echo"$state";?>" required>
                </div>
            </div>
        </div>
        <div class="text-xs-center">
        <input type="submit" class="btn btn-danger btn-block" value="update" name="update">
    </div>
    </div>
    </form>
    <?php
        if(isset($_POST['update'])){
            $father = $_POST['father'];
            $about = $_POST['about'];
            $contact = $_POST['contact'];
            $nation = $_POST['nation'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $img = $_FILES['img'] ['name'];
            $tmp_img = $_FILES ['img'] ['tmp_name'];
            move_uploaded_file($tmp_img,"img/applyimg/$img");
            
            $query = "update students set father='$father',about='$about',contact='$contact',nation='$nation',street='$street',city='$city',state='$state',img='$img' where id='$edit'";
            $run = mysql_query($query);
            echo"<script>alert('successfully updated!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
    ?>
</body>
</html>
<?php }} ?>