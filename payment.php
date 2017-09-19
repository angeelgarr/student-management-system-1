<?php
include "include/connect.php";
session_start();
if(!$_SESSION['student']){
    header("location:login.php");
}
?>
<?php
if(isset($_GET['roll_pay'])){
    $student_roll = $_GET['roll_pay'];
$query = "select * from students where id='$student_roll'";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
    $id = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $fees = $row['fees'];
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
    <title><?php echo $fname?>'s Payment | code with sadiqe</title>
</head>
<body>
    <?php include"include/nav.php"?>
    <div class="col-lg-12">
       <div class="container-fluid p-1">
           <span class="col-lg-8 float-xs-left">
           <h2 class="h4 mt-0"><a href="index.php" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i></a> Manage Payment </h2>
           </span>
           <span class="float-xs-right col-lg-4">
               <form action="" method="get" class="form">
                   <div class="input-group">
                       <input type="search" class="form-control" placeholder="find with Roll or Name">
                       <span class="input-group-btn">
                           <input type="submit" class="btn btn-primary" value="Go">
                       </span>
                   </div>
               </form>
           </span>
       </div>
        <div class="col-lg-12">
            <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Pay ID</th>
                    <th>Month</th>
                    <th>DOP</th>
                    <th>Mode</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>        
                <?php
                $query = "select * from payment where roll='$student_roll'";
                $run = mysql_query($query);
                    while($col = mysql_fetch_array($run)){
                        $id = $col['id'];
                        $month = $col['month'];
                        $dop = $col['dop'];
                        $mode = $col['mode'];
                        $amount = $col['amount'];
                        $status = $col['status'];
                        if($status==1){
                            $status = 'Full Paid';
                            $color = "success";
                        }
                        else{
                            $status = 'Pending';
                            $color = "danger";
                        }
                        echo"<tr>
                                <td>$id</td>
                                <td>$month</td>
                                <td>$dop</td>
                                <td>$mode</td>
                                <td>$amount</td>
                                <td class='bg-$color'>$status</td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>