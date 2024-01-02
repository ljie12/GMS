<?php 
ob_start();
session_start();
include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading System</title>
    <!-- css -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- js -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url("images/img1.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?Subject">Add Subject</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="subject.php">Subjects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php" >About</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                            
                            if (isset($_SESSION['logged_in'])) { ?>
                                <a href="process.php?logout" class="nav-link">Logout</a>
                            <?php } else { ?>
                                <a href="login.php" class="nav-link">Login</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar end -->