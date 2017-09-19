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
while($row=mysql_fetch_array($run)){
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
            <form action="newpass.php?pass=<?php echo"$pass";?>" method="post"> 
               <div class="form-group mt-2">
                    <label for="newpass">New Password</label>
                    <input type="password" class="form-control" id="newpass" name="newpass">
                </div>         
                <div class="form-group mt-2">
                    <label for="conpass">Conform Password</label>
                    <input type="password" class="form-control" id="conpass" name="conpass">
                </div>
                <div>
                    <input type="submit" class="btn btn-danger" value="update" name="update">
                </div>
                </form>
    </div>    
        <?php
                        if(isset($_POST['update'])){
                            $newpass = $_POST['newpass'];
                            $conpass = $_POST['conpass'];
                            if($newpass==$conpass){
                                $query = "update students set password='$newpass' where id='$pass'";
                                $run = mysql_query($query);
                                echo"<script>alert('Successfully Updated Your Password')</script>";
                                echo"<script>window.open('index.php','_self')</script>";
                            }
                            else{
                                echo"<script>alert('Your password do not match each other!')</script>";
                                echo"<script>window.open('newpass.php?pass=$pass','_self')</script>";
                            }
                        }
                ?>
</body>
</html> 
<?php }} ?>   