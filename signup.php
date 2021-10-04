<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';


    $type = $_POST["type"];
    $firstname = $_POST["firstname"];
    $secondname = $_POST["lastname"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
    $email = $_POST["email"];
    $age = $_POST["age"] ;
    $gender = $_POST["gender"];
    $location = $_POST["location"] ;
    $phone = $_POST["phone"] ;

    $exists=false;
    if(($password == $conpassword) && $exists==false){
        if($type=="Counsellor"){
            $sql = "INSERT INTO `counsellors` (`cno`,`firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES (NULL,'$firstname', '$secondname', '$email', '$password', '$age', '$gender', '$location', '$phone')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $yearsExp = $_POST["yearsExp"];
                $cert = $_POST["cert"];
                $sql = "select cno from counsellors where email='$email' AND password='$password'";
                $result = mysqli_query($conn,$sql);
                $id = $result->fetch_assoc()["cno"];
                $sql = "INSERT INTO `counsellor_exper` (`cno`, `counsellor_exp`, `cerfication`) VALUES ('$id', '$yearsExp', '$cert');";
                $showAlert = true;
                $result = mysqli_query($conn,$sql);
                
                header("location: home.php");
                
            }
        }
        else{
            $sql = "INSERT INTO `users` (`sno`,`firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES (NULL,'$firstname', '$secondname', '$email', '$password', $age, '$gender', '$location', '$phone')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $sql = "select sno from users where email='$email' AND password='$password'";
                $result = mysqli_query($conn,$sql);
                $id = $result->fetch_assoc()["sno"];
                $sql = "insert into userdata (sno, noofcounsellings, noofreviews) values ($id, 0, 0);";
                $result = $conn->query($sql);
                $showAlert = true;
                header("location: home.php");
            }
        }
    }
    else{
        $showError = "Passwords do not match";
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
    <nav class="navbar navbar-dark navbar-expand-sm bg-primary fixed">
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
                    <li class="nav-item"><a class="nav-link" href="login.php"><span
                                class="fa fa-address-card fa-ig"></span> Login </a></li>
                    <li class="nav-item active"><a class="nav-link" href="#"><span
                                    class="fa fa-ig"></span> Signup </a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php"><i class="fa fa-sign-out"></i> Admin Login</a></li>
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
    
    <div class="container col-12 col-sm-6" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="card col-12" style="width: 45rem;">
            <div class="card-header">
            <h2 class="text-center">Sign Up</h2> 
            </div>
            <div class="card-body">
                <div class="container row-content">
                    <form action="" method="post" >
                        <div class="form-group">
                            <select class="form-control" name="type" id="type"> 
                                <option value="HelpSeeker">Helpseeker</option>
                                <option value="Counsellor">Counsellor</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="firstname" id="firstname"><h5>First Name:</h5></input>
                                    <input name="firstname" id="firstname" class="form-control" required></input>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="lastname" id="lastname"><h5>Last Name:</h5></input>
                                    <input name="lastname" id="lastname" class="form-control" required></input>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="email" id="email"><h5>Email:</h5></label>
                            <input type="email" id="email" name="email" class="form-control"
                            pattern=".+@.+" required>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password" id="password"><h5>Password :</h5></input>
                                    <input type="password" name="password" id="password" class="form-control" required></input>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="conpassword" id="conpassword"><h5>Confirm Password: </h5></input>
                                    <input type="password" name="conpassword" id="conpassword" class="form-control" required></input>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="age" id="age"><h5>Age:</h5></input>
                                    <input type="number" class="form-control" name="age" id="age" min=0 max=200></input>
                                    </div>
                            </div>
                            <div class="col">
                                    <div class="form-group">
                                    <label for="location" id="location"><h5>Location:</h5></input>
                                    <input name="location" class="form-control" id="location"></input> 
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone"><h5>Phone Number:</h5></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number"
                                    pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                        <label for="gender" id="gender"><h5>Gender:</h5></input>
                                        <!-- <input type="number" class="form-control" name="age" id="age" min=0 max=200></input> -->
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="other">Prefer not to say</option>
                                        </select>

                                </div>
                            </div>
                        </div>
                        
                
                        <div class="alert alert-info" role="alert"><b> Only fill this part out if you are a counsellor:</b>
                            <div style="padding-top:1%" class="form-row">
                                <div class="form-group col-md-6">
                                    How many years of experience as a mental health professional do you have?
                                    <select name="yearsExp" class="form-control" id="yearsExp">
                                        <option value="1"> &lt; 1 year</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                        <option value="4">4 years</option>
                                        <option value="5"> 5 years</option>
                                        <option value="6">6 years</option>
                                        <option value="7">7 years</option>
                                        <option value="8">8 years</option>
                                        <option value="9">9 years</option>
                                        <option value="10">10 years</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-4">
                                    Select your current status as a counsellor.
                                    <select name="cert" class="form-control" id="cert">
                                        <option value="certified">Certified</option>
                                        <option value="in progress">In progress</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" value="submit">Sign up </button>
                        </div>
                    </form>
                    <?php  
                        
                        if($showAlert){
                        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your account is now created and you can login
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div> ';
                        }
                        if($showError){
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> '. $showError.'
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div> ';
                        }
                    
                    ?>
                    <div class="alert alert-info mt-3" id="login-link">Already have an account? Login <a href="./login.html">here</a></p>
                </div>
            </body>
            </div>
        </div>
    </div>
    </div>

    <footer class="footer ">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="aboutus.html">About</a></li>
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
     <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</body>
</html>