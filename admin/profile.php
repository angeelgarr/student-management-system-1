<?php
include "include/connect.php";
session_start();
if(!$_SESSION['username']){
    header("location:login.php");
}
?>
<?php
if(isset($_GET['student'])){
    $student_roll = $_GET['student'];
$query = "select * from students where id='$student_roll'";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
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
    <title><?php echo"$fname $lname";?> profile | Code with sadique</title>
</head>
<body>
    <?php include"include/nav.php";?>
    <div class="col-lg-3">
        <div class="card">
           <img src="<?php echo "../img/applyimg/$img"?>" alt="my profile picture" class="card-img-top img-fluid"> 
        </div>
        <div class="card-block m-0 p-1  text-xs-center">
            <h2 class="card-title h4 m-0 text-uppercase"><?php echo"$fname $lname";?></h2>
            <p class="card-text p-0"><small><?php echo"$about";?></small></p>
        </div>
        <div class="list-group">
            <a href="payment.php?roll_pay=<?php echo $student_roll;?>" class="list-group-item list-group-item-action">Payment</a>
            <a href="update.php?edit=<?php echo $student_roll;?>" class="list-group-item list-group-item-action">Update Profile</a>
            <a href="#" class="list-group-item list-group-item-action">Study-Material</a>
        </div>
    </div>
    <div class="col-lg-9">
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Personal Details</h2>
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
            <div class="col-lg-12 card bg-faded p-1">
                        <h2 class="h6">Recent Payment</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pay_id</th>
                                    <th>Month</th>
                                    <th>DOP</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $query = "select * from payment where roll='$student_roll' order by id DESC limit 5";
                $run = mysql_query($query);
                    while($col = mysql_fetch_array($run)){
                        $id = $col['id'];
                        $month = $col['month'];
                        $dop = $col['dop'];
                        $amount = $col['amount'];
                        echo"<tr>
                                <td>$id</td>
                                <td>$month</td>
                                <td>$dop</td>
                                <td>$amount</td>
                            </tr>";
                    }
                ?>
                            </tbody>
                        </table>
                        <div class="card-footer p-0">
                            <span class="float-xs-right">
                                <a href="payment.php?roll_pay=<?php echo $student_roll;?>"><small>know more</small></a>
                            </span>
                        </div>
                    </div>
        </div>
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Basic Information</h2>
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
                <div class="col-lg-12 card bg-faded p-1">
                        <h2 class="card-title h6 mb-2"><?php echo"$fname" ?> Skills:</h2>
                        <?php
                            $student_roll = $_GET['student'];
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
        <a href='delete.php?skill_del=$id&student=$student_roll' class='float-xs-right text-danger'>x</a>
        <progress max='100' value='$value' class='progress progress-$color'></progress>";
    }
                       ?>
                        <div class="card-footer">
                            <form action="profile.php?student=<?php echo $student_roll; ?>" class="form" method="post">
                                <div class="col-lg-6 p-0">
                                    <select name="title" id="title" class="form-control">
                                        <option value="c++">c++</option>
                                        <option value="php">php</option>
                                        <option value="java">java</option>
                                        <option value="javascript">javascript</option>
                                        <option value="HTML">HTML</option>
                                        <option value="CSS">CSS</option>
                                        <option value="mysql">mysql</option>
                                        <option value="c">c</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="value" name="value">
                                    <input type="submit" hidden="hidden" value="skill_add" name="skill_add">
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['skill_add'])){
                                    $title = $_POST['title'];
                                    $value = $_POST['value'];
                                    $student_roll = $_GET['student'];
                                    $query = "insert into skill(title,value,roll) value('$title','$value','$student_roll')";
                                    $run = mysql_query($query);
                                    echo"<script>window.open('profile.php?student=$student_roll','_self')</script>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-12 card bg-faded p-1">
                        <span class="h6">Class Time Table</span>
                        <span class="float-xs-right"><a href="delete.php?del_time=<?php echo $student_roll;?>"><small>Reset Time</small></a></span>
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
                        <?php
                                $query = "select * from timing where roll='$student_roll'";
                                $run = mysql_query($query);
                                $count = mysql_num_rows($run);
    if($count<1){
        echo"<div class='card-footer'>
                            <form action='profile.php?student=$student_roll' class='form' method='post'>
                                <div class='col-lg-6 p-0'>
                                    <select name='day' class='form-control'>
                                        <option selected>Mon-Sat</option>
                                    </select>
                                </div>
                                <div class='col-lg-6'>
                                    <input type='text' class='form-control' placeholder='time' name='time'>
                                    <input type='submit' name='time_add' name='time_add' hidden='hidden'>
                                </div>
                            </form>";
    }
    else{ echo""; }
    ?>
                        
                            <?php
                                if(isset($_POST['time_add'])){
                                    $time = $_POST['time'];  
                                    $query = "insert into timing(roll,mon,tue,wed,thu,fri,sat) value('$student_roll','$time','$time','$time','$time','$time','$time')";
                                    $run = mysql_query($query);
                                    echo"<script>window.open('profile.php?student=$student_roll','_self')</script>";
                                }   
                            ?>
                        </div>
                    </div>
                
              </div>
    </div>
</body>
</html>
<?php } ?>