<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $secpassword = $_POST["secpassword"];
    
    $sql = "Select * from admin where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0){
        $sql = "Select * from security_password where password='$secpassword'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        echo "$num";
        if($num==1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $sql = "select s.no from admin where email='$email' AND password='$password'";
            $id = mysqli_query($conn,$sql);
            $_SESSION['id'] = $id;
            header("location: home.html");
        }
        else{
            $showError = "Invalid Security Password";
        }

    } 
    else{
        $showError = "Invalid Credentials";
    }
    
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link href="css/styles.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-sm bg-primary fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <a class="navbar-brand" href="#"><img src="logoi.png" height="30" width="41"></a> -->
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><h5><b>Mental Health Care</b></h5></a> </li>
                    <li class="nav-item "><a class="nav-link" href="index.html"><span class="fa fa-home"></span> Home </a>
                    </li>
                    <li class="nav-item "><a class="nav-link" href="about.html"><span class="fa fa-info"></span> About
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html"><span
                                class="fa fa-address-card fa-ig"></span> Login </a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.html"><span
                                    class="fa fa-ig"></span> Signup </a></li>
                    <li class="nav-item active"><a class="nav-link" href="admin.html"><i class="fa fa-sign-out"></i> Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="jumbotron">
            <div class="container">
                <div class="row row-header " style="margin: 10px; padding-bottom: 0%;">
                    <div class="col-12 col-sm-6">
                        <h1 id="title">Mental Health care</h1>
                        <p>Our vision is to ...........<br>
                            Our mission is to ............</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    <div class="container col-12 col-sm-5 " style="margin-top: 10px; margin-bottom: 10px;">
        <div class="card col-12" style="width: 40rem;">
            <div class="card-header">
            <h2 class="text-center">Admin Login</h2> 
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label"><b><h4>Email address</h4></b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><b><h4>Password</h4></b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="secpassword" class="form-label"><b><h4>Security Password</h4></b></label>
                            <input type="password" class="form-control" id="secpassword" name="secpassword" placeholder="Enter your Security Password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <br>
                        <div class="text-center">
                            <h5>New user? <a href="./signup.html">signup</a></h5>
                        </div>
                    </form>
                </div>
            </body>
            </div>
        </div>
    </div>
    <footer class="footer  ">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#" >Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our website Designers</h5>
                    <address>
		              Raminedi Santhosh 20BCE1477<br>
		              Spandan Ghosh 20BCE1428<br>
		              Debduhitha Banerjee 20BCE1429<br>
		           </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                        <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class="col-auto">
                    <p>© Copyright 2021 Mental Health care</p>
                </div>
           </div>
        </div>
    </footer>
     <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
     <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
     <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
     <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
