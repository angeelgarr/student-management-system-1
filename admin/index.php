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
   <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
   <link href="css/style.css" type="text/css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php include"include/nav.php"; ?>
    
    <div class="col-lg-3"><?php include "include/sidebar.php";//this will include the file where the file is saved. ?></div>
    
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-4">
               <a href="students.php" class="text-white">
                    <div class="card card-success p-1 text-xs-center">
                        <strong class="card-title"><i class="fa fa-users fa-2x"></i></strong>
                        <p class="card-text mt-1">Manage Students</p>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4">
               <a href="#" class="text-white">
                <div class="card card-warning p-1 text-xs-center">
                    <strong class="card-title"><i class="fa fa-file-text fa-2x"></i></strong>
                    <p class="card-text mt-1">Manage Admission Form</p>
                </div>
                </a>
            </div>
            
            <div class="col-lg-4">
               <a href="#" class="text-white">
                <div class="card card-info p-1 text-xs-center">
                    <strong class="card-title"><i class="fa fa-inr fa-2x"></i></strong>
                    <p class="card-text mt-1">Manage Payments</p>
                </div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4">
               <a href="#" class="text-white">
                <div class="card card-voilet p-1 text-xs-center">
                    <strong class="card-title"><i class="fa fa-book fa-2x"></i></strong>
                    <p class="card-text mt-1">Study Materials</p>
                </div>
                </a>
            </div>
            
            <div class="col-lg-4">
               <a href="#" class="text-white">
                <div class="card card-midnight p-1 text-xs-center">
                    <strong class="card-title"><i class="fa fa-question-circle-o fa-2x"></i></strong>
                    <p class="card-text mt-1">Manage Question</p>
                </div>
                </a>
            </div>
            
            <div class="col-lg-4">
               <a href="#" class="text-white">
                <div class="card card-danger p-1 text-xs-center">
                    <strong class="card-title"><i class="fa fa-calendar fa-2x"></i></strong>
                    <p class="card-text mt-1">Manage Time-Table</p>
                </div>
                </a>
            </div>
        </div>
    </div>
        <div class="col-lg-12 mt-3">
            <div class="container text-xs-center">
                <p class="text-muted"><small>&copy; copyright 2016-17 | design by CWS team</small> </p>
            </div>
        </div>
</body>
</html>