<?php
    include '../connect.php';
    function build_calendar(){
        $daysOfWeek = array();
        for($i=0;$i<7;$i++){
            $date = date('d-m-Y D',strtotime("$i day"));
            array_push($daysOfWeek,$date);
        }
        $calendar = "<table class='table table-striped'>"; 
        $calendar.= "<center><h2>Booking</h2>"; 
        $calendar.= "<tr>"; 
        // Create the calendar headers 
        $calendar .= "<th class='header text-white text-center bg-primary '>Slots</th>";
        foreach($daysOfWeek as $day) { 
            $calendar .= "<th class='header text-white bg-primary' id='$'>$day</th>"; 
        } 
        $calendar .= "</tr><tbody class='table table-striped'><tr>";
        $slot = array('A','B','C','D','E');
       $j=0;
        $slots = array('Slot A :9:30 A.M to 10:30 A.M','Slot B : 9:30 A.M to 10:30 A.M','Slot C : 9:30 A.M to 10:30 A.M','Slot D : 9:30 A.M to 10:30 A.M','Slot E : 9:30 A.M to 10:30 A.M');
       foreach($slots as $sl){
            $calendar .= "<th scope='row' class='text-center'>$sl</th>";
            for($i=0;$i<7;$i++){
                $calendar .= "<td class='text-center  align-middle'><a class='btn btn-success btn-xs' href='confirmation.php?date=$daysOfWeek[$i]&slotid=".$slot[$j]."<form action='counsellor_booking.php' method='get' >Book</form></a></td>";

            }
            $j++;
            $calendar .= "</tr>";
        }
        $calendar .= "</tr></tbody>"; 
        $calendar .= "</table>";
        return $calendar;
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Appointments</a></li>
                <li class="breadcrumb-item"><a href="book_appointments.php">Book Appointments</a></li>
                <li class="breadcrumb-item active">Counsellor Booking</li>
            </ol>
            <div class="col-12">
               <h3>Counsellor Booking</h3>
               <hr>
            </div>
        </div>
       <div class="container">
            <?php 
                echo build_calendar();  
                echo $_GET['counsellorid'];       
            ?> 
       </div> 
        <br>
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
     <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
     <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
     <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
     <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>