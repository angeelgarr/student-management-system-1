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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Students</title>
</head>
<body>
    <?php include"include/nav.php";?>
    <div class="col-lg-12">
    <div class="col-lg-5">
        <span class="col-lg-8 float-xs-left">
           <h2 class="h4 mt-0"><a href="index.php" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i></a> Go back</h2>
           </span>
    </div>
    <span class="float-xs-right col-lg-4">
               <form action="" method="get" class="form">
                   <div class="input-group">
                       <input type="search" class="form-control" placeholder="find with Roll or Name" name="search">
                       <span class="input-group-btn">
                           <input type="submit" class="btn btn-primary" value="Go" name='go'>
                       </span>
                   </div>
               </form>
           </span>
    </div>
    <div class="col-lg-12">
    <?php
        if(isset($_GET['go'])){
            $search = $_GET['search'];
            $query = "select * from students where fname like '%$search%' or lname like '%$search%' or id='$search'";
            $run = mysql_query($query);
            $count = mysql_num_rows($run);
            if($count>0){
    while($row = mysql_fetch_array($run)){
        $student_roll = $row['id'];
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $rank = $row['rank'];
    $img = $row['img'];
        echo"
        <div class='media mt-3 ml-3 col-lg-4'>
            <a href='' class='media-left'>
                <img class='media-object' src='img/applyimg/$img' width='100px'>
            </a>
            <div class='media-body'>
                <h4 class='media-heading'>$fname $lname</h4>
                <p>Rank: $rank</p>
            </div>
            <a href='fullview.php?view=$id'><button class='btn btn-warning' name='viewmore'>View Profile</button></a>
        </div>";
    }
            }
            else{
                echo"No similar search found!";
            }
        }
    ?>
<?php
    if(!isset($_GET['go'])){
        $query = "select * from students where status='1' AND email!='$student_email'";
        $run = mysql_query($query);
    while($row = mysql_fetch_array($run)){
        $student_roll = $row['id'];
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $rank = $row['rank'];
    $img = $row['img'];
        echo"<div class='media mt-3 ml-3 col-lg-4'>
            <a href='' class='media-left'>
                <img class='media-object' src='img/applyimg/$img' width='100px'>
            </a>
            <div class='media-body'>
                <h4 class='media-heading'>$fname $lname</h4>
                <p>Rank: $rank</p>
            </div>
            <a href='fullview.php?view=$id'><button class='btn btn-warning' name='viewmore'>View Profile</button></a>
        </div>";
    }
    }
?>
    </div>
</body>
</html>
<?php }} ?>