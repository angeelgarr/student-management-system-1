<?php
include "include/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Security Questions</title>
</head>
<body class="bg-faded">
   <?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    $query = "select * from students where email='$user'";
    $run = mysql_query($query);
    while($col = mysql_fetch_array($run)){
            $que1 = $col['que1'];
            $que2 = $col['que2'];
            $que3 = $col['que3'];
            $fname = $col['fname'];
?>
    <div class="col-lg-4"></div>
           <div class="col-lg-4 card card-trans p-1 mt-3">
            <form method="post" action="securityque.php?user=<?php echo"$user";?>">
            Hello <?php echo"<span class='text-danger'>$fname</span>";?><br>Enter the following answers:<br>
            <div class="mt-2">
                <label for="que1">Question 1:<?php echo"$que1";?></label>
                    <input type="text" name="uans1" id="uans1">
            </div>
            <div class="mt-2">
                <label for="que2">Question 2:<?php echo"$que2";?></label><br>
                    <input type="text" name="uans2" id="uans2">
            </div>
            <div class="mt-2">
                <label for="que1">Question 3:<?php echo"$que3";?></label>
                    <input type="text" name="uans3" id="uans3">
            </div>
            <div class="mt-3">
                <input type="submit" class="btn btn-danger" name="submit" value="Submit">
            </div>
            </form>
                </div>
        <?php
            if(isset($_POST["submit"])){
                $uans1 = $_POST["uans1"];
                $uans2 = $_POST["uans2"];
                $uans3 = $_POST["uans3"];
                $query = "select * from students where email='$user' AND ans1='$uans1' AND ans2='$uans2' AND ans3='$uans3'";
                $run = mysql_query($query);
                $count = mysql_num_rows($run);
                if($count>0){
                    
                     $query = "update students set password='$user' where email='$user'";
                     $run = mysql_query($query);
                    echo"<script>alert('Your Password is your e-mail')</script>";
                    echo"<script>window.open('login.php','_self')</script>";
                }
                else{
                    echo"<script>alert('Incorrect Answers')</script>";
                }
            }
    ?>
</body>
</html>
<?php } } ?>