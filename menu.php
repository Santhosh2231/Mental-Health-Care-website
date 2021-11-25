<?php 
    session_start(); 
    include 'templates/header.html';
    include 'connect.php';
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: login.php");
    }
    
?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
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
                                </ul>
                            </div>
                        </div>
                    </div>

                 </div>
            </div>
        </div>
    </div>
    <br>
    <?php include 'templates/footer.html'; ?>
</body>
</html>