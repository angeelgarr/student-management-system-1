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
    <title>Forgot Password</title>
</head>
<body class="bg-faded">
   <div class="col-lg-4"></div>
   <div class="col-lg-4 mt-3 p-2">
         <small>NOTE this page is for resetting the password.</small>
    <form method="post" action="forgetpass.php">
       <label for="user">Enter username or e-mail:</label>
        <div class="input-group">
                       <input type="text" class="form-control" name="user">
                       <span class="input-group-btn">
                           <input type="submit" class="btn btn-success" value="Submit" name="submit">
                       </span>
                   </div>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $query = "select * from students where email='$user'";
        $run = mysql_query($query);
        $count = mysql_num_rows($run);
        if($count<1){
            echo"No such e-mail was found";
        }
        else{
            echo"<script>window.open('securityque.php?user=$user','_self')</script>";
        }
    
    ?>
    </div>
</body>
</html>
<?php } ?>