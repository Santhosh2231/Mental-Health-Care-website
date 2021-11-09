<?php 
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        global $conn;
        $Cid = $_SESSION['Cid'];
        $Hid = $_SESSION['id'];
        $date = $_SESSION["date"];
        $slot = $_SESSION["slotid"];
        $type = $_POST["pay"];
        echo  
        $sql = "INSERT INTO `booking`(`bookingid`, `counsellorid`, `helpseekerid`, `date`, `slotno`, `PaymentType`) VALUES ('NULL','$Cid','$Hid','$date','$slot','$type')";
        $result = $conn->query($sql);
        
    }
    function upcoming(){
        global $conn;
        $todaydate = date("Y-m-d");
    
        $sql = "SELECT `counsellors`.`firstname` `cno`,`booking`.`date` `date`,`slot`.`slotid` `slotid`, `slot`.`timefrom` `from`,`slot`.`timeto` `to` FROM booking LEFT JOIN `counsellors` ON `booking`.`counsellorid`=`counsellors`.`cno` LEFT JOIN `slot` ON `booking`.`slotno`=`slot`.`slotid` WHERE `booking`.`helpseekerid`=1";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
            if ($todaydate <= $row['date']){
                echo "<tr class='text-center'>
                        <td>Dr. ".$row["cno"]."</td>
                        <td>".$row["date"]."</td>
                        <td>".$row["slotid"]."</td>
                        <td>".$row["from"]."</td>
                        <td>".$row["to"]."</td>
                    </tr>";
            }
		}
    }
    function today(){
        global $conn;
        $todaydate = date("Y-m-d");
    
        $sql = "SELECT `counsellors`.`firstname` `cno`,`booking`.`date` `date`,`slot`.`slotid` `slotid`, `slot`.`timefrom` `from`,`slot`.`timeto` `to` FROM booking LEFT JOIN `counsellors` ON `booking`.`counsellorid`=`counsellors`.`cno` LEFT JOIN `slot` ON `booking`.`slotno`=`slot`.`slotid` WHERE `booking`.`counsellorid`=6 and `booking`.`helpseekerid`=1";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
            if ($todaydate == $row['date']){
                echo "<tr class='text-center'>
                        <td>Dr. ".$row["cno"]."</td>
                        <td>".$row["date"]."</td>
                        <td>".$row["slotid"]."</td>
                        <td>".$row["from"]."</td>
                        <td>".$row["to"]."</td>
                    </tr>";
            }
		}
    }
    function previous(){
        global $conn;
        $todaydate = date("Y-m-d");
    
        $sql = "SELECT `counsellors`.`firstname` `cno`,`booking`.`date` `date`,`slot`.`slotid` `slotid`, `slot`.`timefrom` `from`,`slot`.`timeto` `to` FROM booking LEFT JOIN `counsellors` ON `booking`.`counsellorid`=`counsellors`.`cno` LEFT JOIN `slot` ON `booking`.`slotno`=`slot`.`slotid` WHERE `booking`.`counsellorid`=6 and `booking`.`helpseekerid`=1";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
            if ($todaydate > $row['date']){
                echo "<tr class='text-center'>
                        <td>Dr. ".$row["cno"]."</td>
                        <td>".$row["date"]."</td>
                        <td>".$row["slotid"]."</td>
                        <td>".$row["from"]."</td>
                        <td>".$row["to"]."</td>
                    </tr>";
            }
		}
    }

?><?php include '../templates/folheader.html'; ?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Appointments</a></li>
                <li class="breadcrumb-item active">View Appointments</li>
            </ol>
            <div class="col-12">
               <h3>View Appointments</h3>
               <hr>
            </div>
        </div>
        <div class="container mb-5">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Today's Appointments</h2>
                <div class="card-body">
                    <table class="table table-striped" id="mytables">
                        <thead class="bg-success text-white text-center">
                            <tr >
                                <th scope="col"><h5>Counsellor Name</h5></th>
                                <th scope="col"><h5>Counselling Date</h5></th>
                                <th scope="col"><h5>Slot Id</h5></th>
                                <th scope="col"><h5>Time from</h5></th>
                                <th scope="col"><h5>Time to</h5></th>
                            </tr>
                        </thead>
                        <?php today(); ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Upcoming Appointments</h2>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="bg-success text-white text-center">
                            <tr >
                                <th scope="col"><h5>Counsellor Name</h5></th>
                                <th scope="col"><h5>Counselling Date</h5></th>
                                <th scope="col"><h5>Slot Id</h5></th>
                                <th scope="col"><h5>Time from</h5></th>
                                <th scope="col"><h5>Time to</h5></th>
                            </tr>
                        </thead>
                        <?php upcoming(); ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Previous Appointments</h2>
                <div class="card-body">
                    <table class="table table-striped" id="mytable">
                        <thead class="bg-success text-white text-center">
                            <tr >
                                <th scope="col"><h5>Counsellor Name</h5></th>
                                <th scope="col"><h5>Counselling Date</h5></th>
                                <th scope="col"><h5>Slot Id</h5></th>
                                <th scope="col"><h5>Time from</h5></th>
                                <th scope="col"><h5>Time to</h5></th>
                            </tr>
                        </thead>
                        <?php previous(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include '../templates/footer.html'; ?>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#mytable').DataTable();
        } );
    </script>
    <script>
        $(document).ready( function () {
            $('#mytables').DataTable();
        } );
    </script>
</body>
</html>
