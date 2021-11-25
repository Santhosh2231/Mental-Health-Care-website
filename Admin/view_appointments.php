<?php 
    session_start();
    include '../connect.php';
    include '../templates/folheader.html';
    $conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../admin.php");
    }
    if(!isset($_SESSION['id'])){
        header("location: ../login.php");
    }
    $id = $_SESSION['id'];
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        global $conn;
        $Cid = $_SESSION['Cid'];
        $Hid = $_SESSION['id'];
        $date = $_SESSION["date"];
        $slot = $_SESSION["slotid"];
        $type = $_POST["pay"];
        include('config.php');
        include('api.php');
        if($slot==1){
            $date = $date." "."09:30:00";
        }
        else if ($slot==2){
            $date = $date." "."09:30:00";
        }
        else if ($slot==3){
            $date = $date." "."09:30:00";
        }
        else if ($slot==4){
            $date = $date." "."09:30:00";
        }
        else if ($slot==5){
            $date = $date." "."09:30:00";
        }
        $arr['start_date']= date($date);
        $arr['duration']=60;
        $arr['password']='mental';
        $arr['type']='2';

        $result = createMeeting($arr);
        if(isset($result->id)){
            $link = $result->join_url;
        }else{
            echo '<pre>';
            print_r($result);
        }
        $sql = "INSERT INTO `booking`(`bookingid`, `counsellorid`, `helpseekerid`, `date`, `slotno`, `PaymentType`,`link`) VALUES ('NULL','$Cid','$Hid','$date','$slot','$type','$link')";
        $result = $conn->query($sql);
        if($result){
            $alert="<script>
            Swal.fire({
            title: 'Booking successfully Done!',
            icon: 'success',
            button: 'OK',
            });
            </script>";
            echo $alert;
        }
        unset($_SESSION['Cid']);
        unset($_SESSION['date']);
        unset($_SESSION['slotid']);
        
    }
    function upcoming(){
        global $conn,$id;
        $todaydate = date("Y-m-d");
    
        $sql = "SELECT `counsellors`.`firstname` `cno`,`booking`.`date` `date`,`slot`.`slotid` `slotid`, `slot`.`timefrom` `from`,`slot`.`timeto` `to` FROM booking LEFT JOIN `counsellors` ON `booking`.`counsellorid`=`counsellors`.`cno` LEFT JOIN `slot` ON `booking`.`slotno`=`slot`.`slotid`";
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
        global $conn,$id;
        $todaydate = date("Y-m-d");
    
        $sql = "SELECT `counsellors`.`firstname` `cno`,`booking`.`link` `link`,`booking`.`date` `date`,`slot`.`slotid` `slotid`, `slot`.`timefrom` `from`,`slot`.`timeto` `to` FROM booking LEFT JOIN `counsellors` ON `booking`.`counsellorid`=`counsellors`.`cno` LEFT JOIN `slot` ON `booking`.`slotno`=`slot`.`slotid`";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) { 
            if ($todaydate == $row['date']){
                echo "<tr class='text-center'>
                        <td>Dr. ".$row["cno"]."</td>
                        <td>".$row["date"]."</td>
                        <td>".$row["slotid"]."</td>
                        <td>".$row["from"]."</td>
                        <td>".$row["to"]."</td>
                        <td><b><a href=".$row['link'].">Join meet</a></b></td>
                    </tr>";
            }
		}
    }
    function previous(){
        global $conn,$id;
        $todaydate = date("Y-m-d");
    
        $sql = "SELECT `counsellors`.`firstname` `cno`,`booking`.`date` `date`,`slot`.`slotid` `slotid`, `slot`.`timefrom` `from`,`slot`.`timeto` `to` FROM booking LEFT JOIN `counsellors` ON `booking`.`counsellorid`=`counsellors`.`cno` LEFT JOIN `slot` ON `booking`.`slotno`=`slot`.`slotid`";
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

?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="menu.php">Appointments</a></li>
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
                                <th scope="col"><h5>Meeting Link</h5></th>
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