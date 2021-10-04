<?php
function build_calendar($month,$year){

    $mysqli = new mysqli('localhost','root','','tutorial');
    $stmt = $mysqli->prepare('select * from bookings where MONTH(date)=? AND YEAR(date)=?');
    $stmt->bind_param('ss',$month,$year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }

            $stmt->close();
        }
    }

    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    // How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);

    // Retrieve some information about the first day of the
    // month in question.
    $dateComponents = getdate($firstDayOfMonth);

    // What is the name of the month in question?
    $monthName = $dateComponents['month'];

    // What is the index value (0-6) of the first day of the
    // month in question.
    $dayOfWeek = $dateComponents['wday'];
    // Create the table tag opener and day headers 
    $dateToday = date('Y-m-d'); 

    $prev_month = date('m',mktime(0,0,0,$month-1,1,$year));
    $prev_year = date('Y',mktime(0,0,0,$month-1,1,$year));
    $next_month = date('m',mktime(0,0,0,$month+1,1,$year));
    $next_year = date('Y',mktime(0,0,0,$month+1,1,$year));


// Create the table tag opener and day headers 
    $datetoday = date('Y-m-d'); 
    $calendar = "<table class='table table-bordered'>"; 
    $calendar.= "<center><h2>$monthName $year</h2>"; 
    $calendar.= "<tr>"; 
    // Create the calendar headers 
    foreach($daysOfWeek as $day) { 
        $calendar .= "<th class='header'>$day</th>"; 
    } 
    // Create the rest of the calendar
    // Initiate the day counter, starting with the 1st. 
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    // The variable $dayOfWeek is used to 
    // ensure that the calendar 
    // display consists of exactly 7 columns.
    if($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){ 
            $calendar .= "<td class='empty'></td>"; 
        } 
    }
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while ($currentDay <= $numberDays) { 
        //Seventh column (Saturday) reached. Start a new row. 
        if ($dayOfWeek == 7) { 
            $dayOfWeek = 0; 
            $calendar .= "</tr><tr>"; 
        } 
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT); 
        $date = "$year-$month-$currentDayRel"; 
        $dayname = strtolower(date('l', strtotime($date))); 
        $eventNum = 0; 
        $today = $date==date('Y-m-d')? "today" : "";
        if(in_array($date,$bookings)){
            $calendar.="<td class='$today'><h4>$currentDay</h4><a class='btn btn-danger btn-xs'>Booked</a>"; 
            $calendar .="</td>"; 
        }
        else{
            $calendar.="<td class='$today'><h4>$currentDay</h4><a class='btn btn-success btn-xs'>Book</a>"; 
            $calendar .="</td>";
        } 
        //Increment counters 
        $currentDay++; 
        $dayOfWeek++; 
    } 
    //Complete the row of the last week in month, if necessary 
    if ($dayOfWeek < 7) { 
        $remainingDays = 7 - $dayOfWeek; 
        for($l=0;$l<$remainingDays;$l++){ 
            $calendar .= "<td class='empty'></td>"; 
        } 
    } 

    $calendar .= "</tr>"; 
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Profile</title>
</head>
<body> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div id="calendar"> 
                <?php 
                    $dateComponents = getdate();
                    if(isset($_GET['month']) && isset($_GET['year'])){
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                    }
                    else{
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                        
                    }
                    echo build_calendar($month,$year); 
                    $day = $dateComponents['mday'];
                    echo $day.'-'.$month.'-'.$year;
                    
                ?> 
                </div> 
            </div> 
        </div> 
    </div> 


    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
