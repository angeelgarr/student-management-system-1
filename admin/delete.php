<?php
include "include/connect.php";
if(isset($_GET['skill_del'])){
$del = $_GET['skill_del'];
$student_roll = $_GET['student'];
$query = "delete from skill where id='$del'";
    $run = mysql_query($query);
    echo"<script>window.open('profile.php?student=$student_roll','_self')</script>";
}
?>
<?php
if(isset($_GET['del_time'])){
$del = $_GET['del_time'];
$query = "delete from timing where roll='$del'";
    $run = mysql_query($query);
    echo"<script>window.open('profile.php?student=$del','_self')</script>";
}
?>
<?php
include "include/connect.php";
if(isset($_GET['req'])){
$req = $_GET['req'];
$query = "delete from students where id='$req'";
    $run = mysql_query($query);
    echo"<script>window.open('admission.php','_self')</script>";
}
?>