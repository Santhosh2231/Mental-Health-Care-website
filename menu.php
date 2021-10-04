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
                    <li class="nav-item active"><a class="nav-link" href="home.php"><h5><b>Mental Health Care</b></h5></a> </li>
                    <li class="nav-item "><a class="nav-link" href="home.php"><span class="fa fa-home"></span> Home </a>
                    </li>
                    <li class="nav-item active"><a class="nav-link" href="about.php"><span class="fa fa-info"></span> About
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="menu.php"><span class="fa fa-list fa-ig"></span> Menu </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.php"><span
                                class="fa fa-address-card fa-ig"></span> Contact </a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php"><i class="fa fa-sign-out"></i> Signout</a></li>
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
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                <li class="breadcrumb-item active">Menu</li>
            </ol>
            <div class="col-12">
               <h3>Functions of the Mental Health care</h3>
               <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" role="tab" id="appointmentshead">
                        <h3 class="mb-0">
                            <a data-toggle="collapse" data-target="#appointments">
                            Appointments
                            </a>
                        </h3>
                        </div>
                    </div>
                    <div class="collapse show" id="appointments" data-parent="#accordion">
                        <div class="card-body col-12 col-md-8 offset-md-2 text-center">
                            <div class="card col-12 " style="width: 30rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="Appointments/book_appointments.php"><h4>Book Appointments</h4></a></li>
                                    <li class="list-group-item"><a href="Appointments/view_appointments.php"><h4>View Appointments</h4></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card">
                        <div class="card-header" role="tab" id="reviewshead">
                        <h3 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-target="#reviews">
                            Reviews
                            </a>
                        </h3>
                        </div>
                     </div>
                    <div class="col-12 collapse" id="reviews" data-parent="#accordion">
                        <div class="card-body col-12 col-md-8 offset-md-2 text-center">
                            <div class="card col-12" style="width: 30rem;">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><a href="Reviews/view.php"><h4>View Reviews</h4></a></li>
                                  <li class="list-group-item"><a href="Reviews/write.php"><h4>Write Reviews</h4></a></li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                

                    <div class="card">
                            <div class="card-header" role="tab" id="directorieshead">
                            <h3 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-target="#directories">
                                Directories
                                </a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-12 collapse" id="directories" data-parent="#accordion">
                        <div class="card-body col-12 col-md-8 offset-md-2 text-center">
                            <div class="card col-12" style="width: 30rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="Directories/users.php"><h4>Users</h4></a></li>
                                    <li class="list-group-item"><a href="Directories/Hotlines.php"><h4>Hotlines</h4></a></li>
                                    <li class="list-group-item"><a href="Directories/resource_centers.php"><h4>Resource Centers</h4></a></li>
                                    <li class="list-group-item"><a href="Directories/types_of_help.php"><h4>Type of Helps</h4></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tab" id="leaderboardhead">
                            <h3 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-target="#leaderboard">
                                LeaderBoard
                                </a>
                            </h3>
                        </div>
                    </div> 
                    <div class="col-12 collapse" id="leaderboard" data-parent="#accordion">
                        <div class="card-body col-12 col-md-8 offset-md-2 text-center">
                            <div class="card col-12" style="width: 30rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="Leaderboard/topcounsellor.php"><h4>Top Counsellor</h4></a></li>
                                    <li class="list-group-item"><a href="Leaderboard/most_activecounsellor.php"><h4>Most Active Counsellor</h4></a></li>
                                    <li class="list-group-item"><a href="Leaderboard/most_active_helpseeker.php"><h4>Most Active Helpseeker</h4></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="otherhead">
                            <h3 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-target="#other">
                                Others
                                </a>
                            </h3>
                        </div>
                    </div> 
                    <div class="collapse" id="other" data-parent="#accordion">
                        <div class="card-body col-12 col-md-8 offset-md-2 text-center">
                            <div class="card col-12" style="width: 30rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="lookup.php"><h4>Lookup</h4></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>


                 </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="footer">
        <div class="container">
            <div class="row">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="home.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="menu.html">Menu</a></li>
                        <li><a href="contact.html" >Contact</a></li>
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