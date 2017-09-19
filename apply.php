<?php
include "include/connect.php";
date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Apply for admission</title>
</head>
<body>
    <div class="container p-3">
        <div class="col-lg-3">
            <img src="img/logo.png" alt="code with sadiq logo" class="img-fluid">
        </div>
        <div class="col-lg-9">
            <span class="float-xs-right">
                <a href="login.php" class="btn btn-danger">Stdent Login</a>
            </span>
        </div>
    </div>
    <div class="col-lg-12 text-xs-center">
        <h1 class="h4">Apply for Admission</h1>
        <p><small>All fields are Mandatory</small><span class="text-danger">*</span></p>
    </div>
    <div class="container">
    <form class="form" method="post" action="apply.php" enctype="multipart/form-data">
    <div class="col-lg-3">
        <div class="card">
          <div class="card-header p-1 m-0 text-xs-center">
              <strong>Upload Photo</strong>
          </div>
           <img src="img/default.png" alt="my profile picture" class="card-img-top img-fluid w-100"> 
           <div class="card-footer">
               <input type="file" required class="w-100" name="img">
           </div>
        </div>
        <div class="card card-block p-1">
           <h2 class="h5">Instructions</h2>
            <ul class="nav">
                <li><small><span class="text-danger">&raquo;&nbsp;</span>Upload file must be 1mp.</small></li>
                <li><small><span class="text-danger">&raquo;&nbsp;</span>Upload file must be 1mp.</small></li>
            </ul>
        </div>
        <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Basic Information</h2>
                    <div class="col-lg-12 form-group">
                        <label for="app" class="m-0 p-0"><small>Appearing Now:</small></label>
                        <input type="text" class="form-control form-control-sm" id="app" name="appearing" required>
                    </div>
                    <div class="col-lg-12">
                    <label for="doa" class="m-0 p-0 mt-1"><small>Date of Admission:</small></label>
                    <input type="text" class="form-control form-control-sm" id="doa" value="<?php echo date('d M Y  h:m:s')?>" name="doa" readonly>
                    </div>
                </div>
    </div>
    <div class="col-lg-9">
                <div class="col-lg-6">
                  <div class="col-lg-12 card bg-faded p-1">
                   <h2 class="h6">Personal Details</h2>
                    <div class="col-lg-6">
                        <label for="fname" class="m-0 p-0"><small>First Name:</small></label>
                        <input type="text" class="form-control form-control-sm" id="fname" value="" name="fname" required>
                    </div>
                <div class="col-lg-6">
                    <label for="lname" class="m-0 p-0"><small>Last Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="lname" value=""  name="lname" required>
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="father" class="m-0 p-0"><small>Father's Name:</small></label>
                    <input type="text" class="form-control form-control-sm" id="father" value="" name="father" required>
                </div>
                   <div class="col-lg-12 mt-1">
                    <label for="contact" class="m-0 p-0"><small>Contact Number:</small></label>
                    <input type="text" class="form-control form-control-sm" id="contact" value="" name="contact" required>
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="email" class="m-0 p-0"><small>E-mail ID:</small></label>
                    <input type="email" class="form-control form-control-sm" id="email" value="" name="email" required>
                </div>
                 <div class="col-lg-12 mt-1">
                    <label for="dob" class="m-0 p-0"><small>DOB:</small></label>
                    <input type="date" class="form-control form-control-sm" id="dob" name="dob" required>
                </div>
                  
                   <div class="col-lg-6 mt-1">
                    <label for="national" class="m-0 p-0"><small>Nationality:</small></label>
                    <select class="form-control" id="" name="nation" required>
                        <option value="indian">Indian</option>
                    </select>
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="gender" class="m-0 p-0"><small>Gender:</small></label>
                    <select class="form-control" id="" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="col-lg-12 mt-1">
                    <label for="street" class="m-0 p-0"><small>Street:</small></label>
                    <input type="text" class="form-control form-control-sm" id="street" value="" name="street" required>
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="address" class="m-0 p-0"><small>City:</small></label>
                    <input type="text" class="form-control form-control-sm" id="address" value="" name="city" required>
                </div>
                <div class="col-lg-6 mt-1">
                    <label for="state" class="m-0 p-0"><small>State:</small></label>
                    <input type="text" class="form-control form-control-sm" id="state" value="" name="state" required>
                </div>
            </div>
        </div>
                <div class="col-lg-6">
                  <div class="col-lg-12"><hr></div>
                   <div class="text-xs-center mt-3">
                        <h2 class="h5">Security Questions</h2>
                   </div>
    <div  class="text-black text-xs-center">
        <small>This is security questions in case you forgot your <span class="text-danger">password.</span></small>
    </div>
            <div class="form-group mt-2">
                <label for="que1" class="m-0 p-0">Question 1:</label>
                <select class="form-control" name="que1" id="que1">
                    <option selected disabled>select</option>
                    <option value="What is your nick name?">What is your nick name?</option>
                    <option value="What is your pet name?">What is your pet name?</option>
                    <option value="Which street were you born?">Which street were you born?</option>
                </select>
                <input type="text" class="form-control" name="ans1" placeholder="Answer here">
            </div>
            <div class="form-group mt-2">
                <label for="que2" class="m-0 p-0">Question 2:</label>
                <select class="form-control" name="que2" id="que2">
                    <option selected disabled>select</option>
                    <option value="What is your age?">What is your age?</option>
                    <option value="Who is your first friend?">Who is your first friend?</option>
                    <option value="Dream job?">Dream job?</option>
                </select>
                <input type="text" class="form-control" name="ans2" placeholder="Answer here">
            </div>
            <div class="form-group mt-2">
                <label for="que3" class="m-0 p-0">Question 3:</label>
                <select class="form-control" name="que3" id="que3">
                    <option selected disabled>select</option>
                    <option value="What is your dream car?">What is your dream car?</option>
                    <option value="Who is your idle?">Who is your idle?</option>
                    <option value="Which is your fevo movie?">Which is your fevo movie?</option>
                </select>
                <input type="text" class="form-control" name="ans3" placeholder="Answer here">
            </div>
                    <input type="submit" class="btn btn-success btn-block" name="insert" value="submit">
              </div>
    </div>
       </form>
        </div>
</body>
</html>
<?php
    if(isset($_POST['insert'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $father = $_POST['father'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $nation = $_POST['nation'];
        $gender = $_POST['gender'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $appearing = $_POST['appearing'];
        $doa = $_POST['doa'];
        
        $img = $_FILES['img'] ['name'];
        $tmp_img = $_FILES ['img'] ['tmp_name'];
        move_uploaded_file($tmp_img,"img/applyimg/$img");
        
            $que1 = $_POST['que1'];
            $ans1 = $_POST['ans1'];
            $que2 = $_POST['que2'];
            $ans2 = $_POST['ans2'];
            $que3 = $_POST['que3'];
            $ans3 = $_POST['ans3'];
         $query = "insert into students(fname,lname,father,contact,email,dob,nation,gender,street,city,state,appearing,doa,img,que1,que2,que3,ans1,ans2,ans3) value('$fname','$lname','$father','$contact','$email','$dob','$nation','$gender','$street','$city','$state','$appearing','$doa','$img','$que1','$que2','$que3','$ans1','$ans2','$ans3')";
        $run = mysql_query($query);
        echo"<script>alert('Successfully Filled')</script>";
        echo"<script>window.open('login.php','_self')</script>";
    }
?>