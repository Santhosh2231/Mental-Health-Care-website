<?php
    session_start();
?>
<!DOCTYPE html>
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
                    <li class="nav-item active"><a class="nav-link" href="#"><span
                                    class="fa fa-ig"></span> Signup </a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.html"><i class="fa fa-sign-out"></i> Admin Login</a></li>
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
    
    <div class="container col col-sm-3 offset-md-3 style="margin-top: 10px; margin-bottom: 10px;"">
        <div class="card " style="width: 45rem;">
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
                            <div class="col">
                                <div class="form-group">
                                    <label for="firstname" id="firstname"><h5>First Name:</h5></input>
                                    <input name="firstname" id="firstname" class="form-control" required></input>
                                </div>
                            </div>
                            <div class="col">
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
                            <!-- <div class="col">
                                <div class="form-group">
                                    <label for="conpassword" id="conpassword"><h5>Confirm Password: </h5></input>
                                    <input type="password" name="conpassword" id="conpassword" class="form-control" required></input>
                                </div>
                            </div> -->
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
                                        <option value="5"> &lt; 5 years</option>
                                        <option value="10">5-10 years</option>
                                        <option value="15">10-15 years</option>
                                        <option value="20">15+ years</option>
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
</body>
</html>

<?php
    include 'connect.php';
    $conn = OpenCon();

    if (isset($_POST["type"])) {
        addUser(); // only add user to DB if form is submitted
    }

    // add new user to DB
    function addUser() {
        global $conn;
        // get all user data submitted from signup form
        $type = $_POST["type"];
        $firstname = $_POST["firstname"];
        $secondname = $_POST["lastname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $age = $_POST["age"] ;
        $gender = $_POST["gender"];
        $location = $_POST["location"] ;
        $phone = $_POST["phone"] ;

        if (!$type) {
            returnError();
            return;
        }
        
        $sql = "insert into users (firstname,secondname,email,password,age,gender, location, phone)"; 
        $sql .= "values ('$firstname','$secondname','$email','$password',  $age,'$gender', '$location',  '$phone');";
        $result = $conn->query($sql);
        if (!$result) {
            returnError();
            return;
        }
    
        $sql = "select HID from Users where email='$email';";
        $result= $conn->query($sql); // get assigned userID to new user from table
        if (!$result) {
            returnError();
            echo "Santhosh<br><br>santhosh<hr>";
            return;
        }
    
        $id = $result->fetch_assoc()["HID"];
        $_SESSION["username"] = $id; // set session variable to user ID
    
        // add user to either counsellor or helpseeker table
        if ($type == "Counsellor") { 
            $yearsExp = $_POST["yearsExp"];
            $cert = $_POST["cert"];
            $sql = "insert into Counsellor (userID, yearsExperience, certification) values";
            $sql .= "($id, $yearsExp, '$cert');";
            $result = $conn->query($sql);

            if (!$result) {
                returnError();
                return;
            } else {
                header("Location: home.html"); // redirect to new profile
            }
            
        } else {
            $sql = "insert into HelpSeeker (userID, numCounsellors, numReviews) values ($id, 0, 0);";
            $result = $conn->query($sql);

            if (!$result) {
                returnError();
                return;
            } else {
                header("Location: home.html"); 
            }
        }
    }

    // user creation error
    function returnError() {
        echo "<div class='alert alert-primary'> Sorry, could not create your account. Try again</div>";
    }
?>


