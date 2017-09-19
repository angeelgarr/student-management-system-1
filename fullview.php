<?php
include "include/connect.php";
session_start();
if(!$_SESSION['student']){
    header("location:login.php");
}
?>
<?php
if(isset($_SESSION['student'])){
    $student_email = $_SESSION['student'];
$query = "select * from students where email='$student_email'";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
$fname = $row['fname'];
$lname = $row['lname'];
}}
?>
<?php
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $query = "select * from students where id='$id'";
        $run = mysql_query($query);
    while($row = mysql_fetch_array($run)){
        $student_roll = $row['id'];
    $id = $row['id'];
    $faname = $row['fname'];
    $laname = $row['lname'];
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?php echo"$faname $laname"; ?></title>
</head>
<body>
    <?php include"include/nav.php";?>
<?php
    if(isset($_GET['view'])){
        $id = $_GET['view'];
        $query = "select * from students where id='$id'";
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
    $dob = $row['dob'];
    $rank = $row['rank'];
    $img = $row['img'];  
?>
   <div class="col-lg-3">
        <div class="card">
           <img src="<?php echo "img/applyimg/$img"?>" alt="my profile picture" class="card-img-top img-fluid"> 
        </div>
        <div class="card-block m-0 p-1  text-xs-center">
            <h2 class="card-title h4 m-0 text-uppercase"><?php echo"$fname $lname";?></h2>
            <p class="card-text p-0"><small><?php echo"$about";?></small></p>
        </div>
    </div>
    <div class="col-lg-9">
                <div class="col-lg-6">
                  <div class="col-lg-12 card card-outline-primary bg-faded p-0">
                   <div class="card-header bg-primary">                      
                   <h2 class="h6 text-white">Personal Details</h2>
                   </div>
                  <div class="p-1">
                                <div class="col-lg-6">
                        <label for="fname" class="m-0 p-0"><small>First Name:</small></label>
                        <p id="fname"><strong><?php echo"$fname";?></strong></p>
                    </div>
                <div class="col-lg-6">
                    <label for="lname" class="m-0 p-0"><small>Last Name:</small></label>
                    <p id="lname"><strong><?php echo"$lname";?></strong></p>
                </div>
                <div class="col-lg-12">
                    <label for="faname" class="m-0 p-0"><small>Father's Name:</small></label>
                    <p id="faname"><strong><?php echo"$father";?></strong></p>
                </div>
                   <div class="col-lg-12">
                    <label for="contact" class="m-0 p-0"><small>Contact Number:</small></label>
                    <p id="contact"><strong><?php echo"$contact";?></strong></p>
                </div>
                   <div class="col-lg-6">
                    <label for="national" class="m-0 p-0"><small>Nationality:</small></label>
                    <p id="national"><strong><?php echo"$nation";?></strong></p>
                </div>
                <div class="col-lg-6">
                    <label for="gender" class="m-0 p-0"><small>Gender:</small></label>
                    <p id="gender"><strong><?php echo"$gender";?></strong></p>
                </div>
                <div class="col-lg-12">
                    <label for="street" class="m-0 p-0"><small>Street:</small></label>
                    <p id="street"><strong><?php echo"$street";?></strong></p>
                </div>
                <div class="col-lg-6">
                    <label for="address" class="m-0 p-0"><small>City:</small></label>
                    <p id="address"><strong><?php echo"$city";?></strong></p>
                </div>
                <div class="col-lg-6">
                    <label for="address" class="m-0 p-0"><small>State:</small></label>
                    <p id="address"><strong><?php echo"$state";?></strong></p>
                </div>
           
                  </div> 
                  </div>
        </div>
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-0 card-outline-info">
                   <div class="card-header bg-info text-white">
                   <h2 class="h6">Basic Information</h2>
                   </div>
               <div class="p-1">
                        <div class="col-lg-6">
                        <label for="rank" class="m-0 p-0"><small>Your Rank:</small></label>
                        <p id="rank"><strong>25</strong></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="roll" class="m-0 p-0"><small>Roll No:</small></label>
                        <p id="roll"><strong><?php echo"$student_roll";?></strong></p>
                    </div>
                    <div class="col-lg-12">
                    <label for="doa" class="m-0 p-0"><small>Date of Admission:</small></label>
                    <p id="doa"><strong><?php echo"$doa";?></strong></p>
                    </div>
               
               </div>
                </div>
                <div class="col-lg-12 card bg-faded p-0 card-outline-success">
                        <div class="card-header bg-success text-white">
                            <h2 class="h6"><?php echo"$fname" ?> Skills:</h2>
                        </div>
                        <div class="p-1">
                            <?php
                            $query = "select * from skill where roll='$student_roll'";
                            $run = mysql_query($query);
    while($col = mysql_fetch_array($run)){
        $title = $col['title'];
        $id = $col['id'];
        $value = $col['value'];
        if($title == 'c++'){
            $color = "danger";
        }
        elseif($title == 'java'){
            $color = "danger";
        }
        elseif($title == 'javascript'){
            $color = "warning";
        }
        elseif($title == 'HTML'){
            $color = "primary";
        }
        elseif($title == 'CSS'){
            $color = "info";
        }
        elseif($title == 'mysql'){
            $color = "success";
        }
        elseif($title == 'php'){
            $color = "danger";
        }
        elseif($title == 'c'){
            $color = "warning";
        }
        echo"<label class='m-0 p-0'>$title<small>($value%)</small></label>
        <progress max='100' value='$value' class='progress progress-$color'></progress>";
    }
                       ?>
                        </div>
                   </div>
                    <div class="col-lg-12 card bg-faded p-0 card-outline-warning">
                       <div class="card-header bg-warning text-white">
                        <h2 class="h6">Class Time Table</h2>
                       </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "select * from timing where roll='$student_roll'";
                                $run = mysql_query($query);
                                $count = mysql_num_rows($run);
    if($count<1){
        echo"<tr>
                <td>No Class Timing found</td>
            </tr>";
    }
    else{
                                while($row = mysql_fetch_array($run)){
                                    $time = $row['sat'];
                                    echo" <tr>
                                    <td>Mon</td>
                                    <td>$time</td>
                                </tr>
                                 <tr>
                                    <td>Tue</td>
                                    <td>$time</td>
                                </tr>
                                 <tr>
                                    <td>Wed</td>
                                    <td>$time</td>
                                </tr>
                                 <tr>
                                    <td>Thu</td>
                                    <td>$time</td>
                                </tr>
                                 <tr>
                                    <td>Fri</td>
                                    <td>$time</td>
                                </tr>
                                 <tr>
                                    <td>Sat</td>
                                    <td>$time</td>
                                </tr>
                                 <tr>
                                    <td>Sun</td>
                                    <td>Holiday</td>
                                </tr>";
                                }}
                                ?>
                            </tbody>
                        </table>
                                      
                        </div>
                    </div>
                
              </div>
    </div>
    </body>
</html>
<?php }} ?>