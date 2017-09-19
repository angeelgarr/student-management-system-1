<?php
include "include/connect.php";
session_start();
if(!$_SESSION['username']){
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
    <title>Manage <?php echo $fname?>'s Payment | code with sadiqe</title>
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
        <div class="col-lg-3">
            <form action="payment.php?roll_pay=<?php echo $student_roll;?>" class="form" method="post">
                <label for="name" class="p-0">Student Name</label>
                <input type="text" class="form-control" value="<?php echo"$fname $lname";?>" readonly>
                <div class="form-group">
                    <label for="month" class="p-0">Month</label>
                    <select name="month" id="month" class="form-control">
                        <option value="<?php echo date("M");?>"><?php echo date("M");?></option>
                        <option disabled>----------</option>
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sept">Sept</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dop" class="m-0 p-0">Date of Payment</label>
                    <input type="date" class="form-control" name="dop" id="dop" value="<?php echo date("Y-m-d")?>">
                </div>
                   <div class="form-group">
                    <label for="mode" class="m-0 p-0">Mode of Payment</label>
                    <select class="form-control" id="mode" name="mode">
                        <option value="cash">Cash</option>
                        <option value="online">Online</option>
                        <option value="paytm">PayTM</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount" class="m-0 p-0">Amount</label>
                    <input type="number" class="form-control" name="amount">
                </div>
                   <div class="form-group">
                    <label for="status" class="m-0 p-0">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1">Full Paid</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" name="pay" value="pay now">
                </div>
                <?php
                    if(isset($_POST['pay'])){
                        $month = $_POST['month'];
                        $dop = $_POST['dop'];
                        $mode = $_POST['mode'];
                        $amount = $_POST['amount'];
                        $status = $_POST['status'];
                        
                        $query = "insert into payment(roll,month,dop,mode,amount,status) value('$student_roll','$month','$dop','$mode','$amount','$status')";
                        $run = mysql_query($query);
                    }
                ?>
            </form>
            </div>
        <div class="col-lg-9">
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