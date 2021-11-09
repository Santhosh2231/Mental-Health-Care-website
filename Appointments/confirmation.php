<?php
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    if(!isset($_SESSION['Cid']) || !$_GET['date'] || !$_GET['slotid']){
        header("location: book_appointments.php");
    }
    function counsellorname(){
        global $conn;
    
        $k = $_SESSION['Cid'];
        $sql = "select firstname from `counsellors` where cno = '$k'";
        $result = $conn->query($sql);
        // if($result->num_rows==1){
        while($row = $result->fetch_assoc()){
            echo "<h3 class='text-success'>Dr. ".$row['firstname']."</h3>";
        }
        // }
    }
    function Helpseekername(){
        global $conn;
        $Hid = $_SESSION['id'];
        $sql = "select firstname from `users` where sno = '$Hid'";
        $result = $conn->query($sql);
        // if($result->num_rows==1){
        while($row = $result->fetch_assoc()){
            echo "<h3 class='text-success'>".$row['firstname']."</h3>";
        }
        // }
    }
    function coundate(){
        $date = $_GET['date'];
        $_SESSION['date'] = $date;
        echo "<h3>".$date."</h3>";
    }
    function slottiming(){
        global $conn;
        $slot = $_GET['slotid'];
        $_SESSION['slotid'] = $slot;
        $sql = "SELECT `timefrom`, `timeto` FROM `slot` WHERE slotid='$slot'";
        $result = $conn->query($sql);
        // if($result->num_rows==1){
        while($row = $result->fetch_assoc()){
            echo "<h3 class=''>".$row['timefrom']." -". $row['timeto']."</h3>";
        }

    }
?><?php include '../templates/folheader.html'; ?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Appointments</a></li>
                <li class="breadcrumb-item"><a href="book_appointments.php">Book Appointment</a></li>
                <li class="breadcrumb-item text-primary" ><a onclick="goBack()">counsellor booking</a></li>
                <li class="breadcrumb-item active">Confirmation</li>
            </ol>
            <div class="col-12">
               <h3>Confirmation</h3>
               <hr>
            </div>
        </div>
        <div class="container mb-5">
            <div class="card col-12 col-sm-8 offset-sm-2">
                <h3 class="card-header text-white bg-primary text-center">Confirmation</h3>
                <form action="view_appointments.php" method="post">
                    <div class="form-group">
                        <div class="card col-12">
                            <ul class="list-group list-group-flush table-stripped mt-2">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label class="control-label mx-2"><h4>Counsellor Name :</h4></label>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <?php counsellorname(); ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label class="control-label mx-2"><h4>Helpseeker Name :</h4></label>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <?php Helpseekername(); ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label class="control-label mx-2"><h4>Appointment Date :</h4></label>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <?php coundate(); ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label class="control-label mx-2"><h4>Appointment Time :</h4></label>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <?php slottiming(); ?>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label class="control-label mx-2"><h4>Payment Type:</h4></label>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <select name="pay" class="form-control" id="pay">
                                                <option value="Debit Card">Debit Card</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Netbanking">Netbanking</option>
                                                <option value="Google pay">Google Pay</option>
                                                <option value="Paytm">Paytm</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                </li>
                                <input type="hidden" name="slotid" id="slotid">
                                <input type="hidden" name="date" id="date">
                                <li class="list-group-item text-center">
                                    <button type="submit" class="btn btn-primary text-center" name=""><h4>Confirm Booking</h4></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include '../templates/footer.html'; ?>
<script>
    function substringchar(k,'<'){
        var i =0;
        while (k[i]!='<') {
            i++
        }
        return k.substring(0,i);
    }
    var k = <?php echo json_encode($_GET['slotid']); ?>;
    k = k.substring(0,1);
    slotid.value = k;
    var k = <?php echo json_encode($_GET['date']); ?>;
    date.value = k;
</script>
    
    <script>
        function goBack(){
            window.history.back();
        }
    </script>
</body>
</html>