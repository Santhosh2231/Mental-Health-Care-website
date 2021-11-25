<?php 
    session_start();
    include '../connect.php';
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../admin.php");
    }
    $conn = OpenCon();
    function activecounsellor(){
        global $conn;
        $sql = "SELECT `counsellors`.`firstname` `name` FROM counsellors WHERE counsellors.cno = ( SELECT booking.counsellorid FROM booking GROUP BY booking.counsellorid ORDER BY COUNT(booking.counsellorid) DESC LIMIT 1)";
        $result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
            echo "<h3 class='text-success'> Dr. ".$row['name']."</h3>" ;
        }
    }

?><?php include 'header.html'; ?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="menu.php">Leaderboard</a></li>
                <li class="breadcrumb-item active">Most Active Counsellor</li>
            </ol>
            
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <h3>Most Active Counsellor:</h3>
            </div>
            <div class="col">
                <?php activecounsellor(); ?>
            </div>
        </div>
    

    </div>
    <?php include '../templates/footer.html'; ?>
    
</body>
</html>