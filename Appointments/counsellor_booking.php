<?php
    session_start();
    $_SESSION['Cid'] = $_GET['counsellorid'];
    $_SESSION['id'] = 1;
    include '../connect.php';
    function build_calendar(){
        $daysOfWeek = array();
        $datesget = array();
        $dayinweek = array();
        for($i=0;$i<7;$i++){
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
        $slots = array('Slot A :9:30 A.M to 10:30 A.M','Slot B : 9:30 A.M to 10:30 A.M','Slot C : 9:30 A.M to 10:30 A.M','Slot D : 9:30 A.M to 10:30 A.M','Slot E : 9:30 A.M to 10:30 A.M');
       foreach($slots as $sl){
            $calendar .= "<th scope='row' class='text-center'>$sl</th>";
            for($i=0;$i<7;$i++){
                $calendar .= "<td class='text-center  align-middle'><a class='btn btn-success btn-xs' href='confirmation.php?cid=".$_GET['counsellorid']."&date=$datesget[$i]&slotid=".$slot[$j]."<form action='counsellor_booking.php' method='get' >Book</form></a></td>";

            }
            $j++;
            $calendar .= "</tr>";
        }
        $calendar .= "</tr></tbody>"; 
        $calendar .= "</table>";
        return $calendar;
    }

?><?php include '../templates/folheader.html'; ?>
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
    <?php include '../templates/footer.html'; ?>
     <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>