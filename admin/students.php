<?php
include "include/connect.php";
session_start();
if(!$_SESSION['username']){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Manage Students | code with sadiqe</title>
</head>
<body>
    <?php include"include/nav.php"?>
    <div class="col-lg-12">
       <div class="container-fluid p-1">
           <span class="col-lg-8 float-xs-left">
           <h2 class="h4 mt-0"><a href="index.php" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i></a> Manage Students <small>(<?php echo $count = mysql_num_rows(mysql_query("select * from students where status=1"))?>)</small></h2>
           </span>
           <span class="float-xs-right col-lg-4">
               <form action="students.php" method="get" class="form">
                   <div class="input-group">
                       <input type="search" class="form-control" placeholder="find with Roll or Name" name="search">
                       <span class="input-group-btn">
                           <input type="submit" class="btn btn-primary" value="Go" name="go">
                       </span>
                   </div>
               </form>

           </span>
       </div>
        <table class="table table-hover table-bordered">
         
            <tbody>
                           <?php 
    if(isset($_GET['go'])){
        echo "   <thead>
                <tr>
                    <th>Roll</th>
                    <th>Student_Name</th>
                    <th>Father's_Name</th>
                    <th>DOA</th>
                    <th>Fees(monthly)</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>";
        $search = $_GET['search'];
    $query = "select * from students where fname like '%$search%' or lname like '%$search%' or id='$search'";
        $run = mysql_query($query);
        $count = mysql_num_rows($run);
        if($count < 1){
            echo "<tr>
                    <td colspan='3'>No Search found with <input type='text' value='$search'></td>
                    </tr>";
        }
        else {
       while($row = mysql_fetch_array($run)){
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $father = $row['father'];
    $email = $row['email'];
    $contact = $row['contact'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $doa = $row['doa'];
    $fees = $row['fees'];
    $dob = $row['dob'];
    $status = $row['status'];
    $rank = $row['rank'];
if($status==0){
    $current_status = "deactivated";
}
    else{
        $current_status = "activated";
    }

             echo"<tr>
                <td>$id</td>
                <td>$fname $lname</td>
                <td>$father</td>
                <td>$doa</td>
                <td>$fees</td>
                <td>$rank</td>
                <td>$current_status</td>
                <td>
<a href='#' class='text-danger' title='Delete this record'><i class='fa fa-trash'></i></a>
                   <span class='text-muted'> |</span> 
<a href='#' class='text-info' title='edit this record'><i class='fa fa-edit'></i></a>
                   <span class='text-muted'> |</span> 
<a href='profile.php?student=$id' class='text-primary' title='view this record'><i class='fa fa-eye'></i></a>
                </td>
                </tr>
";
    }}
                }?>
                
            </tbody>
        </table>
            
            
            <table class="table table-hover table-bordered">
           
            <tbody>
              <?php
                if(!isset($_GET['go'])){
                    echo " <thead>
                <tr>
                    <th>Roll</th>
                    <th>Student_Name</th>
                    <th>Father's_Name</th>
                    <th>DOA</th>
                    <th>Fees(monthly)</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>";
$query = "select * from students where status=1";
$run = mysql_query($query);
    if($count < 1){
        echo"<tr><th colspan='10'>NO Records Found</th></tr>";
    }
    else{
while($row = mysql_fetch_array($run)){
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $father = $row['father'];
    $email = $row['email'];
    $contact = $row['contact'];
    $street = $row['street'];
    $city = $row['city'];
    $state = $row['state'];
    $doa = $row['doa'];
    $fees = $row['fees'];
    $dob = $row['dob'];
    $status = $row['status'];
    $rank = $row['rank'];
if($status==0){
    $current_status = "deactivated";
}
    else{
        $current_status = "activated";
    }

             echo"<tr>
                <td>$id</td>
                <td>$fname $lname</td>
                <td>$father</td>
                <td>$doa</td>
                <td>$fees</td>
                <td>$rank</td>
                <td>$current_status</td>
                <td>
<a href='delete.php?req=$id' class='text-danger' title='Delete this record'><i class='fa fa-trash'></i></a>
                   <span class='text-muted'> |</span> 
<a href='#' class='text-info' title='edit this record'><i class='fa fa-edit'></i></a>
                   <span class='text-muted'> |</span> 
<a href='profile.php?student=$id' class='text-primary' title='view this record'><i class='fa fa-eye'></i></a>
                </td>
                </tr>
";}}}?>                   
            </tbody>
        </table>
    </div>
</body>
</html>