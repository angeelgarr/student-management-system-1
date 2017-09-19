<?php
include "include/connect.php";
session_start();
if(!$_SESSION['username']){
    header("location:login.php");
}
?>
<?php
if(isset($_GET['apply'])){
    $apply = $_GET['apply'];
    $query = "select * from students where id='$apply'";
$query = "select * from students";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $father = $row['father'];
    $email = $row['email'];
    $contact = $row['contact'];
    $nation = $row['nation'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $doa = $row['doa'];
    $img = $row['img'];
    $fees = $row['fees'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $status = $row['status'];
    $rank = $row['rank'];
if($status==0){
    $current_status = "deactivated";
}
    else{
        $current_status = "activated";
    }
}
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
    <form class="form" method="post" action="approve.php?apply=<?php echo "$apply";?>">
    <div class="col-lg-3">
        <div class="card">
           <img src="<?php echo "../img/applyimg/$img";?>" alt="my profile picture" class="card-img-top img-fluid"> 
        </div>
    </div>
    <div class="col-lg-9">
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Personal Details</h2>
                    <div class="col-lg-6">
                        <label for="fname" class="m-0 p-0"><small>First Name:</small></label>
                        <input type="text" class="form-control form-control-sm" id="fname" value="<?php echo"$fname";?>" name="fname">
                    </div>
                <div class="col-lg-6">
                    <label for="lname" class="m-0 p-0"><small>Last Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="lname" value="<?php echo"$lname";?>" name="lname">
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="faname" class="m-0 p-0"><small>Father's Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="faname" value="<?php echo"$father";?>" name="father">
                </div>
                   <div class="col-lg-12 mt-1">
                    <label for="contact" class="m-0 p-0"><small>Contact Number:</small></label>
                    <input type="text" class="form-control form-control-sm" id="contact" value="<?php echo"$contact";?>" name="contact">
                </div>
                   <div class="col-lg-12 mt-1">
                    <label for="email" class="m-0 p-0"><small>E-mail:</small></label>
                    <input type="email" class="form-control form-control-sm" id="email" value="<?php echo"$email";?>" name="email">
                </div>
                   <div class="col-lg-6 mt-1">
                    <label for="national" class="m-0 p-0"><small>Nationality:</small></label>
                    <input type="text" class="form-control form-control-sm" id="national" value="<?php echo"$nation";?>" name="nation">
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="gender" class="m-0 p-0"><small>Gender:</small></label>
                    <input type="text" class="form-control form-control-sm" id="gender" value="<?php echo"$gender";?>" name="gender">
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="street" class="m-0 p-0"><small>Street:</small></label>
                    <input type="text" class="form-control form-control-sm" id="street" value="<?php echo"$street";?>" name="street">
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="address" class="m-0 p-0"><small>City:</small></label>
                    <input type="text" class="form-control form-control-sm" id="address" value="<?php echo"$city";?>" name="city">
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="state" class="m-0 p-0"><small>State:</small></label>
                    <input type="text" class="form-control form-control-sm" id="state" value="<?php echo"$state";?>" name="state">
                </div>
            </div>
        </div>
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Basic Information</h2>
                    <div class="col-lg-6">
                        <label for="rank" class="m-0 p-0"><small>Your Rank:</small></label>
                        <input type="text" class="form-control form-control-sm" id="rank" value="25" name="rank">
                    </div>
                    <div class="col-lg-6">
                        <label for="roll" class="m-0 p-0"><small>Roll No:</small></label>
                        <input type="text" class="form-control form-control-sm" id="roll" value="<?php echo"$id";?>" name="roll" required>
                    </div>
                    <div class="col-lg-12">
                    <label for="doa" class="m-0 p-0 mt-1"><small>Date of Admission:</small></label>
                    <input type="text" class="form-control form-control-sm" id="doa" value="<?php echo"$doa";?>" name="doa" readonly>
                    </div>
                    <div class="col-lg-12">
                    <label for="pass" class="m-0 p-0 mt-1"><small>Create Password:</small></label>
                    <input type="password" class="form-control form-control-sm" id="pass" value="" name="word">
                    </div>
                     <div class="col-lg-12">
                    <label for="fees" class="m-0 p-0 mt-1"><small>Monthely Fees:</small></label>
                    <input type="text" class="form-control form-control-sm" id="fees" value="" name="fees">
                    </div>
                    <div class="col-lg-12">
                    <label for="status" class="m-0 p-0 mt-1"><small>Status:</small></label>
                    <select id="status" class="form-control" name="status">
                        <option value="0">Deactivate</option>
                        <option value="1" selected>Activate</option>
                    </select>
                    </div>
                </div>
                <div class="col-lg-12">
                        <div class="form-group">
                          <input type="submit" class="btn btn-success btn-block" value="update this record" name="update">  
                        </div>
                    </div>
              </div>
    </div>
    </form>
</body>
</html>
<?php }

else{
    header("location:admission.php");
}
?>
<?php
if(isset($_POST['update'])){
    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $father = $_POST['father'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $nation = $_POST['nation'];
        $gender = $_POST['gender'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $rank = $_POST['rank'];
        $fees  = $_POST['fees'];
        $status = $_POST['status'];
        $word = $_POST['word'];
    $query = "update students set fname='$fname',lname='$lname',father='$father',contact='$contact',email='$email',nation='$nation',gender='$gender',street='$street',city='$city',state='$state',rank='$rank',fees='$fees',status='$status',password='$word' where id='$apply'";
    $run = mysql_query($query);
    echo"<script>window.open('students.php','_self')</script>";
}
?>