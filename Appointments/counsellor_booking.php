<?php
    session_start();
    $_SESSION['Cid'] = $_GET['counsellorid'];
    include '../connect.php';
    $conn = OpenCon();
    function build_calendar(){
        global $conn;
        $conid = $_GET['counsellorid'];
        $daysOfWeek = array();
        $datesget = array();
        $dayinweek = array();
        for($i=1;$i<8;$i++){
            $date = date('d-m-Y',strtotime("$i day"));
            $dates = date('Y-m-d',strtotime("$i day"));
            array_push($daysOfWeek,$date);
            array_push($datesget,$dates);
            $days = date('D',strtotime("$i day"));
            array_push($dayinweek,$days);
        }
        $calendar = "<table class='table table-striped'>"; 
        $calendar.= "<center><h2>Booking</h2>"; 
        $calendar.= "<tr>"; 
        // Create the calendar headers 
        $calendar .= "<th class='header text-white text-center bg-primary '>Slots</th>";
        for($i=0;$i<7;$i++){ 
            $calendar .= "<th class='header text-white bg-primary' id='$'>$daysOfWeek[$i]  $dayinweek[$i]</th>"; 
        } 
        $calendar .= "</tr><tbody class='table table-striped'><tr>";
        $slot = array(1,2,3,4,5);
       $j=0;
        $slots = array('Slot A :9:30 A.M to 10:30 A.M','Slot B : 11:30 A.M to 12:30 P.M','Slot C : 2:30 A.M to 3:30 A.M','Slot D : 5:30 P.M to 6:30 P.M','Slot E : 7:30 P.M to 8:30 P.M');
       for($p=0;$p<5;$p++){
            $calendar .= "<th scope='row' class='text-center'>$slots[$p]</th>";
            for($i=0;$i<7;$i++){
                $key = $p+1;
                $sql = "SELECT * FROM `booking` WHERE `booking`.`counsellorid`='$conid' and `booking`.`date`= '$datesget[$i]' and `booking`.`slotno`='$key'";
                $result = $conn->query($sql);
                $num = mysqli_num_rows($result);
                if ($num>0){
                    $calendar .= "<td class='text-center  align-middle'><button class='btn btn-sm btn-danger btn-xs' data-toggle='modal' data-target='#bookedslot'><h6>Booked</h6></button></td>";
                }
                else{
                    $calendar .= "<td class='text-center  align-middle'><a class='btn btn-success btn-xs' href='confirmation.php?date=$datesget[$i]&slotid=".$slot[$j]."<form action='counsellor_booking.php' method='get' >Book</form></a></td>";
                }
            
            }
            $j++;
            $calendar .= "</tr>";
        }
        $calendar .= "</tr></tbody>"; 
        $calendar .= "</table>";
        return $calendar;
    }

?><?php include '../templates/folheader.html'; ?>
    <div class="modal fade" id="bookedslot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Slot already Booked</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Sorry for the inconvienence!!!</p>
            <p>This Slot is already booked by another User.</p>
            <p>Please Choose another available date and slot!!!</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
        </div>
    </div>
    </div>
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
            ?> 
       </div> 
        <br>
       </div>

    </div>
    <?php include '../templates/footer.html'; ?>
     <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>