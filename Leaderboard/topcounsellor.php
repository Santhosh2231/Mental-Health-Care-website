<?php 
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    function topcounsellor(){
        global $conn;
        $sql = "SELECT `counsellors`.`firstname` `name` FROM counsellors WHERE counsellors.cno = ( SELECT review.counsellorid from review group by review.counsellorid ORDER BY
        AVG(review.rating) DESC LIMIT 1)";
        $result = $conn->query($sql);

		while($row = $result->fetch_assoc()) {
            echo "<h3 class='text-success'> Dr. ".$row['name']."</h3>" ;
        }
    }

?><?php include '../templates/folheader.html'; ?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Leaderboard</a></li>
                <li class="breadcrumb-item active">Top counsellor</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-6 col-sm-3">
                <h3>Top Counsellor:</h3>
            </div>
            <div class="col">
                <?php topcounsellor(); ?>
            </div>
        </div>
       

    </div>
    <?php include '../templates/footer.html'; ?>
    
</body>
</html>
