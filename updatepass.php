<?php
include "include/connect.php";
session_start();
if(!$_SESSION['student']){
    header("location:login.php");
}
?>
<?php
    if(isset($_GET['pass'])){
        $pass = $_GET['pass'];
        $query = "select * from students where id='$pass'";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
    $student_email = $row['email'];
    $fname = $row['fname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Update password | Code with sadique</title>
</head>
<body>
    <?php include"include/nav.php";?>
    <div class="col-lg-4"></div>
    <div class="col-lg-4 bg-faded p-1 mt-2">
        <form action="updatepass.php?pass=<?php echo"$pass";?>" method="post">
           <h2 class="h5">Change Password</h2>
           <div class="form-group">
               <label for="cpass">Current Password</label>
               <input type="password" class="form-control" id="cpass" name="cpass">
           </div>
           <div class="form-group">
               <input type="submit" class="btn btn-success" value="next" name="next">
           </div>
        </form>
        <?php
            if(isset($_POST['next'])){
                $cpass = $_POST['cpass'];
                $query = "select * from students where id='$pass'";
                $run = mysql_query($query);
                while($row = mysql_fetch_array($run)){
                    $upass = $row['password'];
                    if($cpass==$upass){
                        echo"<script>window.open('newpass.php?pass=$pass','_self')</script>";
                    }
                    else{
                        echo"<script>alert('Wrong Password!')</script>";
                    }
                }
            }
        ?>
    </div>
</body>
</html>
<?php }} ?>